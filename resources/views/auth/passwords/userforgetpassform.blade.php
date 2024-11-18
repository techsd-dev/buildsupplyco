<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password Form</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
</head>

<body>
    @include('frontend.flash')
    <div class="login-container">
        <form class="login-form" action="{{ route('forget.password.send.email') }}" method="POST">
            @csrf
            <h2 class="text-center"><img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="logo" height="100px" width="100px" /></h2>
            <h2 class="text-center">Forget Password</h2>
            <input type="hidden" name="role" value="0">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="username" name="email" placeholder="Enter username">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-common mt-3">Submit</button>
        </form>
    </div>
</body>
</html>