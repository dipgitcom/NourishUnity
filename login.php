<?php include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - NourishUnity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom Styles for Login Page */
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
        }
        .login-container {
            max-width: 450px;
            margin: 100px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-control {
            height: 45px;
            font-size: 1rem;
        }
        .form-label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .forgot-password {
            text-align: right;
            font-size: 0.9rem;
        }
        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }
        .forgot-password a:hover {
            text-decoration: underline;
        }
        .social-login {
            text-align: center;
            margin-top: 20px;
        }
        .social-login button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            margin-top: 10px;
        }
        /* Customize the Google and Facebook button styling */
        .google-btn {
            background-color: #db4437;
            border-color: #db4437;
            color: white;
        }
        .google-btn:hover {
            background-color: #c1351d;
        }
        .facebook-btn {
            background-color: #3b5998;
            border-color: #3b5998;
            color: white;
        }
        .facebook-btn:hover {
            background-color: #2d4373;
        }
        .sign-up-link {
            text-align: center;
            margin-top: 20px;
            font-size: 1rem;
        }
        .sign-up-link a {
            color: #007bff;
            text-decoration: none;
        }
        .sign-up-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Login Container -->
    <div class="login-container">
        <h2>Login to NourishUnity</h2>
        <!-- Login Form -->
        <form action="login_process.php" method="POST">
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <!-- Forgot Password Link -->
            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>
            <!-- Submit Button -->
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        <!-- Social Login (Optional) -->
        <div class="social-login mt-4">
            <p>Or login with:</p>
            <button class="btn google-btn">
                <i class="fab fa-google"></i> Google
            </button>
            <button class="btn facebook-btn">
                <i class="fab fa-facebook-f"></i> Facebook
            </button>
        </div>
        <!-- Sign Up Section -->
        <div class="sign-up-link">
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
