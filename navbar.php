<?php include('config.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Food Rescue.dd</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="food_rescue.php">Food Rescue</a></li>
                <li class="nav-item"><a class="nav-link" href="donate.php">Donate</a></li>
                <li class="nav-item"><a class="nav-link" href="orderfood.php">Order Food</a></li>
                <li class="nav-item"><a class="nav-link" href="chefs.php">Chefs</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Login/Sign Up Links -->
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
