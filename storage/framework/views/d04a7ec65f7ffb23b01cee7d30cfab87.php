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

   <div class="row min-vh-100 d-flex">
    <div class="col-md-5 d-flex flex-column justify-content-center" style="background-color:#e23e1d;">
        <div class="py-4 px-5 text-center w-100">
        <h2 class="text-light">Hello, User!</h3>
        <p class="text-light">Already registered? Log in with your account to access all the site features.</p>
        <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Home</a>
        <a href="<?php echo e(route('user.login')); ?>" class="btn btn-outline-light mt-3 btn-lg btn-wd-md">Login</a>
        </div>
    </div>

    <div class="col-md-7 d-flex flex-column justify-content-center">
        <div class="login-container">
            <h2 class="text-center mb-4">
                <img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" width="100px" />
            </h2>
                <form class="login-form" action="<?php echo e(route('user.register')); ?>" method="POST">
            <?php echo csrf_field(); ?>
           
            <h2 class="text-center">User Registration</h2>
            <div class="form-group mt-4">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="Password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="text-danger"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
             <div class="text-center">
            <button type="submit" class="btn btn-primary d-inline-block btn-common mt-2 text-uppercase btn-wd-md">Submit</button>
            </div>
          
        </form>
        </div>
    </div>
</div>


</body>
</html><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/auth/userregister.blade.php ENDPATH**/ ?>