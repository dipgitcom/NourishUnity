<?php 
include('config.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chef Video Tutorials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .video-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .video-card:hover {
            transform: scale(1.03);
        }
        .video-card iframe {
            width: 100%;
            height: 200px;
        }
        .video-card .card-body {
            padding: 15px;
        }
        .video-card .card-title {
            font-size: 1.2rem;
            color: #007bff;
            margin-bottom: 10px;
        }
        .video-card .card-text {
            color: #6c757d;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center text-primary">Chef Video Tutorials</h2>
    <p class="text-center">Explore a variety of recipes and tutorials by our talented chefs.</p>

    <div class="video-grid">
        <?php
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

        // Fetch all video tutorials
        $sql = "SELECT recipes.*, chefs.specialty, users.name AS chef_name 
                FROM recipes 
                JOIN chefs ON recipes.chef_id = chefs.id
                JOIN users ON chefs.user_id = users.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($videos) > 0):
            foreach ($videos as $video): ?>
                <div class="video-card">
                    <!-- Video Embed -->
                    <iframe src="<?= htmlspecialchars($video['video_url']) ?>" frameborder="0" allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($video['title']) ?></h5>
                        <p class="card-text">By: <?= htmlspecialchars($video['chef_name']) ?> (<?= htmlspecialchars($video['specialty']) ?>)</p>
                    </div>
                </div>
            <?php endforeach;
        else: ?>
            <p class="text-center">No video tutorials available at the moment.</p>
        <?php endif; ?>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
