<?php
session_start();

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        // Redirect to intended page or default dashboard
        $redirect = isset($_SESSION['redirect_to']) ? $_SESSION['redirect_to'] : 'index.php';
        unset($_SESSION['redirect_to']); // Clear redirect session variable
        header("Location: $redirect");
        exit();
    } else {
        echo "Invalid email or password. <a href='login.php'>Try again</a>";
    }
}
?>
