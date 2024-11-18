<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $states = DB::table('states')->get();
        return view('frontend.pages.users.dashbaord', compact('states'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'dob' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        if ($request->hasFile('image')) {
            if ($user->avatar) {
                $oldImagePath = public_path('uploads/user/' . $user->avatar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $prdImage = $request->file('image');
            $imageName = time() . '_' . $prdImage->getClientOriginalName();
            $prdImage->move(public_path('uploads/user'), $imageName);
            $user->avatar = $imageName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
    public function updateAddress(Request $request)
    {
        $user = Auth::user();
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->pincode = $request->input('pincode');
        $user->save();
        return redirect()->back()->with('success', 'Address saved successfully.');
    }
}
