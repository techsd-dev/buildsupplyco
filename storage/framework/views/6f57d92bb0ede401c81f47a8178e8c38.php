
<?php $__env->startSection('title'); ?> Orders <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Orders List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="orderList">
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="orderTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Order ID</th>
                                    <th>Customer Details</th>
                                    <th>Order Total</th>
                                    <th>Order Items</th>
                                    <th>Transaction Status</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($orders->isEmpty()): ?>
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $totalAmt = $order->transactions->sum('amount')/100;
                                ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->user->name ?? 'N/A'); ?> <br> <?php echo e($order->user->email ?? 'N/A'); ?> <br> <?php echo e($order->user->phone ?? 'N/A'); ?></td>
                                    <td>₹<?php echo e(number_format($totalAmt, 2)); ?></td>
                                    <td>
                                        <ul>
                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($item->product->prd_name ?? 'Unknown Product'); ?> (<?php echo e($item->quantity); ?>)</li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </td>
                                    <td>
                                        <?php $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e(ucfirst($transaction->status)); ?>

                                        <br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td><?php echo e($order->status); ?></td>
                                    <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('orders.details', $order->id)); ?>" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sm btn-warning update-status" data-id="<?php echo e($order->id); ?>">
                                            <i class="fas fa-edit"></i> Update Status
                                        </button>
                                    </td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <?php echo e($orders->links('vendor.pagination.bootstrap-5')); ?>

                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Update Order Status',
                input: 'select',
                inputOptions: {
                    'pending': 'Pending',
                    'confirmed': 'Confirmed',
                    'delivered': 'Delivered',
                    'cancelled': 'Cancelled'
                },
                inputPlaceholder: 'Select status',
                showCancelButton: true,
                confirmButtonText: 'Update Status',
                cancelButtonText: 'Cancel',
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to select a status!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const status = result.value;
                    const url = `<?php echo e(route('orders.updateStatus', ['orderId' => '__orderId__'])); ?>`.replace('__orderId__', orderId);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Status Updated!', 'The order status has been updated successfully.', 'success');
                                location.reload(); 
                            } else {
                                Swal.fire('Error', 'There was an issue updating the order status.', 'error');
                            }
                        });
                }
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/orders/index.blade.php ENDPATH**/ ?>