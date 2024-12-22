<?php 
include('auth.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Rescue and Distribution - NourishUnity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom Styles for the Page */
        body {
    font-family: 'Poppins', sans-serif;
}
        .hero-section {
            background: url('background.jpeg');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }
        .hero-section h2 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.3rem;
        }
        .form-section {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-section h3 {
            color: #007bff;
            font-weight: bold;
        }
        .form-section .btn-primary {
            width: 100%;
        }
        /* Focus Effect for Inputs */
input:focus, select:focus, textarea:focus {
    border-color: #007bff; /* Blue color when focused */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle shadow effect */
    outline: none; /* Remove the default outline */
}

/* Hover Effect for the Submit Button */
.btn-primary:hover {
    background-color: #0056b3; /* Darker blue */
    border-color: #0056b3;
    transition: all 0.3s ease-in-out;
}

        footer {
            background: #343a40;
            color: white;
            padding: 20px 0;
        }
        footer a {
            color: #ddd;
            text-decoration: none;
        }
        footer a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Food Rescue and Distribution</h2>
        <p>Help us redistribute surplus food to those in need. Your participation can make a huge difference!</p>
    </section>

    <!-- Form Section -->
    <div class="container my-5">
    <div class="form-section p-5 shadow-lg rounded">
        <h3 class="text-center mb-4 text-primary font-weight-bold">Join as a Volunteer</h3>
        <form action="submit_volunteer.php" method="POST">
            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="form-label font-weight-bold">Your Name</label>
                <input type="text" id="name" name="name" class="form-control p-3 border-light" placeholder="Enter your full name" required>
            </div>
            
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="form-label font-weight-bold">Email Address</label>
                <input type="email" id="email" name="email" class="form-control p-3 border-light" placeholder="Enter your email" required>
            </div>
            
            <!-- Phone Number Input -->
            <div class="mb-4">
                <label for="phone" class="form-label font-weight-bold">Phone Number</label>
                <input type="text" id="phone" name="phone" class="form-control p-3 border-light" placeholder="Enter your phone number" required>
            </div>
            
            <!-- Role Selection -->
            <div class="mb-4">
                <label for="role" class="form-label font-weight-bold">Role</label>
                <select class="form-select p-3 border-light" id="role" name="role" required>
                    <option value="volunteer">Volunteer</option>
                    <option value="contributor">Contributor</option>
                </select>
            </div>

            <!-- Message Section -->
            <div class="mb-4">
                <label for="message" class="form-label font-weight-bold">Why do you want to help?</label>
                <textarea id="message" name="message" class="form-control p-3 border-light" rows="4" placeholder="Share your motivation with us..." required></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 py-3">Join as Volunteer</button>
            </div>
        </form>
    </div>
</div>


    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
