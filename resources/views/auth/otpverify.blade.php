<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otp Verify</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
</head>

<body>
    @include('frontend.flash')
    <div class="login-container">
        <form class="login-form" action="{{ route('user.otp.verify') }}" method="POST">
            @csrf
            <h2 class="text-center"><img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="logo" height="100px" width="100px" /></h2>
            <h2 class="text-center">OTP Verify</h2>
            <p class="text-danger text-center">OTP valid for 120 seconds</p>
                <input type="hidden" name="email" class="form-control" value="{{ $email ?? '' }}">
            <div class="form-group">
                <label for="password">OTP <span class="text-danger">*</span></label>
                <input type="number" name="otp" class="form-control" id="otp" placeholder="Enter Otp">
                @error('otp')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-common mt-3">OTP Verify</button>
        </form>
    </div>
</body>

</html>