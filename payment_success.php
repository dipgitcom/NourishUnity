<?php 
include('config.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        .success-section {
            padding: 40px;
            border-radius: 8px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-success">Payment Successful!</h2>
        <div class="success-section mt-4 text-center">
            <p>Your payment has been processed successfully. Thank you for your order!</p>
            <p>You will receive a confirmation email shortly.</p>
            <a href="orderfood.php" class="btn btn-primary">Order More Food</a>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
