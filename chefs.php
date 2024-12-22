
<?php 
include('auth.php');
include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chef Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .registration-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="registration-form">
        <h2 class="text-center text-primary">Chef Registration</h2>
        <form action="register_chef.php" method="POST" enctype="multipart/form-data">
            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a password" required>
            </div>

            <!-- Specialty -->
            <div class="form-group">
                <label for="specialty">Specialty (e.g., Continental, Desserts)</label>
                <input type="text" class="form-control" id="specialty" name="specialty" placeholder="Enter your culinary specialty" required>
            </div>

            <!-- Profile Image -->
            <div class="form-group">
                <label for="profile_image">Profile Image</label>
                <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
