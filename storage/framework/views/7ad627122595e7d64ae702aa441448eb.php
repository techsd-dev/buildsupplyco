
<?php $__env->startSection('title', $career->designation); ?>
<?php $__env->startSection('content'); ?>
<style>
    .card-shadow {
        box-shadow: 0px 2px 8px 0px rgb(0 0 0 / 20%);
        border-radius: 8px;
        background: #fff;
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-7 col-sm-6">
            <div class="card card-shadow">
                <div class="card-body">
                    <div id="ContentPlaceHolder1_divshow">
                        <h3 class="job_title"><?php echo e($career->designation); ?></h3>
                    </div>

                    <div id="ContentPlaceHolder1_divjob">
                        <p>
                        </p>
                        <p><strong>Years of Experience - <?php echo e($career->experience); ?> Years<br>
                                Location - <?php echo e($career->job_location); ?></strong></p>

                        <p class="card-text"><strong>Overview:</strong> <?php echo e($career->overview); ?></p>
                        <?php if($career->roles_n_responsibilities): ?>
                        <div class="mt-3">
                            <h4>Roles and Responsibilities:</h4>
                            <p><?php echo e($career->roles_n_responsibilities); ?></p>
                        </div>
                        <?php endif; ?>

                        <a href="<?php echo e(route('fr.careers')); ?>" class="btn btn-secondary mt-4">Back to Careers</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-sm-6">
            <div class="card card-shadow">
                <div class="card-body">
                    <h4>Interested to work with BUILDSUPPLY?</h4>
                    <p>Share your details with us, and we will get back to you.</p>
                    <form action="https://gurukulnation.com/apply/job" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="frh6FnEafHalPj3GGC2LfdpV2dZqGxmybNKDcDwM">
                        <div class="form-group">
                            <label>Job Title</label>
                            <input required="" name="job_title" type="text" value="<?php echo e($career->designation); ?>" readonly="" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input required="" name="name" type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <label>Email Id <span class="text-danger">*</span></label>
                            <input required="" name="email" placeholder="Email" type="email" class="form-control">
                        </div>
                        <div class="form-group has-float-label">
                            <label>From Where do you know about us? <span class="text-danger">*</span></label>
                            <select required="" name="referenced_by" class="form-control" placeholder="From Where do you know about us?">
                                <option selected="selected" value="0">-Select-</option>
                                <option value="6">Friend</option>
                                <option value="5">Affiliate</option>
                                <option value="4">Website</option>
                                <option value="3">Facebook</option>
                                <option value="2">Instagram</option>
                                <option value="1">Other</option>
                            </select>
                        </div>
                        <div class="form-group" id="divphone">
                            <label>Phone No. <span class="text-danger">*</span></label>
                            <input required="" name="mobile" type="tel" pattern="[0-9]{10}" maxlength="10" class="form-control" placeholder="Phone No.">
                            <small class="form-text text-muted">Please enter a 10-digit phone number.</small>
                        </div>
                        <div class="form-group">
                            <label>Current Location <span class="text-danger">*</span></label>
                            <input required="" name="current_location" type="text" class="form-control" placeholder="Current Location">
                        </div>
                        <div class="form-group form_check">
                            <input type="checkbox" required="" name="ready_to_relocate" value="yes" checked="checked"><label>Are you ready to relocate?</label>
                        </div>
                        <div class="form-group has-float-label">
                            <textarea name="job_description" rows="2" cols="20" maxlength="150" class="form-control" placeholder="Job Description"></textarea>
                            <label>Job Description</label>
                        </div>
                        <div class="form-group form-group-bottom has-float-label">
                            <label>Upload Resume <span class="text-danger">*</span></label>
                            <span id="ContentPlaceHolder1_lblimg" style="color:White;"></span>
                            <input type="file" required="" name="resume" class="form-control upload-file" placeholder="Upload Resume">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/pages/careers/details.blade.php ENDPATH**/ ?>