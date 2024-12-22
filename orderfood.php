<?php 
include('auth.php');
include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
        }
        h2, p {
            color: #007bff;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .btn-primary, .btn-success {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success:hover {
            background-color: #28a745;
        }
        /* Professional Cart Section Styling */
        #cart-container {
            font-family: 'Arial', sans-serif;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }
        #cart-total {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Order Food</h2>
        <p class="text-center">Choose from our delicious menu below and place your order.</p>

        <!-- Menu Section -->
        <div class="row mt-4">
            <!-- Food Item -->
            <div class="col-md-4">
                <div class="card">
                    <img src="burger.jpeg" class="card-img-top" alt="Burger">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Burger</h5>
                        <p class="card-text">Price: 80 BDT</p>
                        <form class="order-form" onsubmit="addToCart(event, 'Burger', 80)">
                            <div class="mb-3">
                                <label for="burger-qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="burger-qty" name="burger_qty" min="1" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Food Item -->
            <div class="col-md-4">
                <div class="card">
                    <img src="pizza.jpeg" class="card-img-top" alt="Pizza">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Pizza</h5>
                        <p class="card-text">Price: 150 BDT</p>
                        <form class="order-form" onsubmit="addToCart(event, 'Pizza', 150)">
                            <div class="mb-3">
                                <label for="pizza-qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="pizza-qty" name="pizza_qty" min="1" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Food Item -->
            <div class="col-md-4">
                <div class="card">
                    <img src="biriyani.jpeg" class="card-img-top" alt="Biryani">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Biryani</h5>
                        <p class="card-text">Price: 200 BDT</p>
                        <form class="order-form" onsubmit="addToCart(event, 'Biryani', 200)">
                            <div class="mb-3">
                                <label for="biryani-qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="biryani-qty" name="biryani_qty" min="1" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- Food Item -->
         <div class="col-md-4">
                <div class="card">
                    <img src="chicken.jpeg" class="card-img-top" alt="Chicken Caap">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Chicken Caap</h5>
                        <p class="card-text">Price: 130 BDT</p>
                        <form class="order-form" onsubmit="addToCart(event, 'Chicken Caap', 130)">
                            <div class="mb-3">
                                <label for="biryani-qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="biryani-qty" name="biryani_qty" min="1" value="1">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Cart Section -->
        <div class="mt-5">
            <h3 class="text-center text-primary mb-4">Your Cart</h3>
            <div id="cart-container" class="container p-4 bg-light rounded shadow-sm">
                <!-- Empty Cart Message -->
                <div id="cart-empty" class="text-center text-muted">
                    <p>Your cart is currently empty.</p>
                </div>

                <!-- Cart Items Table -->
                <div id="cart-table" style="display: none;">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Item</th>
                                <th>Price (BDT)</th>
                                <th>Quantity</th>
                                <th>Subtotal (BDT)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items"></tbody>
                    </table>
                    <div class="text-end">
                        <h5 class="text-success">Total: <span id="cart-total">0</span> BDT</h5>
                    </div>
                    <div class="text-center mt-4">
                        <a href="payment.php" class="btn btn-success px-4">Proceed to Payment</a>
                        <button class="btn btn-danger px-4" onclick="clearCart()">Clear Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <script>
        let cart = [];

        function addToCart(event, itemName, itemPrice) {
            event.preventDefault();
            const quantityInput = event.target.querySelector('input[type="number"]');
            const quantity = parseInt(quantityInput.value);

            if (quantity > 0) {
                const existingItem = cart.find((item) => item.name === itemName);
                if (existingItem) {
                    existingItem.quantity += quantity;
                } else {
                    cart.push({ name: itemName, price: itemPrice, quantity });
                }
                updateCart();
                quantityInput.value = 1; // Reset quantity input
                alert(`${itemName} added to cart!`);
            } else {
                alert('Please enter a valid quantity.');
            }
        }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');
            const cartTable = document.getElementById('cart-table');
            const cartEmpty = document.getElementById('cart-empty');

            cartItemsContainer.innerHTML = '';
            let total = 0;

            if (cart.length === 0) {
                cartTable.style.display = 'none';
                cartEmpty.style.display = 'block';
            } else {
                cartTable.style.display = 'block';
                cartEmpty.style.display = 'none';

                cart.forEach((item) => {
                    const subtotal = item.price * item.quantity;
                    total += subtotal;

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${item.name}</td>
                        <td>${item.price}</td>
                        <td>${item.quantity}</td>
                        <td>${subtotal}</td>
                        <td>
                            <button class="btn btn-sm btn-danger" onclick="removeFromCart('${item.name}')">Remove</button>
                        </td>
                    `;
                    cartItemsContainer.appendChild(row);
                });

                cartTotalElement.textContent = total;
            }
        }

        function removeFromCart(itemName) {
            cart = cart.filter((item) => item.name !== itemName);
            updateCart();
        }

        function clearCart() {
            cart = [];
            updateCart();
        }

        document.addEventListener('DOMContentLoaded', updateCart);
    </script>
</body>
</html>
