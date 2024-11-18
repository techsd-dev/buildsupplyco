<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
</head>

<body>

   <div class="row min-vh-100 d-flex">
    <div class="col-md-5 d-flex flex-column justify-content-center" style="background-color:#e23e1d;">
        <div class="py-4 px-5 text-center w-100">
        <h2 class="text-light">Hello, User!</h3>
        <p class="text-light">Already registered? Log in with your account to access all the site features.</p>
        <a href="{{ url('/') }}" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Home</a>
        <a href="{{ route('user.login') }}" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Login</a>
        </div>
    </div>

    <div class="col-md-7 d-flex flex-column justify-content-center">
        <div class="login-container">
            <h2 class="text-center mb-4">
                <img src="{{ asset('public/frontend/assets/images/logo.png') }}" alt="logo" width="100px" />
            </h2>
                <form class="login-form" action="{{ route('user.register') }}" method="POST">
            @csrf
           
            <h2 class="text-center">User Registration</h2>
            <div class="form-group mt-4">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
             <div class="text-center">
            <button type="submit" class="btn btn-primary d-inline-block btn-common mt-2 text-uppercase btn-wd-md">Submit</button>
            </div>
          
        </form>
        </div>
    </div>
</div>


</body>
</html>