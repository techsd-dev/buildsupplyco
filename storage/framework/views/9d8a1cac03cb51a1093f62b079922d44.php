<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/bootstrap.min.css')); ?>">

    <!-- style css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/style.css')); ?>">
</head>

<body>
    <?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row min-vh-100 d-flex">
    <div class="col-md-5 d-flex flex-column justify-content-center" style="background-color:#e23e1d;">
        <div class="py-4 px-5 text-center w-100">
        <h2 class="text-light">Hello, User!</h3>
        <p class="text-light">Not registered yet? Register with your personal details to use all of site features.</p>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Home</a>
        <a href="<?php echo e(route('user.register.form')); ?>" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Sign Up</a>
        </div>
    </div>

    <div class="col-md-7 d-flex flex-column justify-content-center">
        <div class="login-container">
            <h2 class="text-center mb-4">
                <img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" width="100px" />
            </h2>
            <form class="login-form" action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <h2 class="text-center">Login</h2>
                <input type="hidden" name="role" value="0">
                <div class="form-group mt-4">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" id="username" name="email" placeholder="Please enter your username">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control password-input pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" placeholder="Please enter your password" id="password-input">
                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon">
                        <i class="ri-eye-fill align-middle"></i>
                    </button>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="text-center">
                    <a href="<?php echo e(route('forget.password')); ?>" class="btn btn-link">Forgot password?</a>
                </div>
            <div class="text-center">    
                <button type="submit" class="btn btn-primary d-inline-block btn-common mt-2 text-uppercase btn-wd-md">Sign In</button>
                </div>
                <!--<div class="text-center mt-3 d-flex align-items-center justify-content-center">-->
                <!--    Not registered yet? <a class="btn btn-link" href="<?php echo e(route('user.register.form')); ?>">Create an Account</a>-->
                <!--</div>-->
                </div>
            </form>
        </div>
    </div>
</div>

</body>

</html><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/auth/userlogin.blade.php ENDPATH**/ ?>