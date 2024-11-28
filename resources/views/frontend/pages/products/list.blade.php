@extends('frontend.layouts.master')
@section('title', 'Product List')
@section('content')
@include('frontend.flash')
<style>
    .hidden {
        display: none;
    }
</style>
<!--products-area start-->
<div class="shop-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3">
                <div class="sidebar">
                    <div class="vertical-menu">
                        <ul>
                            @if(isset($categories) && $categories->isNotEmpty())
                            @foreach($categories as $row)
                            <li><a href="{{ route('prodList', $row->slug) }}">{{ $row->name }}</a></li>
                            @endforeach
                            @else
                            <li>No categories available.</li>
                            @endif

                        </ul>
                    </div>
                    <div class="price_filter mt-40">
                        <div class="section-title">
                            <h3>Filter by price</h3>
                        </div>
                        <form action="{{ route('prodList', ['slug' => Request::segment(2)]) }}" method="GET" id="price-filter-form">
                            <div class="price_slider_amount">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <input
                                            type="text"
                                            id="amount"
                                            readonly
                                            placeholder="Price Range" />
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                            <div id="slider-range"></div>

                            <!-- Hidden inputs to send data to the server -->
                            <input type="hidden" name="min_price" id="min-price" />
                            <input type="hidden" name="max_price" id="max-price" />
                        </form>
                    </div>

                    <div class="list-filter mt-43">
                        <div class="section-title">
                            <h3>Brands</h3>
                        </div>
                        <ul class="list-none mt-25">
                            <form action="{{ route('prodList', ['slug' => Request::segment(2)]) }}" method="GET" id="brand-filter-form">
                                @if(isset($brands) && $brands->isNotEmpty())
                                @foreach ($brands as $key => $brand)
                                @php
                                $split = str_split($brand->name, 20);
                                $brnd = $split[0] . (strlen($brand->name) > 20 ? '..' : '');
                                @endphp
                                <li class="brand-item1 {{ $key >= 5 ? 'hidden' : '' }}">
                                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}" id="{{ strtolower($brand->name) }}"
                                        @if(in_array($brand->id, request('brands', []))) checked @endif />
                                    <label for="{{ strtolower($brand->name) }}" title="{{ $brand->name }}">{{ $brnd }}</label>
                                </li>
                                @endforeach
                                @else
                                <li>No brands available.</li>
                                @endif

                                <li><a href="javascript:void(0);" id="toggle-brands" class="show-more-btn">+ Show more</a></li>
                                <button type="submit" class="filter-submit-btn">Apply Filter</button>
                            </form>
                        </ul>
                    </div>

                    <!-- <div class="list-filter mt-43">
                        <div class="section-title">
                            <h3>Colors</h3>
                        </div>
                        <ul class="list-none mt-25">
                            <li>
                                <input type="checkbox" id="black" />
                                <label for="black">Black</label>
                            </li>
                            <li>
                                <input type="checkbox" id="pink" />
                                <label for="pink">Pink</label>
                            </li>
                            <li>
                                <input type="checkbox" id="white" />
                                <label for="white">White</label>
                            </li>
                            <li>
                                <input type="checkbox" id="blue" />
                                <label for="blue">Blue</label>
                            </li>
                            <li>
                                <input type="checkbox" id="orange" />
                                <label for="orange">Orange</label>
                            </li>
                            <li><a href="#">+ Show more</a></li>
                        </ul>
                    </div> -->
                    <!--latest-products-->
                    <div class="products-list mt-30">
                        <div class="section-title mb-30">
                            <h3>Latest Items</h3>
                        </div>
                        <div class="one-carousel dots-none">
                            @foreach ($products->chunk(5) as $chunk)
                            <div>
                                <ul class="list-none">
                                    @foreach ($chunk as $row)
                                    @php
                                    $split = str_split($row->prd_name, 10);
                                    $prdName = $split[0].'...';
                                    @endphp
                                    <li>
                                        <div class="product-single style-2">
                                            <div class="row align-items-center m-0">
                                                <div class="col-lg-4 p-0">
                                                    <div class="product-thumb">
                                                        <a href="{{ route('product.details', $row->slug) }}">
                                                            <img src="{{ asset('public/uploads/products/' . ($row->prd_image ?? 'default.jpg')) }}" alt="" />
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 p-0">
                                                    <div class="product-title">
                                                        <h4><a href="{{ route('product.details', $row->slug) }}" title="{{ $row->prd_name }}">{{ $prdName }}</a></h4>
                                                    </div>
                                                    <div class="product-price-rating">
                                                        <span>₹{{ $row->prd_price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-6">
                        <div class="section-title">
                            <h3>Products</h3>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="products-sort">
                            <!-- <form>
                                <select>
                                    <option>Default Sorting</option>
                                    <option>Sort by A - Z</option>
                                    <option>Sort Price Low - High</option>
                                </select>
                            </form> -->
                        </div>
                        <div class="products-sort">
                            <!-- <form>
                                <label>Show :</label>
                                <select>
                                    <option>12</option>
                                    <option>8</option>
                                    <option>4</option>
                                </select>
                            </form> -->
                        </div>
                    </div>
                    <!-- <div class="col-lg-5 col-md-6">
                        <div class="products-sort">
                            <form>
                                <select>
                                    <option>Default Sorting</option>
                                    <option>Sort by A - Z</option>
                                    <option>Sort Price Low - High</option>
                                </select>
                            </form>
                        </div>
                        <div class="products-sort">
                            <form>
                                <label>Show :</label>
                                <select>
                                    <option>12</option>
                                    <option>8</option>
                                    <option>4</option>
                                </select>
                            </form>
                        </div>
                    </div> -->
                    <div class="col-lg-5 col-md-12">
                        <div class="site-pagination pull-right">
                            <ul>
                                <li><a href="#" class="active">1</a></li>
                                <li>of</li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="product-view-system pull-right" role="tablist">
                            <ul class="nav nav-tabs">
                                <li><a class="active" data-toggle="tab" href="#grid-products"><img src="{{ asset('public/frontend/assets/images/icons/icon-grid.png') }}" alt="" /></a></li>
                                <li><a data-toggle="tab" href="#list-products"><img src="{{ asset('public/frontend/assets/images/icons/icon-list.png') }}" alt="" /></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="grid-products" class="tab-pane active">
                        <div class="row">
                            <style>
                                .product-wishlist.added i {
                                    background-color: red;
                                }
                            </style>
                            @foreach($products as $row)
                            <div class="col-xl-3 col-md-4 col-sm-6">
                                <div class="product-single">
                                    <div class="product-title">
                                        <!-- Category and Product Title -->
                                        <small><a href="#">{{ $row->category->name }}</a></small> <!-- Category Name -->
                                        <h4><a href="#">{{ $row->prd_name }}</a></h4> <!-- Product Name -->
                                    </div>
                                    <div class="product-thumb">
                                        <a href="{{ route('product.details', $row->slug) }}">
                                            <img src="{{ asset('public/uploads/products/' . ($row->prd_image ?? 'default.jpg')) }}" alt="{{ $row->prd_name }}" />
                                        </a>
                                        <div class="product-quick-view">
                                            <a href="javascript:void(0);" class="quick-view-btn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#quick-view">quick view</a>
                                        </div>
                                    </div>
                                    <div class="product-price-rating">
                                        <div class="pull-left">
                                            <!-- Product Price -->
                                            <span>₹{{ number_format($row->prd_price, 2) }}</span> <!-- Price -->
                                        </div>
                                        {{--<div class="pull-right">
                                            <!-- Example: Star rating - You can adjust this as needed -->
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="fa {{ $i < $row->rating ? 'fa-star' : 'fa-star-o' }}"></i>
                                        @endfor
                                        <span class="rating-quantity">({{ $row->rating_count ?? 0 }})</span> <!-- Rating Count -->
                                    </div>--}}
                                </div>
                                <div class="product-action">
                                    <!-- Action buttons like Compare, Add to Cart, Wishlist -->
                                    <a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
                                    <input type="hidden" value="1" min="1" class="product-quantity" />
                                    <a href="javascript:void(0);" class="add-to-cart" data-product-id="{{ $row->id }}">Add to Cart</a>
                                    <a href="javascript:void(0);" class="product-wishlist" data-product-id="{{ $row->id }}"><i class="ti-heart"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div id="list-products" class="tab-pane">
                    @foreach($products as $row)
                    <div class="product-single wide-style">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="product-thumb">
                                    <a href="{{ route('product.details', $row->slug) }}"><img src="{{ asset('public/uploads/products/' . ($row->prd_image ?? 'default.jpg')) }}" alt="{{ $row->prd_name }}" /></a>
                                    <div class="product-quick-view">
                                        <a href="javascript:void(0);" class="quick-view-btn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#quick-view">quick view</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-8 product-desc mt-md-50 sm-mt-50">
                                <a href="javascript:void(0);" class="add-to-wishlist product-wishlist" data-product-id="{{ $row->id }}"><i class="icon_heart_alt"></i></a>
                                <div class="product-title">
                                    <small><a href="#">{{ $row->category->name }}</a></small>
                                    <h4><a href="#">{{ $row->prd_name }}</a></h4>
                                </div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="product-text">
                                    {!! $row->prd_description !!}
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-4">
                                <div class="product-action stuck text-left">
                                    <div class="free-delivery">
                                        <a href="#"><i class="ti-truck"></i> Free Delivery</a>
                                    </div>
                                    <div class="product-price-rating">
                                        <!-- <div>
                                            <del>629.99</del>
                                        </div> -->
                                        <span>₹{{ number_format($row->prd_price, 2) }}</span>
                                    </div>
                                    <div class="product-stock">
                                        <p>Avability: <span>In stock</span></p>
                                    </div>
                                    <a href="#" class="add-to-cart">Add to Cart</a>
                                    <!-- <a href="#" class="add-to-cart compare">+ ADD to Compare</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row align-items-center mt-30">
                <div class="col-lg-6">
                    <div class="site-pagination">
                        <ul>
                            <li><a href="#" class="active">1</a></li>
                            <li>of</li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-results pull-right">
                        <span>Showing 1–3 of 60 results</span>
                        <div class="products-sort ml-35 mr-0">
                            <form>
                                <label>Show :</label>
                                <select>
                                    <option>12</option>
                                    <option>8</option>
                                    <option>4</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--recently-viewed-products-start-->
            <div class="recent-viewed-products mt-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h3>Recently Viewed Products</h3>
                        </div>
                    </div>
                </div>
                <div class="row recent-products mlr-minus-12">
                    @if(isset($productsByCat) && $productsByCat->isNotEmpty())
                    @foreach($productsByCat as $product)
                    <div class="col-lg-4">
                        <!--single-product-->
                        <div class="product-single style-2">
                            <div class="row align-items-center">
                                <div class="col-lg-6 p-0">
                                    <div class="product-thumb">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="{{ $product->prd_name }}" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0">
                                    <div class="product-title">
                                        <small>
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                {{ $product->category->name ?? 'Uncategorized' }}
                                            </a>
                                        </small>
                                        <h4>
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                {{ $product->prd_name }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="product-price-rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <div class="product-price-rating">
                                        <span>₹{{ $product->prd_price }}</span>
                                        @if($product->prd_discount_price)
                                        <del>₹{{ $product->prd_discount_price }}</del>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--single-product-->
                    </div>
                    @endforeach
                    @else
                    <div class="col-lg-12">
                        <p>No products available in this category.</p>
                    </div>
                    @endif

                </div>
            </div>
            <!--recently-viewed-products-end-->
        </div>
    </div>
</div>
</div>
<!--products-area end-->

<!--brands-area start-->
<div class="container-fluid mt-60">
    <div class="brands-area">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-items">
                    @if(isset($categories) && $categories->isNotEmpty())
                    @foreach($categories as $row)
                    <div class="brand-item" title="{{ $row->name }}">
                        <a href="{{ route('prodList', $row->slug) }}">
                            <img class="brand-static"
                                src="{{ url('public/uploads/categories/', $row->images) }}"
                                alt="{{ $row->name }}" />
                        </a>
                    </div>
                    @endforeach
                    @else
                    <div class="brand-item">
                        <p>No categories available.</p>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!--brands-area end-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Event listener for Quick View button
        $('.quick-view-btn').on('click', function() {
            var productId = $(this).data('id'); // Get product ID

            // AJAX request to fetch product details
            $.ajax({
                url: "{{url('/product-quick-view/')}}/" + productId, // Adjust the URL as needed
                type: 'GET',
                success: function(response) {
                    // Populate modal with product data
                    $('#productImage').attr('src', response.image);
                    $('#quick-view .product.details-desc h2').text(response.name);
                    $('#brand').text(response.brand);
                    $('#qty').text(response.qty);
                    $('#descriptionprd').html(response.description);
                    $('#quick-view .product-price-rating del').text('Price');
                    $('#quick-view .product-price-rating span').text(response.disc_price);
                    // Ratings
                    var stars = '';
                    for (var i = 0; i < 5; i++) {
                        stars += i < response.rating ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
                    }
                    $('#quick-view .product-price-rating .pull-right').html(stars);
                    // Populate category, tags, etc.
                    $('#quick-view .product-meta .categories').html(response.categories);
                    $('#quick-view .product-meta .tags').html(response.tags);
                    // Color options
                    var colors = '';
                    response.colors.forEach(function(color) {
                        colors += '<li>' + color + '</li>';
                    });
                    $('#quick-view .product-colors ul').html(colors);
                },
                error: function() {
                    alert('Error retrieving product details');
                }
            });
        });
    });
</script>
<script>
    document.querySelectorAll('.add-to-cart').forEach(function(element) {
        element.addEventListener('click', function() {
            let productId = this.getAttribute('data-product-id');
            let quantity = document.querySelector('.product-quantity').value;
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
                    }
                })
                .catch(error => {
                    alert(error.message); // Display the error message if not logged in
                });
        });
    });
