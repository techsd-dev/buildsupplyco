<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders(Request $request)
    {
        $query = Order::with(['user', 'orderItems.product', 'transactions'])->orderBy('id', 'DESC');
        if ($request->filled('order_status')) {
            $query->where('status', $request->order_status);
        }
        if ($request->filled('transaction_status')) {
            $query->whereHas('transactions', function ($q) use ($request) {
                $q->where('status', $request->transaction_status);
            });
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        $orders = $query->paginate(10);
        return view('backend.admin.orders.index', compact('orders'));
    }


    public function viewOrderDetails($id)
    {
        $order = Order::with(['user', 'orderItems.product', 'transactions'])->findOrFail($id);
        return view('backend.admin.orders.details', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $request->validate([
            'status' => 'required|in:pending,confirmed,delivered,cancelled',
        ]);
        $order->status = $request->status;
        $order->save();
        return response()->json(['success' => true]);
    }

    public function trHistory(Request $request)
    {
        $query = Transaction::with('user');
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('user_name')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->user_name . '%');
            });
        }
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        $transactions = $query->paginate(10);
        return view('backend.admin.trasanctions.index', compact('transactions'));
    }
}
