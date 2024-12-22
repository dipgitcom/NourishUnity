<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
   
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

// Fetch user's donation history
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM donations WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute(['user_id' => $userId]);
$donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation History - FoodRescue.dd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
        }
        .container {
            margin-top: 50px;
        }
        table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Your Donation History</h2>
        <table class="table table-striped mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Donation ID</th>
                    <th>Amount (BDT)</th>
                    <th>Payment Method</th>
                    <th>Details</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?php echo $donation['id']; ?></td>
                    <td><?php echo number_format($donation['amount'], 2); ?></td>
                    <td><?php echo ucfirst($donation['payment_method']); ?></td>
                    <td><?php echo json_encode(json_decode($donation['payment_details'], true)); ?></td>
                    <td><?php echo date('d M Y, h:i A', strtotime($donation['created_at'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
