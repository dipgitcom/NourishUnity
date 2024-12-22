<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank You - NourishUnity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .thank-you-container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .thank-you-container h1 {
            color: #28a745;
        }
        .thank-you-container p {
            margin-top: 10px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <p>Your donation has been received successfully.</p>
        <a href="donation_history.php" class="btn btn-primary mt-4">View Donation History</a>
        <a href="index.php" class="btn btn-secondary mt-4">Go to Home</a>
    </div>
</body>
</html>
