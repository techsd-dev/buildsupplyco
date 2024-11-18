<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase!</title>
    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>HakDuck - About Us</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="manifest" href="site.webmanifest">
	<link rel="apple-touch-icon" href="icon.png">
	<!-- Place favicon.ico in the root directory -->
  
	<!-- bootstrap v4.0.0 -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- fontawesome-icons css -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- themify-icons css -->
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<!-- elegant css -->
	<link rel="stylesheet" href="assets/css/elegant.css">
	<!-- elegant css -->
	<link rel="stylesheet" href="assets/css/jquery.mmenu.css">
	<!-- jquery-ui.min css -->
	<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<!-- venobox css -->
	<link rel="stylesheet" href="assets/css/venobox.css">
	<!-- slick css -->
	<link rel="stylesheet" href="assets/css/slick.css">
	<!-- slick-theme css -->
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<!-- cssanimation css -->
	<link rel="stylesheet" href="assets/css/cssanimation.min.css" />
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css" />	
	<!-- helper css -->
	<link rel="stylesheet" href="assets/css/helper.css">
	<!-- style css -->
	<link rel="stylesheet" href="style.css">
	<!-- responsive css -->
	<link rel="stylesheet" href="assets/css/responsive.css">
    <style>
        /* Custom styles */
        body {
            background: linear-gradient(135deg, #76b2fe 0%, #b69efe 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .thank-you-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            padding: 40px;
            max-width: 700px;
            width: 100%;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }
        .thank-you-card h1 {
            font-size: 2.5rem;
            color: #28a745;
            margin-bottom: 20px;
            animation: bounceIn 1s ease-in-out;
        }
        .thank-you-card .order-detail, .thank-you-card .shipping-billing {
            background: #f7f9fc;
            border-radius: 10px;
            padding: 20px;
            text-align: left;
            margin-top: 20px;
        }
        .thank-you-card h5 {
            font-weight: bold;
            color: #333;
            margin-top: 15px;
        }
        .thank-you-card .btn-primary {
            background-color: #28a745;
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 1.1rem;
            margin-top: 30px;
            transition: background-color 0.3s;
        }
        .thank-you-card .btn-primary:hover {
            background-color: #218838;
        }
       
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes bounceIn {
            0% { transform: scale(0.5); opacity: 0; }
            80% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="thank-you-card text-center my-5">
        <h1>Thank You!</h1>
        <p>Your order has been successfully processed. We’re excited to get your items to you as soon as possible!</p>
        
        <!-- Order Details Section -->
        <div class="order-detail mt-4 p-3">
            <h5>Order Summary</h5>
            <p><strong>Order ID:</strong> {{ $orderId }}</p>
            <p><strong>Transaction ID:</strong> {{ $mrTrsId }}</p>
            <p><strong>Order Date:</strong> October 30, 2024</p>
            <p><strong>Payment Method:</strong> Credit Card (Visa)</p>
        </div>
        
        <!-- Shipping and Billing Addresses Section -->
        <!-- <div class="shipping-billing row mt-4">
            <div class="col-md-6">
                <h5>Shipping Address</h5>
                <p>John Doe<br>
                   1234 Elm Street<br>
                   Springfield, IL, 62704<br>
                   USA
                </p>
            </div>
            <div class="col-md-6">
                <h5>Billing Address</h5>
                <p>John Doe<br>
                   1234 Elm Street<br>
                   Springfield, IL, 62704<br>
                   USA
                </p>
            </div>
        </div> -->

        <!-- Ordered Items Table -->
        <!-- <div class="order-detail mt-4 p-3">
            <h5>Items Ordered</h5>
            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product Name A</td>
                        <td>2</td>
                        <td>$20.00</td>
                    </tr>
                    <tr>
                        <td>Product Name B</td>
                        <td>1</td>
                        <td>$15.00</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th>$55.00</th>
                    </tr>
                </tfoot>
            </table>
        </div> -->

        <a href="{{url('/')}}" class="btn btn-primary mt-4">Continue Shopping</a>
    </div>

    <!-- Bootstrap 4 JavaScript (Optional for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
