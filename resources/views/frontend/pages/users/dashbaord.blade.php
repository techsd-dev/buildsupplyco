@extends('frontend.layouts.master')
@section('title', 'User Dashboard')
@section('content')
<section class="tg-may-account-wrapp tg my-4">
    <div class="inner">
        <div class="tg-account">

            <!-- Accont banner astart -->
            <div class="account-banner">
                <div class="inner-banner">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-8 detail">
                                <div class="inner">
                                    <h3 class="page-title">Hello {{ Auth::user()->name }}!</h3>
                                    <p class="description">Aspernatur magni in repellat repellendus itaque consequuntur alias necessitatibus.</p>
                                </div>
                            </div>
                            <!-- Column end -->
                            <div class="col-md-4 profile">
                                <div class="profile">
                                    <span class="image">
                                        <img src="{{ url('public/uploads/user',Auth::user()->avatar) }}" alt="Yash" style="height: 120px; width: 120px; border-radius: 50%;">
                                    </span>
                                </div>
                            </div>
                            <!-- Column end -->
                        </div>
                        <!-- Row end -->

                        <!-- Navbar Start -->
                        <div class="nav-area mb-4">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-link" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail" data-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false"><i class="fas fa-user-alt"></i> <span>Profile</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="my-address" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false"><i class="fas fa-map-marker-alt"></i> <span>Address</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="my-order" data-toggle="tab" href="#my-orders" role="tab" aria-controls="my-orders" aria-selected="false"><i class="fas fa-file-invoice"></i> <span>Orders</span></a>
                                </li>
                                <li class="nav-item">
                                    <!-- <a class="nav-link" href="login.html"><i class="fas fa-sign-out-alt"></i> <span>Logout</span></a> -->
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><strong><i class="fa fa-user"></i></strong>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- Navbar End -->
                    </div>
                </div>
            </div>
            <!-- Banner end   -->

            <!-- Tabs Content start -->
            <div class="tabs tg-tabs-content-wrapp">
                <div class="inner">
                    <div class="container">
                        <div class="inner">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-link">
                                    <div class="my-account-dashboard mt-4">
                                        <div class="inner">
                                            <div class="row text-center">
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" area-toggle="my-order">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/orders_n2aopq.png"></a>
                                                            </div>
                                                            <h4 class="mt-3">Your Orders</h4>
                                                            <p> Review all your past purchases, track ongoing orders, and manage any returns. Stay updated on your order history with ease.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" area-toggle="my-address">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/notebook_psrhv5.png"></a>
                                                            </div>
                                                            <h4 class="mt-3">Your Addresses</h4>
                                                            <p>Manage your saved shipping and billing addresses. Ensure accurate and up-to-date information for faster, hassle-free checkouts.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="card" area-toggle="account-detail">
                                                        <div class="card-body">
                                                            <div class="text-center">
                                                                <a><img src="https://res.cloudinary.com/templategalaxy/image/upload/v1631257421/codepen-my-account/images/login_aq9v9z.png"></a>
                                                            </div>
                                                            <h4 class="mt-3">Account Details</h2>
                                                                <p>Update your personal information, including name, email, and password. Keep your profile current for a more personalized shopping experience.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="my-orders" role="tabpanel" aria-labelledby="my-order">
                                    <table id="my-orders-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Payment Status</th>
                                                <th>Order Status</th>
                                                <th>Total Amount</th>
                                                <!-- <th class="action">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                <td>{{ $item->product->prd_name }}</td>
                                                <td>{{ $item->quantity }}</td>

                                                {{-- Accessing the transactions for the order --}}
                                                <td>
                                                    @if($order->transactions->isNotEmpty())
                                                    {{-- If there are multiple transactions, we can display the status of the first one --}}
                                                    {{ $order->transactions->first()->status ?? 'Pending' }}
                                                    @else
                                                    Pending
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$order->status}}
                                                </td>

                                                <td>₹{{ $order->total / 100 }}</td>
                                                {{-- <td class="action"><a href="{{ url('orders.view', $order->id) }}" class="view-order">View Order</a></td> --}}
                                            </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>

                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="my-address">
                                    <div class="address-form">
                                        <div class="inner">
                                            <form class="tg-form" action="{{ route('user.address.save') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="inputAddress">Address</label>
                                                    <input type="text" name="address" class="form-control" id="inputAddress" value="{{ Auth::user()->address }}" placeholder="1234 Main St">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="inputAddress2">Address 2</label>
                                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                                </div> -->
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputCity">City</label>
                                                        <input type="text" name="city" placeholder="Enter city" class="form-control" value="{{ Auth::user()->city }}" id="inputCity">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputState">State</label>
                                                        <select id="inputState" name="state" class="form-control">
                                                            <option selected>--Choose State--</option>
                                                            @foreach($states as $state)
                                                            <option value="{{ $state->id }}" {{ Auth::user()->state == $state->id ? 'selected' : '' }}>{{ $state->state_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label for="inputZip">Zip</label>
                                                        <input type="text" value="{{ Auth::user()->pincode }}" name="pincode" class="form-control" id="inputZip">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-detail">
                                    <div class="account-detail-form">
                                        <div class="inner">
                                            <form class="tg-form" action="{{ route('update.auth.users.profile') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputfname">Name</label>
                                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="inputfname" placeholder="Enter your Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputlname">Email</label>
                                                        <input type="emial" readonly name="email" value="{{ Auth::user()->email }}" class="form-control" id="inputlname" placeholder="Enter Email">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputdname">Phone</label>
                                                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="inputdname" placeholder="Phone">
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Date Of Birth</label>
                                                        <input type="date" name="dob" value="{{ Auth::user()->dob }}" class="form-control" id="inputEmail4" placeholder="Date Of Birth(MM/DD/YYYY)">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputdob">Gender</label>
                                                        <select name="gender" class="form-control" id="">
                                                            <option value="">--Select Gender Type--</option>
                                                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                            <option value="other" {{ Auth::user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Avatar</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <img src="{{ url('public/uploads/user',Auth::user()->avatar) }}" alt="Yash" style="height: 50px; width: 50px; border-radius: 50%;">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection