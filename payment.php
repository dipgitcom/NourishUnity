<?php 
include('config.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        .payment-section {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
            padding: 10px 20px;
            font-size: 1rem;
        }
        .btn-success:hover {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-primary">Payment</h2>
        <p class="text-center">Select your preferred payment method and complete your order.</p>

        <!-- Payment Section -->
        <div class="payment-section mt-4">
            <form action="confirm_payment.php" method="POST">
                <!-- Payment Method -->
                <div class="mb-4">
                    <label for="payment-method" class="form-label font-weight-bold">Payment Method</label>
                    <select class="form-select p-3" id="payment-method" name="payment_method" onchange="showPaymentFields()" required>
                        <option value="">Select Payment Method</option>
                        <option value="bkash">Bkash</option>
                        <option value="nagad">Nagad</option>
                        <option value="rocket">Rocket</option>
                        <option value="credit-card">Credit Card</option>
                    </select>
                </div>

                <!-- Conditional Payment Fields -->
                <div id="bkash-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="bkash-number" class="form-label font-weight-bold">Bkash Number</label>
                        <input type="text" id="bkash-number" name="bkash_number" class="form-control p-3" placeholder="Enter your Bkash number">
                    </div>
                    <div class="mb-4">
                        <label for="bkash-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="bkash-transaction-id" name="bkash_transaction_id" class="form-control p-3" placeholder="Enter transaction ID">
                    </div>
                </div>

                <div id="nagad-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="nagad-number" class="form-label font-weight-bold">Nagad Number</label>
                        <input type="text" id="nagad-number" name="nagad_number" class="form-control p-3" placeholder="Enter your Nagad number">
                    </div>
                    <div class="mb-4">
                        <label for="nagad-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="nagad-transaction-id" name="nagad_transaction_id" class="form-control p-3" placeholder="Enter transaction ID">
                    </div>
                </div>

                <div id="rocket-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="rocket-number" class="form-label font-weight-bold">Rocket Number</label>
                        <input type="text" id="rocket-number" name="rocket_number" class="form-control p-3" placeholder="Enter your Rocket number">
                    </div>
                    <div class="mb-4">
                        <label for="rocket-transaction-id" class="form-label font-weight-bold">Transaction ID</label>
                        <input type="text" id="rocket-transaction-id" name="rocket_transaction_id" class="form-control p-3" placeholder="Enter transaction ID">
                    </div>
                </div>

                <div id="credit-card-fields" class="payment-fields" style="display: none;">
                    <div class="mb-4">
                        <label for="card-number" class="form-label font-weight-bold">Credit Card Number</label>
                        <input type="text" id="card-number" name="card_number" class="form-control p-3" placeholder="Enter credit card number">
                    </div>
                    <div class="mb-4">
                        <label for="expiry-date" class="form-label font-weight-bold">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry_date" class="form-control p-3" placeholder="MM/YY">
                    </div>
                    <div class="mb-4">
                        <label for="cvv" class="form-label font-weight-bold">CVV</label>
                        <input type="text" id="cvv" name="cvv" class="form-control p-3" placeholder="Enter CVV">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Complete Payment</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script>
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
