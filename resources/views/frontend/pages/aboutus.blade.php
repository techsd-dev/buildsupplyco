@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@section('content')
@include('frontend.flash')
<!--page-banner-area start-->
<div class="page-banner-area bg-1" style="background-image: url('{{ asset('public/uploads/about/' . $data->banner) }}');">
    <div class="container">
        <div class="row align-items-center height-400">
            <div class="col-lg-8 offset-lg-4">
                <div class="page-banner-text">
                    <h2>Welcome To BuildSupplyCo</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner-area end-->

<!--about-area start-->
<div class="about-area mt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img class="img-100p" src="{{ asset('public/uploads/about/' . $data->image) }}" alt="" />
            </div>
            <div class="col-lg-6 mt-sm-30">
                <div id="accordion">
                    @foreach($faqs as $key => $faq)
                    <div class="card single-faq">
                        <div class="card-header faq-heading" id="heading{{ $key }}">
                            <h5 class="mb-0">
                                <a href="#collapse{{ $key }}" class="btn btn-link" data-toggle="collapse" aria-expanded="{{ $key == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $key }}">
                                    {{ $faq->question }}
                                    <i class="fa fa-plus-circle pull-right"></i>
                                    <i class="fa fa-minus-circle pull-right"></i>
                                </a>
                            </h5>
                        </div>

                        <div id="collapse{{ $key }}" class="collapse {{ $key == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                            <div class="card-body">
                                <p>{{ $faq->ans }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--about-area end-->
<!--office-address-area start-->
<div class="office-address-area mt-40">
    <div class="container br-bottom pb-45">
        <div class="row">
            <div class="col-md-4">
                <div class="office-address">
                    <h3>France</h3>
                    <p>40 Baria Sreet 133/2 NewYork City, US</p>
                    <p>Email: info.contact@gmail.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="office-address">
                    <h3>United States</h3>
                    <p>40 Baria Sreet 133/2 NewYork City, US</p>
                    <p>Email: info.contact@gmail.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="office-address">
                    <h3>Viet Nam</h3>
                    <p>40 Baria Sreet 133/2 NewYork City, US</p>
                    <p>Email: info.contact@gmail.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--office-address-area end-->
<!--brands-area start-->
<div class="container mt-10">
    <div class="brands-area br-none">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-items">
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/1.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/2.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/3.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/4.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/5.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/6.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/7.jpg') }}" alt="" />
                        </a>
                    </div>
                    <div class="brand-item">
                        <a href="#">
                            <img class="brand-static" src="{{ asset('public/frontend/assets/images/brands/8.jpg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--brands-area end-->
<!--google-map area start-->
<!-- <div class="google-map-area mt-80">
		<div id="googleMap" style="width:100%;height:620px;"></div>
	</div> -->
<!--google-map area end-->

<!--google-map-->
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
<script>
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: true,
            center: new google.maps.LatLng(40.6700, -73.9400), // New York

            styles: [{
                    "featureType": "all",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                            "saturation": 36
                        },
                        {
                            "color": "#333333"
                        },
                        {
                            "lightness": 40
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                            "visibility": "on"
                        },
                        {
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "all",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "color": "#fefefe"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f5f5f5"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#dedede"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#ffffff"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#f2f2f2"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                            "color": "#e9e9e9"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                }
            ]
        };
        var mapElement = document.getElementById('googleMap');

        var map = new google.maps.Map(mapElement, mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.6700, -73.9400),
            map: map
        });
    }
</script>

@endsection