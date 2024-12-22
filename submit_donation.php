<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    // Redirect to thank you page
header("Location: thank_you.php");


    exit();
}

// Database connection
$host = 'localhost';
$db = 'nourishunity';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Get logged-in user's ID
    $amount = htmlspecialchars($_POST['amount']);
    $paymentMethod = htmlspecialchars($_POST['payment_method']);
    $paymentDetails = [];

    // Capture additional payment details based on the payment method
    if ($paymentMethod === 'bkash') {
        $paymentDetails = [
            'bkash_number' => htmlspecialchars($_POST['bkash_number']),
            'transaction_id' => htmlspecialchars($_POST['bkash_transaction_id']),
        ];
    } elseif ($paymentMethod === 'nagad') {
        $paymentDetails = [
            'nagad_number' => htmlspecialchars($_POST['nagad_number']),
            'transaction_id' => htmlspecialchars($_POST['nagad_transaction_id']),
        ];
    } elseif ($paymentMethod === 'rocket') {
        $paymentDetails = [
            'rocket_number' => htmlspecialchars($_POST['rocket_number']),
            'transaction_id' => htmlspecialchars($_POST['rocket_transaction_id']),
        ];
    } elseif ($paymentMethod === 'credit-card') {
        $paymentDetails = [
            'card_number' => htmlspecialchars($_POST['card_number']),
            'expiry_date' => htmlspecialchars($_POST['expiry_date']),
            'cvv' => htmlspecialchars($_POST['cvv']),
        ];
    }

    try {
        // Insert donation data into the database
        $sql = "INSERT INTO donations (user_id, amount, payment_method, payment_details) 
                VALUES (:user_id, :amount, :payment_method, :payment_details)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'user_id' => $userId,
            'amount' => $amount,
            'payment_method' => $paymentMethod,
            'payment_details' => json_encode($paymentDetails), // Store as JSON
        ]);

        // Redirect to a thank-you page or show a success message
        echo "<script>alert('Thank you for your donation!'); window.location.href='donate.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
