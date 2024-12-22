<?php 
include('config.php');
include('navbar.php'); ?>
<?php
session_start();
if (!isset($_SESSION['chef_id'])) {
    header("Location: login.php");  // Redirect to login page if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Recipe Video Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .upload-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 1rem;
            border-radius: 5px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="upload-form">
        <h2 class="text-center text-primary">Upload Recipe Video Tutorial</h2>
        <form action="submit_video_tutorial.php" method="POST" enctype="multipart/form-data">
            <!-- Recipe Title -->
            <div class="form-group">
                <label for="recipe-title">Recipe Title</label>
                <input type="text" class="form-control" id="recipe-title" name="recipe_title" placeholder="Enter the recipe title" required>
            </div>

            <!-- Video Upload -->
            <div class="form-group">
                <label for="video-file">Upload Video (MP4 format)</label>
                <input type="file" class="form-control" id="video-file" name="video_file" accept="video/mp4" required>
            </div>

            <!-- Recipe Details (optional) -->
            <div class="form-group">
                <label for="recipe-details">Recipe Details</label>
                <textarea class="form-control" id="recipe-details" name="recipe_details" rows="5" placeholder="Provide recipe details (ingredients, instructions)"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Submit Tutorial</button>
        </form>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
