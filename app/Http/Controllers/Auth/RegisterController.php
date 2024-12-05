<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return request()->file('avatar');
        if (request()->has('avatar')) {
            $avatar = request()->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatarPath = public_path('/images/');
            $avatar->move($avatarPath, $avatarName);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' =>  $avatarName,
        ]);
    }

    public function userRegisterForm()
    {
        return view('auth.userregister');
    }

    public function userRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = 'na';
        $user->avatar = 'na';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = '0';
        $user->save();

        $otp = rand(111111, 999999);
        $user->otp = $otp;
        $user->otp_created_at = Carbon::now();
        $user->save();

        Mail::raw(
            "Dear User,\n\n" .
                "Thank you for registering with us! Your OTP (One-Time Password) for verification is: **$otp**.\n\n" .
                "Please enter this code on the verify otp page to complete your sign-up process. Remember, this OTP is valid for only 120 seconds.\n\n" .
                "If you did not initiate this request, please disregard this email.\n\n" .
                "Thank you,\n" .
                "BuildSupplyCo",
            function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Registration OTP');
            }
        );

        return redirect()->route('verifyOtpPage', ['email' => $user->email])
            ->with('success', 'OTP sent to your email. Please verify.');
    }

    public function verifyOtpPage(Request $request)
    {
        $email = $request->query('email');
        return view('auth.otpverify', compact('email'));
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $otpValidDuration = 120;
            $otpAgeInSeconds = Carbon::now()->diffInSeconds($user->otp_created_at);

            if ($otpAgeInSeconds > $otpValidDuration) {
                return back()->withErrors(['otp' => 'The OTP has expired. Please request a new one.']);
            }
            if ($user->otp == $request->otp) {
                $user->otp = null;
                $user->otp_created_at = null;
                $user->save();
                Auth::login($user);
                return redirect()->route('home')->with('success', 'OTP verified successfully. You are now registered.');
            }
        }
        return back()->withErrors(['otp' => 'The OTP entered is incorrect or has expired. Please try again.']);
    }
}
