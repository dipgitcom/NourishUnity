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
echo ("Database connection");

// Fetch user details
$userId = $_SESSION['user_id'];
$sql = "SELECT name, email, role, profile_image FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $profileImage = $user['profile_image'];

    // Handle profile image upload
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $targetDir = "uploads/profiles/";
        $targetFile = $targetDir . basename($_FILES['profile_image']['name']);
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
            $profileImage = $targetFile;
        }
    }

    // Update user details
    if ($password) {
        $updateSql = "UPDATE users SET name = :name, password = :password, profile_image = :profile_image WHERE id = :id";
        $stmt = $conn->prepare($updateSql);
        $stmt->execute(['name' => $name, 'password' => $password, 'profile_image' => $profileImage, 'id' => $userId]);
    } else {
        $updateSql = "UPDATE users SET name = :name, profile_image = :profile_image WHERE id = :id";
        $stmt = $conn->prepare($updateSql);
        $stmt->execute(['name' => $name, 'profile_image' => $profileImage, 'id' => $userId]);
    }

    $_SESSION['name'] = $name; // Update session with new name
    echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
        }
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
            border: 3px solid #007bff;
        }
        .profile-header h2 {
            margin: 0;
            color: #007bff;
        }
        .role-badge {
            font-size: 1rem;
            margin-top: 5px;
            color: white;
            background-color: #28a745;
            border-radius: 15px;
            padding: 5px 10px;
            display: inline-block;
        }
        .custom-file-upload {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }
        .custom-file-upload:hover {
            background-color: #0056b3;
        }
        .input-file {
            display: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <img id="profile_img_preview" src="<?php echo $user['profile_image'] ?: 'uploads/profiles/default-profile.png'; ?>" alt="Profile Picture" class="profile-img">
            <div>
                <h2><?php echo htmlspecialchars($user['name']); ?></h2>
                <span class="role-badge"><?php echo ucfirst($user['role']); ?></span>
            </div>
        </div>

        <!-- Profile Form -->
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <!-- Custom Profile Picture Upload -->
            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <label for="profile_image" class="custom-file-upload">
                    Choose File
                </label>
                <input type="file" class="input-file" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(event)">
            </div>
        
         <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password (optional)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a new password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update Profile</button>
        </form>
    </div>

    <script>
        // Preview the uploaded profile image
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile_img_preview');
                output.src = reader.result; // Set the uploaded image as source for the preview
            };
            reader.readAsDataURL(event.target.files[0]); // Read the file as data URL
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
