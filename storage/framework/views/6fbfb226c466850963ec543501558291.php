

<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('content'); ?>

<!-- Checkout Area Start -->
<div class="checkout-area mt-15">
    <div class="container">
        <div class="row mt-10">
            <div class="col-lg-8">
                <h4>Billing Details</h4>
                <form action="<?php echo e(route('order.n.phonepe')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="name">Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No. <span class="text-danger">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your Phone No." required pattern="^\d{10}$" title="Please enter a 10-digit phone number">
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address <span class="text-danger">*</span></label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter your Shipping Address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select id="payment_method" name="payment_method" class="form-control" required>
                            <option value="credit_card">Phonepe</option>
                            <!-- <option value="paypal">PayPal</option>
                            <option value="cash_on_delivery">Cash on Delivery</option> -->
                        </select>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details">
                    <h4>Your Order</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($product)): ?>
                            <!-- If a single product was passed (Buy Now) -->
                            <tr>
                                <td><?php echo e($product->prd_name); ?></td>
                                <td>₹<?php echo e(number_format($product->prd_price, 2)); ?></td>
                                <td><?php echo e($quantity); ?></td>
                                <td>₹<?php echo e(number_format($total, 2)); ?></td>
                            </tr>
                            <?php elseif(isset($cartItems)): ?>
                            <!-- If cart items are present -->
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->product->prd_name); ?></td>
                                <td>₹<?php echo e(number_format($item->product->prd_price, 2)); ?></td>
                                <td><?php echo e($item->quantity); ?></td>
                                <td>₹<?php echo e(number_format($item->product->prd_price * $item->quantity, 2)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <?php if(isset($product)): ?>
                            <!-- For Buy Now (single product) -->
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th>₹<?php echo e(number_format($total, 2)); ?></th>
                            </tr>
                            <tr>
                                <th colspan="3">Discount</th>
                                <th>₹<?php echo e(number_format($grandTotal, 2)); ?></th>
                            </tr>
                            <?php elseif(isset($cartItems)): ?>
                            <!-- For cart items -->
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th>₹<?php echo e(number_format($total, 2)); ?></th>
                            </tr>
                            <tr>
                                <th colspan="3">Discount</th>
                                <th>₹<?php echo e(number_format($grandTotal, 2)); ?></th>
                            </tr>
                            <?php endif; ?>
                            <?php
                            $totalWithShip = isset($total) ? $total + 99 : 0;
                            ?>
                            <tr>
                                <th colspan="3">Shipping Charge</th>
                                <th>₹99.00</th>
                            </tr>
                            <tr>
                                <th colspan="3">Grand Total</th>
                                <th>₹<?php echo e(number_format($totalWithShip, 2)); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <input type="hidden" name="price" value="<?php echo e($totalWithShip); ?>">
                <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/pages/products/checkout.blade.php ENDPATH**/ ?>