
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