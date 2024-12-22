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

// Handle video tutorial submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipeTitle = htmlspecialchars($_POST['recipe_title']);
    $recipeDetails = htmlspecialchars($_POST['recipe_details']);
    $videoFile = '';

    // Handle video upload
    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $targetDir = "uploads/videos/";
        $targetFile = $targetDir . basename($_FILES['video_file']['name']);
        if (move_uploaded_file($_FILES['video_file']['tmp_name'], $targetFile)) {
            $videoFile = $targetFile;
        }
    }

    // Insert video tutorial details into the database
    $sql = "INSERT INTO recipes (chef_id, title, ingredients, instructions, video_url) 
            VALUES (:chef_id, :recipe_title, :ingredients, :instructions, :video_url)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'chef_id' => $_SESSION['chef_id'],  // Assume chef_id is stored in session
        'recipe_title' => $recipeTitle,
        'ingredients' => $recipeDetails,
        'instructions' => $recipeDetails,
        'video_url' => $videoFile
    ]);

    echo "Video tutorial uploaded successfully!";
}
?>
