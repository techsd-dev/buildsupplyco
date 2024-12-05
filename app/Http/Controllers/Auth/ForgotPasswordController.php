<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function forgetPasswordForm()
    {
        return view('auth.passwords.userforgetpassform');
    }

    public function forgetPasswordSendEmail(Request $request)
    {
        // Validate the input email
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Get user information by email
        $user = User::where('email', $request->email)->first();

        $resetLink = URL::temporarySignedRoute(
            'password.reset.form',
            Carbon::now()->addMinutes(60), // Link expires in 60 minutes
            ['email' => $user->email]
        );

        Mail::raw(
            "Dear User,\n\n" .
                "It seems you've requested to reset your password. Please click the link below to reset your password:\n\n" .
                "$resetLink\n\n" .
                "This link will expire in 60 minutes.\n\n" .
                "If you did not request a password reset, please ignore this email.\n\n" .
                "Thank you,\n" .
                "BuildSupplyCo",
            function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Reset Your Password');
            }
        );

        // Return success response (you can trigger SweetAlert or any other feedback message)
        return redirect()->back()->with('success', 'Password reset link has been sent to your email!');
    }


    public function forgetPasswordResetForm(Request $request)
    {
        $email = $request->query('email');
        return view('auth.passwords.userforgetpassresetform', compact('email'));
    }

    public function forgetPasswordReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed', // Only use 'confirmed'
        ]);

        $user = User::where('email', $request->email)->where('role', $request->role)->first();

        if (!$user) {
            return back()->with('error', 'User not found or role mismatch.');
        }

        // Update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.login')->with('success', 'Password reset successfully. Please login with your new password.');
    }
}
