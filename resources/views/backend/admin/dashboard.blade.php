@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('content')


@php 
  $catCount = DB::table('categories')->count();
  $subCatCount = DB::table('sub_categories')->count();
  $brandsCount = DB::table('brands')->count();
  $productsCount = DB::table('products')->count();
@endphp 
<div class="row">
    <div class="col">

        <div class="h-100">
            <div class="row mb-3 pb-1">
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-16 mb-1">Good Morning,  {{ ucfirst(strtolower(Auth::user()->name)) }}
                            !</h4>
                            <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <form action="javascript:void(0);">
                                <div class="row g-3 mb-0 align-items-center">
                                    <div class="col-sm-auto">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control border-0 dash-filter-picker shadow"
                                                data-provider="flatpickr" data-range-date="true"
                                                data-date-format="d M, Y"
                                                data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                            <div class="input-group-text bg-primary border-primary text-white">
                                                <i class="ri-calendar-2-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-soft-secondary"><i
                                                class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                    </div>
                                    <!--end col-->
                                    <div class="col-auto">
                                        <button type="button"
                                            class="btn btn-soft-success btn-icon waves-effect waves-light layout-rightside-btn"><i
                                                class="ri-pulse-line"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Categories
                                    </p>
                                </div>
                                <!-- <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                    </h5>
                                </div> -->
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="559.25">{{ $catCount }}</span> </h4>
                                    <!-- <a href="" class="text-decoration-underline">View net earnings</a> -->
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-secondary-subtle rounded fs-3">
                                        <i class="bx bx-dollar-circle text-secondary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Total Subcategories</p>
                                </div>
                                <!-- <div class="flex-shrink-0">
                                    <h5 class="text-danger fs-14 mb-0">
                                        <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                    </h5>
                                </div> -->
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="36894">{{ $subCatCount }}</span></h4>
                                    <!-- <a href="" class="text-decoration-underline">View all orders</a> -->
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                        <i class="bx bx-shopping-bag text-primary"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Brands</p>
                                </div>
                                <!-- <div class="flex-shrink-0">
                                    <h5 class="text-success fs-14 mb-0">
                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                    </h5>
                                </div> -->
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="183.35">{{ $brandsCount }}</span> </h4>
                                    <!-- <a href="" class="text-decoration-underline">See details</a> -->
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                        <i class="bx bx-user-circle text-success"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total Products</p>
                                </div>
                                <!-- <div class="flex-shrink-0">
                                    <h5 class="text-muted fs-14 mb-0">
                                        +0.00 %
                                    </h5>
                                </div> -->
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-20 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                            data-target="165.89">{{ $productsCount }}</span></h4>
                                    <!-- <a href="" class="text-decoration-underline">Withdraw money</a> -->
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                        <i class="bx bx-wallet text-warning"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div> <!-- end row-->


        </div> <!-- end row-->

    </div> <!-- end .h-100-->

</div> <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
@endsection