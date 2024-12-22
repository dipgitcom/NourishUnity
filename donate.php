<?php 
include('auth.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make a Donation - NourishUnity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Custom Styles for the Donation Page */
        body {
            font-family: 'Arial', sans-serif;
            background: #f4f7fa;
        }
        .hero-section {
            background: url('hero1.jpeg');
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
        .form-section .btn-success {
            width: 100%;
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
        .payment-logo {
            width: 30px; /* Set a fixed size */
            height: auto;
            margin-right: 10px;
            vertical-align: middle;
        }
        .payment-method-option {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <h2>Make a Donation</h2>
        <p>Support our mission to fight hunger and promote sustainability. Every contribution makes a difference.</p>
    </section>

    <!-- Donation Form Section -->
    <div class="container">
        <div class="form-section">
            <h3 class="text-center mb-4">Donate Today</h3>
            <form action="submit_donation.php" method="POST">
                <!-- Amount Input -->
                <div class="mb-4">
                    <label for="amount" class="form-label font-weight-bold">Donation Amount (BDT)</label>
                    <input type="number" id="amount" name="amount" class="form-control p-3 border-light" placeholder="Enter donation amount" required>
                </div>

                <!-- Payment Method Selection -->
                <div class="mb-4">
                    <label for="payment-method" class="form-label font-weight-bold">Payment Method</label>
                    <select class="form-select p-3 border-light" id="payment-method" name="payment_method" onchange="showPaymentFields()" required>
                        <option value="">Select Payment Method</option>
                        <option value="bkash" class="payment-method-option">
                            <img src="bkash.png" alt="Bkash" class="payment-logo"> Bkash
                        </option>
                        <option value="nagad" class="payment-method-option">
                            <img src="nagad.png" alt="Nagad" class="payment-logo"> Nagad
                        </option>
                        <option value="rocket" class="payment-method-option">
                            <img src="rocket.png" alt="Rocket" class="payment-logo"> Rocket
                        </option>
                        <option value="credit-card" class="payment-method-option">
                            <img src="credit.png" alt="Credit Card" class="payment-logo"> Credit Card
                        </option>
                    </select>
                </div>

                <!-- Payment Details (Conditional Sections) -->
                <div id="bkash-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="bkash-number" class="form-label font-weight-bold">Bkash Number</label>
                        <input type="text" id="bkash-number" name="bkash_number" class="form-control p-3 border-light" placeholder="Enter your Bkash number" required>
                    </div>
                    <div class="mb-4">
                        <label for="bkash-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="bkash-transaction-id" name="bkash_transaction_id" class="form-control p-3 border-light" placeholder="Enter your Bkash transaction ID" required>
                    </div>
                </div>

                <div id="nagad-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="nagad-number" class="form-label font-weight-bold">Nagad Number</label>
                        <input type="text" id="nagad-number" name="nagad_number" class="form-control p-3 border-light" placeholder="Enter your Nagad number" required>
                    </div>
                    <div class="mb-4">
                        <label for="nagad-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="nagad-transaction-id" name="nagad_transaction_id" class="form-control p-3 border-light" placeholder="Enter your Nagad transaction ID" required>
                    </div>
                </div>

                <div id="rocket-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="rocket-number" class="form-label font-weight-bold">Rocket Number</label>
                        <input type="text" id="rocket-number" name="rocket_number" class="form-control p-3 border-light" placeholder="Enter your Rocket number" required>
                    </div>
                    <div class="mb-4">
                        <label for="rocket-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="rocket-transaction-id" name="rocket_transaction_id" class="form-control p-3 border-light" placeholder="Enter your Rocket transaction ID" required>
                    </div>
                </div>

                <div id="credit-card-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="card-number" class="form-label font-weight-bold">Credit Card Number</label>
                        <input type="text" id="card-number" name="card_number" class="form-control p-3 border-light" placeholder="Enter your credit card number" required>
                    </div>
                    <div class="mb-4">
                        <label for="expiry-date" class="form-label font-weight-bold">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry_date" class="form-control p-3 border-light" placeholder="MM/YY" required>
                    </div>
                    <div class="mb-4">
                        <label for="cvv" class="form-label font-weight-bold">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control p-3 border-light" placeholder="Enter CVV" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5 py-3">Donate Now</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to Show/Hide Payment Fields based on selected method
        function showPaymentFields() {
            var method = document.getElementById('payment-method').value;
            var paymentFields = document.querySelectorAll('.payment-fields');
            paymentFields.forEach(function(field) {
                field.style.display = 'none';
            });
            
            if (method === 'bkash') {
                document.getElementById('bkash-fields').style.display = 'block';
            } else if (method === 'nagad') {
                document.getElementById('nagad-fields').style.display = 'block';
            } else if (method === 'rocket') {
                document.getElementById('rocket-fields').style.display = 'block';
            } else if (method === 'credit-card') {
                document.getElementById('credit-card-fields').style.display = 'block';
            }
        }
    </script>
</body>
</html>
