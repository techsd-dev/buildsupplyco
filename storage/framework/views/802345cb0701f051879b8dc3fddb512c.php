<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otp Verify</title>
    <!-- bootstrap v4.0.0 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/bootstrap.min.css')); ?>">

    <!-- style css -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/assets/css/style.css')); ?>">
</head>

<body>
    <?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="login-container">
        <form class="login-form" action="<?php echo e(route('user.otp.verify')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h2 class="text-center"><img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" height="100px" width="100px" /></h2>
            <h2 class="text-center">OTP Verify</h2>
            <p class="text-danger text-center">OTP valid for 120 seconds</p>
                <input type="hidden" name="email" class="form-control" value="<?php echo e($email ?? ''); ?>">
            <div class="form-group">
                <label for="password">OTP <span class="text-danger">*</span></label>
                <input type="number" name="otp" class="form-control" id="otp" placeholder="Enter Otp">
                <?php $__errorArgs = ['otp'];
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
            <button type="submit" class="btn btn-primary btn-block btn-common mt-3">OTP Verify</button>
        </form>
    </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/auth/otpverify.blade.php ENDPATH**/ ?>