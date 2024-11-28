<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password Form</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/bootstrap.min.css')); ?>">
    <!-- style css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/style.css')); ?>">
</head>

<body>
    <?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="login-container">
        <form class="login-form" action="<?php echo e(route('forget.password.send.email')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h2 class="text-center"><img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" height="100px" width="100px" /></h2>
            <h2 class="text-center">Forget Password</h2>
            <input type="hidden" name="role" value="0">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" id="username" name="email" placeholder="Enter username">
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
            <button type="submit" class="btn btn-primary btn-block btn-common mt-3">Submit</button>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/auth/passwords/userforgetpassform.blade.php ENDPATH**/ ?>