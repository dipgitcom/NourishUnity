<?php
// Database connection (replace with actual credentials)
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password
    $specialty = htmlspecialchars($_POST['specialty']);
    $profileImage = '';

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $targetDir = "uploads/profiles/";
        $targetFile = $targetDir . basename($_FILES['profile_image']['name']);
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
            $profileImage = $targetFile;
        }
    }

    // Insert user into the users table
    $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'chef')";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

    // Get the user ID
    $userId = $conn->lastInsertId();

    // Insert into chefs table
    $sql = "INSERT INTO chefs (user_id, specialty, profile_image) VALUES (:user_id, :specialty, :profile_image)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'user_id' => $userId,
        'specialty' => $specialty,
        'profile_image' => $profileImage
    ]);

    echo "Chef registered successfully!";
    // Redirect to another page or show success message
}
?>
