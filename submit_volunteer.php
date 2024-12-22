<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $role = htmlspecialchars($_POST['role']);
    $message = htmlspecialchars($_POST['message']);

    try {
        // Insert data into the volunteers table
        $sql = "INSERT INTO volunteers (name, email, phone, role, message) 
                VALUES (:name, :email, :phone, :role, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'message' => $message,
        ]);

        // Redirect to a thank-you page or display a success message
        echo "<script>alert('Thank you for joining as a volunteer!'); window.location.href='food_rescue.php';</script>";
    } catch (PDOException $e) {
        // Handle errors (e.g., duplicate email)
        if ($e->getCode() == 23000) { // 23000 is the SQLSTATE code for unique constraint violations
            echo "<script>alert('This email is already registered. Please use a different email.'); window.history.back();</script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
