@extends('frontend.layouts.master')
@section('title', $product->prd_name)
@section('content')
@include('frontend.flash')

<!--product-details-area start-->
<div class="product-details-area mt-20">
    <div class="container-fluid">
        <div class="product-details">
            <div class="row">
                <!-- Thumbnail Images Section (Main Image and Additional Images) -->
                <div class="col-lg-1 col-md-2">
                    <ul class="nav nav-tabs products-nav-tabs">
                        <li>
                            <a class="active" data-toggle="tab" href="#main-image">
                                <img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="{{ $product->prd_name }}" />
                            </a>
                        </li>
                        @if($product->prd_images)
                        @foreach(explode(',', $product->prd_images) as $index => $image)
                        <li>
                            <a data-toggle="tab" href="#product-{{ $index + 1 }}">
                                <img src="{{ asset('public/uploads/products/' . $image) }}" alt="{{ $product->prd_name }} - Image {{ $index + 1 }}" />
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>

                <!-- Product Images Display Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="tab-content">
                        <div id="main-image" class="tab-pane fade in show active">
                            <div class="product-details-thumb">
                                <a class="venobox" data-gall="myGallery" href="{{ asset('public/uploads/products/' . $product->prd_image) }}">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                                <img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="{{ $product->prd_name }}" />
                            </div>
                        </div>
                        @if($product->prd_images)
                        @foreach(explode(',', $product->prd_images) as $index => $image)
                        <div id="product-{{ $index + 1 }}" class="tab-pane fade">
                            <div class="product-details-thumb">
                                <a class="venobox" data-gall="myGallery" href="{{ asset('public/uploads/products/' . $image) }}">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                                <img src="{{ asset('public/uploads/products/' . $image) }}" alt="{{ $product->prd_name }} - Image {{ $index + 1 }}" />
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
              @php 
              $split = str_split($product->prd_description, 500);
              $desc = $split[0].'...';
              @endphp 
                <!-- Product Information Section -->
                <div class="col-lg-7 mt-sm-50">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="product-details-desc">
                                <h2>{{ $product->prd_name }}</h2>
                                <h3>Price: ₹{{ $product->prd_discount_price }}</h3>
                                <ul>{!! $desc !!}</ul>
                                <div class="product-meta">
                                    <ul class="list-none">
                                        <li>SKU: {{ $product->slug }}<span>|</span></li>
                                        <li>Category: <a href="#">{{ $product->category->name }}</a> <span>|</span></li>
                                        <li>Brand: <a href="#">{{ $product->brand->name }}</a></li>
                                    </ul>
                                </div>

                                <!-- Social Share Links -->
                                <div class="social-icons style-5">
                                    <span>Share Link:</span>
                                    @php
                                    $shareUrl = urlencode(route('product.details', $product->slug));
                                    $shareTitle = urlencode($product->prd_name);
                                    @endphp
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://pinterest.com/pin/create/button/?url={{ $shareUrl }}&media={{ asset('public/uploads/products/' . $product->prd_image) }}&description={{ $shareTitle }}" target="_blank"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Product Actions (like Price, Add to Cart) -->
                        <div class="col-lg-4 col-md-5">
                            <div class="product-action stuck text-left">
                                <!-- <div class="free-delivery">
                                    <a href="#"><i class="ti-truck"></i> Free Delivery</a>
                                </div> -->
                                <div class="product-price-rating">
                                    {{--<del>₹{{ $product->prd_price }}</del>--}}
                                    <span>₹{{ $product->prd_discount_price }}</span>
                                    <div class="pull-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="product-quantity mt-15">
                                    <label>Quantity:</label>
                                    <input type="number" min="0" value="1" />
                                </div>
                                <div class="add-to-get mt-50">
                                    <button id="add-to-cart-btn" data-product-id="{{ $product->id }}" class="btn btn-sacondary btn-block add-to-cart">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! $product->prd_description !!}
        <!-- Related Products Section -->
        <div class="related-products mt-50">
            <h3>Related Products</h3>
            <div class="row">
                @forelse($relatedProducts as $related)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="{{ route('product.details', $related->slug) }}">
                                <img class="default-img" src="{{ asset('public/uploads/products/' . $related->prd_image) }}" alt="{{ $related->prd_name }}">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{ route('product.details', $related->slug) }}">{{ $related->prd_name }}</a></h3>
                            <div class="product-price">
                                <span>₹{{ $related->prd_discount_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="col-12">No related products found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
<!--product-details-area end-->
<script>
    document.getElementById('add-to-cart-btn').addEventListener('click', function() {
        let productId = this.getAttribute('data-product-id');
        let quantity = document.querySelector('input[type="number"]').value;

        fetch("{{ route('cart.add') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => {
                if (response.headers.get('Content-Type').includes('text/html')) {
                    throw new Error('Please log in to add products to the cart');
                }
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.error || 'An error occurred');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    window.location.reload();
                } else {
                    alert(data.error);
                }
            })
            .catch(error => alert(error.message));
    });
</script>

@endsection