</script>
<script>
    $(document).on('click', '.product-wishlist', function() {
        let productId = $(this).data('product-id');
        let action = $(this).hasClass('added') ? 'remove' : 'add';

        $.ajax({
            url: action === 'add' ? "{{ route('wishlist.add') }}" : "{{ route('wishlist.remove') }}",
            method: 'POST',
            data: {
                product_id: productId,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    let message = action === 'add' ? 'Added to wishlist!' : 'Removed from wishlist!';
                    alert(response.message);
                    window.location.reload();
                    if (action === 'add') {
                        $(`.product-wishlist[data-product-id="${productId}"]`).addClass('added');
                    } else {
                        $(`.product-wishlist[data-product-id="${productId}"]`).removeClass('added');
                    }
                } else {
                    alert(response.message);
                }
            }
        });
    });

    // show more brands 
    document.addEventListener('DOMContentLoaded', function() {
        const toggleButton = document.getElementById('toggle-brands');
        const hiddenItems = document.querySelectorAll('.brand-item1.hidden');

        toggleButton.addEventListener('click', function() {
            hiddenItems.forEach(item => item.classList.toggle('hidden'));

            // Toggle button text
            if (toggleButton.textContent.trim() === '+ Show more') {
                toggleButton.textContent = '- Show less';
            } else {
                toggleButton.textContent = '+ Show more';
            }
        });
    });
</script>
@endsection