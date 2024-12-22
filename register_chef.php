<?php 
include('config.php');
include('navbar.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register as a Chef</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="registration-section">
            <h2 class="text-center">Register as a Chef</h2>
            <p class="text-center">Join our community to help create delicious meals for those in need.</p>

            <!-- Feedback Messages -->
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($_SESSION['success']); ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php elseif (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($_SESSION['error']); ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="submit_chef.php" method="POST">
                <!-- Form Fields (same as before) -->
                <!-- ... -->
            </form>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
