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

    public function orders()
    {
        $orders = Order::with([
            'user',
            'orderItems.product',
            'transactions'
        ])->orderBy('id', 'DESC')->paginate(10);
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

    public function trHistory(){
        $transactions = Transaction::with('user')->paginate(10);
        return view('backend.admin.trasanctions.index', compact('transactions'));
    }
}
