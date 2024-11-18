
<?php $__env->startSection('title', 'Cart List'); ?>
<?php $__env->startSection('content'); ?>

<!--shopping-cart area-->
<div class="shopping-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th class="text-center"><i class="fa fa-times" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($cartItems->isEmpty()): ?>
                            <tr>
                                <td colspan="6" class="text-center">Cart List is empty.</td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="mini-cart-thumb">
                                        <a href="#"><img src="<?php echo e(asset('public/uploads/products/' . $item->product->prd_image)); ?>" alt="" /></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-product-name">
                                        <h5><a href="#"><?php echo e($item->product->prd_name); ?></a></h5>
                                    </div>
                                </td>
                                <td>
                                    <span class="cart-product-price">₹<?php echo e($item->product->prd_discount_price); ?></span>
                                </td>
                                <td>
                                    <div class="cart-quantity-changer">
                                        <form action="<?php echo e(route('cart.update', $item->id)); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" min="1" style="width: 60px;">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <span class="cart-product-price">₹<?php echo e($item->product->prd_discount_price * $item->quantity); ?></span>
                                </td>
                                <td>
                                    <div class="product-remove">
                                        <form action="<?php echo e(route('cart.remove')); ?>" method="POST" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                            <button type="submit" onclick="return confirm('Are you sure you want to remove this item from the cart?');" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-30">
            <!-- <div class="col-lg-6">
                <div class="cart-update pull-right">
                    <a href="#" class="btn-common">UPDATE CART</a>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="cart-update">
                    <a href="<?php echo e(url('/')); ?>" class="btn-common">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>

        <div class="row mt-40">
            <div class="col-lg-4">
                <!-- <div class="cart-box shpping-tax">
                    <h5>Estimate Shipping And Tax</h5>
                    <div class="cart-box-inner">
                        <p>Enter your destination to get shipping & tax</p>
                        <table class="table">
                            <tr>
                                <td>
                                    <label>COUNTRY *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>STATE / PROVINCE *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>ZIP / POSTAL CODE *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <a href="#" class="btn-common">GET A QUOTE</a>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4">
                <!-- <div class="cart-box cart-coupon fix">
                    <h5>Discount Codes</h5>
                    <div class="cart-box-inner">
                        <p>Enter your coupon if you have one</p>
                        <form action="<?php echo e(route('cart.applyCoupon')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="coupon_code" placeholder="Enter coupon code" required />
                            <button type="submit" class="btn-common">Apply</button>
                        </form>
                        <?php if(session('message')): ?>
                        <div class="alert alert-info mt-2"><?php echo e(session('message')); ?></div>
                        <?php endif; ?>
                    </div>
                </div> -->
            </div>

            <div class="col-lg-4">
                <div class="cart-box cart-total">
                    <h5>Cart Total</h5>
                    <div class="cart-box-inner">
                        <table class="table">
                            <tr>
                                <td>SUB TOTAL:</td>
                                <td><span>₹<?php echo e($cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity)); ?></span></td>
                            </tr>
                            <tr>
                                <td>GRAND TOTAL:</td>
                                <td>
                                    <span>
                                        ₹<?php echo e($cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity) - (session('discount') ? session('discount') * $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity) : 0)); ?>

                                    </span>
                                </td>
                            </tr>

                        </table>
                        <div class="proceed-checkout">
                            <div class="col-lg-12">
                                <a href="#">Checkout with multiple addresses</a>
                            </div>
                            <div class="col-lg-12">
                                <a href="<?php echo e(route('checkout.index')); ?>" class="btn-common">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shopping-cart end-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/pages/products/cart.blade.php ENDPATH**/ ?>