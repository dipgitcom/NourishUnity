
<?php 
include('config.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>FoodRescue.dd</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">


    <!-- External CSS -->
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Professional Styling */
        body {
    font-family: 'Poppins', sans-serif;
}

        h1 {
            color: darkorchid;
            font-weight: bold;
        }
        p {
            font-size: 1.2rem;
            color: lightgreen;
        }
        .hero-section {
            background: url('hero1.jpeg');
            background-size: cover;
            background-position: center;
            padding: 100px 20px;
            color: white;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.4rem;
        }
        .features-section {
            padding: 50px 20px;
        }
        .feature-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.2s;
        }
        .feature-card:hover {
            transform: scale(1.05);
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
        <h1>Welcome to FoodRescue.DD</h1>
        <p>Join us in our mission to combat food waste and promote social welfare.</p>
        <a href="#features" class="btn btn-light btn-lg mt-3">Learn More</a>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section container">
        <h2 class="text-center text-primary mb-5">What We Offer?</h2>
        <div class="row g-4">
            <!-- Feature Card 1 -->
            <div class="col-md-4">
                <div class="card feature-card">
                    <img src="foodrescue.jpeg" class="card-img-top" alt="Food Rescue">
                    <div class="card-body text-center">
                        <h5 class="card-title">Food Rescue</h5>
                        <p class="card-text">Redistribute surplus food to those in need, reducing food waste and hunger.</p>
                        <a href="food_rescue.php" class="btn btn-primary">Join As A Volunteer</a>
                    </div>
                </div>
            </div>
            <!-- Feature Card 2 -->
            <div class="col-md-4">
                <div class="card feature-card">
                    <img src="donation.jpeg" class="card-img-top" alt="Donate">
                    <div class="card-body text-center">
                        <h5 class="card-title">Donate</h5>
                        <p class="card-text">Make a difference by contributing funds or food to support our initiatives.</p>
                        <a href="donate.php" class="btn btn-primary">Donate Now</a>
                    </div>
                </div>
            </div>
            <!-- Feature Card 3 -->
            <div class="col-md-4">
                <div class="card feature-card">
                    <img src="chef.jpeg" class="card-img-top" alt="Join as Chef">
                    <div class="card-body text-center">
                        <h5 class="card-title">Join as a Chef</h5>
                        <p class="card-text">Become a part of our community by sharing your culinary skills to help others.</p>
                        <a href="chefs.php" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center py-5 bg-primary text-white">
        <h3>Ready to Make an Impact?</h3>
        <p>Join our movement to fight hunger and promote sustainability.</p>
        <a href="login.php" class="btn btn-light btn-lg mt-3">Get Started</a>
    </section>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
