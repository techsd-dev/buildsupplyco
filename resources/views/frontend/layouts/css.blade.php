<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>@yield('title', 'Home Page')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="site.webmanifest">
	<link rel="apple-touch-icon" href="icon.png') }}">
	<!-- Place favicon.ico in the root directory -->

	<!-- bootstrap v4.0.0 -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}">
	<!-- fontawesome-icons css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/font-awesome.min.css') }}">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/themify-icons.css') }}">
	<!-- elegant css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/elegant.css') }}">
	<!-- elegant css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/jquery.mmenu.css') }}">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/jquery-ui.min.css') }}">
	<!-- perfect-scrollbar css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/perfect-scrollbar.css') }}">
	<!-- venobox css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/venobox.css') }}">
	<!-- slick css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slick.css') }}">
	<!-- slick-theme css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/slick-theme.css') }}">
	<!-- cssanimation css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/cssanimation.min.css') }}" />
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/animate.css') }}" />
	<!-- helper css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/helper.css') }}">
	<!-- style css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
	<!-- responsive css -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/responsive.css') }}">

	<script>
    function requestLocationAccess() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    const userId = {{ auth()->check() ? auth()->user()->id : 'null' }}; // Get user ID if authenticated

                    // Only send data if user ID is available
                    if (userId) {
                        // Send location data to the backend
                        fetch("{{ route('save.location') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                latitude: latitude,
                                longitude: longitude,
                                user_id: userId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Location saved successfully!");
                            } else {
                                console.warn("Failed to save location.");
                            }
                        })
                        .catch(error => console.error("Error:", error));
                    } else {
                        console.log("User is not authenticated; skipping location save.");
                    }
                },
                function(error) {
                    console.warn("Error (" + error.code + "): " + error.message);
                }
            );
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    // Trigger location access request when the page loads
    window.onload = requestLocationAccess;
</script>


</head>