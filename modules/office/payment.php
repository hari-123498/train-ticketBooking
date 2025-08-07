<?php
session_start();

// Check if payment details exist in session
if (!isset($_SESSION['payment_details'])) {
    header("Location: ticket.php");  // Redirect to ticket page if no data
    exit();
}

$paymentDetails = $_SESSION['payment_details'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f7ff; /* Light blue background */
        }
        .container {
            max-width: 700px;
            background-color: #ffffff; /* White background for form container */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); /* Stronger box shadow for emphasis */
            margin-top: 50px;
        }
        h2 {
            color: #0056b3; /* Dark blue for header */
            font-weight: bold;
        }
        .list-group-item {
            background-color: #f9f9f9; /* Very light grey for list items */
            color: #333; /* Dark text for better contrast */
        }
        .btn-success {
            background-color: #28a745; /* Standard Bootstrap success green */
            border-color: #28a745;
            font-size: 1.2rem;
        }
        .btn-success:hover {
            background-color: #218838; /* Darker shade on hover */
            border-color: #1e7e34;
        }
        .form-select, .form-control {
            border: 2px solid #ced4da;
            border-radius: 10px;
            padding: 10px;
            transition: border-color 0.3s;
        }
        .form-select:focus, .form-control:focus {
            border-color: #0056b3; /* Dark blue border on focus */
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5); /* Blue glow on focus */
        }
        .form-label {
            font-weight: bold;
            color: #333; /* Darker form label */
        }
        .form-container {
            margin-bottom: 20px;
        }
        .shadow-sm {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Lighter shadow for subtle effect */
        }
        .text-muted {
            color: #666; /* Darker muted text */
        }
        .payment-option {
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .payment-icon {
            width: 40px;
            margin-right: 10px;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .btn-lg {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Confirm Your Booking</h2>
        <p class="text-muted">Please review your booking details before proceeding to payment:</p>
        
        <ul class="list-group mb-4 shadow-sm">
            <li class="list-group-item"><strong>User ID:</strong> <?php echo htmlspecialchars($paymentDetails['userid']); ?></li>
            <li class="list-group-item"><strong>User Name:</strong> <?php echo htmlspecialchars($paymentDetails['username']); ?></li>
            <li class="list-group-item"><strong>Gender:</strong> <?php echo htmlspecialchars($paymentDetails['gender']); ?></li>
            <li class="list-group-item"><strong>Date of Journey:</strong> <?php echo htmlspecialchars($paymentDetails['whenis']); ?></li>
            <li class="list-group-item"><strong>Address:</strong> <?php echo htmlspecialchars($paymentDetails['addressis']); ?></li>
            <li class="list-group-item"><strong>Phone No:</strong> <?php echo htmlspecialchars($paymentDetails['phoneno']); ?></li>
            <li class="list-group-item"><strong>Train ID:</strong> <?php echo htmlspecialchars($paymentDetails['Trainid']); ?></li>
        </ul>

        <!-- Payment Form -->
        <form method="post" action="process_payment.php">
            <div class="form-container mb-3">
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                    <option value="" disabled selected>Select Payment Method</option>
                    <option value="credit">Credit Card</option>
                    <option value="debit">Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="google_pay">Google Pay</option>
                </select>
            </div>

            <div class="form-container mb-3">
                <label for="cardNumber" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="1234 5678 9123 4567" required>
            </div>

            <div class="form-container mb-3">
                <label for="expiryDate" class="form-label">Expiry Date</label>
                <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="MM/YY" required >
            </div>

            <div class="form-container mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required pattern="\d{3}">
            </div>

            <input type="hidden" name="action" value="make_payment">
            <button type="submit" class="btn btn-success btn-lg w-100">Proceed to Pay</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
