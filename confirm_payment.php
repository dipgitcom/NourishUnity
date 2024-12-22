<?php
session_start();

// Simulate a database connection (replace with your actual database connection code)
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

// Validate payment data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentMethod = $_POST['payment_method'] ?? '';
    $totalAmount = $_SESSION['total'] ?? 0; // Total amount from the session (or cart)
    
    if ($paymentMethod === '') {
        die("Invalid payment method. Please go back and select a payment method.");
    }

    $paymentDetails = [];
    switch ($paymentMethod) {
        case 'bkash':
            $paymentDetails['number'] = $_POST['bkash_number'] ?? '';
            $paymentDetails['transaction_id'] = $_POST['bkash_transaction_id'] ?? '';
            if (empty($paymentDetails['number']) || empty($paymentDetails['transaction_id'])) {
                die("Bkash payment details are missing. Please go back and provide all required details.");
            }
            break;

        case 'nagad':
            $paymentDetails['number'] = $_POST['nagad_number'] ?? '';
            $paymentDetails['transaction_id'] = $_POST['nagad_transaction_id'] ?? '';
            if (empty($paymentDetails['number']) || empty($paymentDetails['transaction_id'])) {
                die("Nagad payment details are missing. Please go back and provide all required details.");
            }
            break;

        case 'rocket':
            $paymentDetails['number'] = $_POST['rocket_number'] ?? '';
            $paymentDetails['transaction_id'] = $_POST['rocket_transaction_id'] ?? '';
            if (empty($paymentDetails['number']) || empty($paymentDetails['transaction_id'])) {
                die("Rocket payment details are missing. Please go back and provide all required details.");
            }
            break;

        case 'credit-card':
            $paymentDetails['card_number'] = $_POST['card_number'] ?? '';
            $paymentDetails['expiry_date'] = $_POST['expiry_date'] ?? '';
            $paymentDetails['cvv'] = $_POST['cvv'] ?? '';
            if (empty($paymentDetails['card_number']) || empty($paymentDetails['expiry_date']) || empty($paymentDetails['cvv'])) {
                die("Credit card payment details are missing. Please go back and provide all required details.");
            }
            break;

        default:
            die("Unknown payment method.");
    }

    // Save payment details to the database
    try {
        $query = "INSERT INTO payments (payment_method, total_amount, details, created_at) VALUES (:payment_method, :total_amount, :details, NOW())";
        $stmt = $conn->prepare($query);
        $stmt->execute([
            ':payment_method' => $paymentMethod,
            ':total_amount' => $totalAmount,
            ':details' => json_encode($paymentDetails)
        ]);

        // Clear the cart session after successful payment
        unset($_SESSION['cart']);
        unset($_SESSION['total']);

        // Redirect to the success page
        header("Location: payment_success.php");
        exit;
    } catch (Exception $e) {
        die("Failed to save payment details: " . $e->getMessage());
    }
} else {
    die("Invalid request method.");
}
?>
