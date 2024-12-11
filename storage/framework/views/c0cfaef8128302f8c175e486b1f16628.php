
<?php $__env->startSection('title'); ?> Transaction History <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Transaction History</h4>
            </div>
            <div class="card-body">
                <form method="GET" action="<?php echo e(route('tr.history')); ?>" class="mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <label for="status" class="form-label">Transaction Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">All</option>
                                <option value="success" <?php echo e(request('status') == 'success' ? 'selected' : ''); ?>>Success</option>
                                <option value="failed" <?php echo e(request('status') == 'failed' ? 'selected' : ''); ?>>Failed</option>
                                <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="userName" class="form-label">User Name</label>
                            <input type="text" name="user_name" id="userName" class="form-control" value="<?php echo e(request('user_name')); ?>" placeholder="Enter user name">
                        </div>
                        <div class="col-md-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="startDate" class="form-control" value="<?php echo e(request('start_date')); ?>">
                        </div>
                        <div class="col-md-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="endDate" class="form-control" value="<?php echo e(request('end_date')); ?>">
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="<?php echo e(route('tr.history')); ?>" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

                <div class="card-body">
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Transaction ID</th>
                                    <th>User Details</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($transaction->transaction_id); ?></td>
                                    <td><?php echo e($transaction->user->name ?? 'N/A'); ?> <br> <?php echo e($transaction->user->email ?? 'N/A'); ?>

                                        <br><?php echo e($transaction->user->phone ?? 'N/A'); ?>

                                    </td>
                                    <td>₹<?php echo e(number_format($transaction->amount/100, 2)); ?></td>
                                    <td><?php echo e($transaction->created_at->format('d-m-Y')); ?></td>
                                    <td><?php echo e($transaction->status); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">No transactions found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        <?php echo e($transactions->links('vendor.pagination.bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/trasanctions/index.blade.php ENDPATH**/ ?>