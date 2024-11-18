
<?php $__env->startSection('title'); ?> Product <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Product Create</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form to create product -->
                                            <form action="<?php echo e(route('product.store')); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <!-- Categories -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select name="category_id" class="form-select" id="categorySelect" required>
                                                                <option value="" selected disabled>Select a category</option>
                                                                <!-- Example categories; these should be fetched dynamically -->
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <label for="categorySelect">Category <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <!-- Subcategories dropdown -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select name="sub_category_id" class="form-select" id="subCategorySelect" required>
                                                                <option value="" selected disabled>Select a subcategory</option>
                                                                <!-- Subcategories will be loaded here dynamically -->
                                                            </select>
                                                            <label for="subCategorySelect">Subcategory <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <!-- Brands -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <select name="brand_id" class="form-select" id="brandSelect" required>
                                                                <option value="" selected disabled>Select a brand</option>
                                                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                            <label for="brandSelect">Brands <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <!-- Product Name -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="prd_name" class="form-control" id="productNameInput" placeholder="Enter product name" required>
                                                            <label for="productNameInput">Product Name <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <!-- Price -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="number" name="prd_price" class="form-control" id="priceInput" placeholder="Enter product price" required>
                                                            <label for="priceInput">Price <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="number" name="prd_discount_price" class="form-control" id="discountInput" placeholder="Enter product discount price" required>
                                                            <label for="discountInput">Discount Price</label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <!-- Quantity -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="number" name="qty" class="form-control" id="quantityInput" placeholder="Enter product quantity" required>
                                                            <label for="quantityInput">Quantity <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                    <!-- Image Upload -->
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="file" name="prd_image" class="form-control" id="imageInput" accept="image/*">
                                                            <label for="imageInput">Upload Product Image <span class="text-danger">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div> <br>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <input type="file" name="prd_images[]" class="form-control" id="datasheetInput" accept=".png,.jpg,jpeg,web,gif" multiple>
                                                    <label for="datasheetInput">Upload Product Images (Optional)</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating">
                                                    <select name="status" class="form-select" id="brandSelect" required>
                                                        <option value="'active'">Active</option>
                                                        <option value="'inactive'">Inactive</option>
                                                    </select>
                                                    <label for="brandSelect">Status <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                        </div><br>
                                        <!-- Product Description -->
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating">
                                                    <textarea name="prd_description" class="form-control" id="descriptionInput" placeholder="Enter product description"></textarea>
                                                    <!-- <label for="descriptionInput">Product Description</label> -->
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- Submit Button -->
                                        <div class="col-lg-12">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end row -->
        </div>
    </div><!-- end card body -->
</div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(URL::asset('public/build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
<script>
    $(document).ready(function() {

        ClassicEditor
            .create(document.querySelector('#descriptionInput'))
            .catch(error => {
                console.error(error);
            });
        // Listen for category change
        $('#categorySelect').on('change', function() {
            var categoryId = $(this).val(); // Get selected category ID

            // Clear previous subcategories
            $('#subCategorySelect').html('<option value="" selected disabled>Select a subcategory</option>');

            if (categoryId) {
                // Make AJAX request to fetch subcategories
                $.ajax({
                    url: "<?php echo e(route('get.subcategories')); ?>", // URL to get subcategories
                    type: "GET",
                    data: {
                        category_id: categoryId
                    },
                    success: function(response) {
                        // Populate subcategory dropdown
                        if (response.subcategories.length > 0) {
                            $.each(response.subcategories, function(key, subcategory) {
                                $('#subCategorySelect').append('<option value="' + subcategory.id + '">' + subcategory.name + '</option>');
                            });
                        } else {
                            $('#subCategorySelect').html('<option value="" selected disabled>No subcategories available</option>');
                        }
                    },
                    error: function() {
                        alert('Error fetching subcategories');
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\corporate\resources\views/backend/admin/products/create.blade.php ENDPATH**/ ?>