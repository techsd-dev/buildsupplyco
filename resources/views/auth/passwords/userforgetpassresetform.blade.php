<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password Reset Form</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
</head>

<body>
    @include('frontend.flash')
    <div class="login-container">
        <form class="login-form" action="{{ route('forget.password.reset') }}" method="POST">
            @csrf
            <h2 class="text-center">
                <img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="logo" height="100px" width="100px" />
            </h2>
            <h2 class="text-center">Forget Password Reset</h2>
            <input type="hidden" name="role" value="{{ $role ?? '0' }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-common mt-3">Reset Password</button>
        </form>
    </div>
</body>

</html>
