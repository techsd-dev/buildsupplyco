
<?php $__env->startSection('title'); ?> Order Details <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Order Details (Order ID: <?php echo e($order->id); ?>)</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Customer Details</h5>
                        <p><strong>Name:</strong> <?php echo e($order->user->name ?? 'N/A'); ?></p>
                        <p><strong>Email:</strong> <?php echo e($order->user->email ?? 'N/A'); ?></p>
                        <p><strong>Phone:</strong> <?php echo e($order->user->phone ?? 'N/A'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Transaction Details</h5>
                        <?php 
                         $totalAmt = $order->transactions->sum('amount')/100;
                        ?> 
                        <p><strong>Total Amount:</strong> ₹<?php echo e(number_format($totalAmt, 2)); ?></p>
                        <?php $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><strong>Status:</strong> <?php echo e(ucfirst($transaction->status)); ?> (<?php echo e($transaction->created_at->format('d M Y')); ?>)</p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <h5>Order Items</h5>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img src="<?php echo e(url('public/uploads/products/' . $item->product->prd_image)); ?>" 
                                         alt="<?php echo e($item->product->prd_name); ?>" 
                                         class="img-thumbnail" style="width: 100px;">
                                </td>
                                <td><?php echo e($item->product->prd_name ?? 'N/A'); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td>₹<?php echo e(number_format($item->prd_price, 2)); ?></td>
                                <td>₹<?php echo e(number_format($item->quantity * $item->prd_price, 2)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <a href="<?php echo e(route('orders')); ?>" class="btn btn-secondary mt-3">Back to Orders</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/orders/details.blade.php ENDPATH**/ ?>