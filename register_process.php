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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

    // Check if email already exists
    $checkSql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($checkSql);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() > 0) {
        echo "Email is already registered. <a href='signup.php'>Try again</a>";
        exit();
    }

    // Insert into database
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

    echo "Registration successful! <a href='login.php'>Login now</a>";
}
?>
