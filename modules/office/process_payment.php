<?php
// process_payment.php

session_start();

// Simulate payment processing
if ($_POST['action'] == 'make_payment') {
    // Process the payment details (this would be where you integrate a payment gateway)
    $paymentMethod = $_POST['paymentMethod'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    // Simulate successful payment
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Payment successful! Your booking is confirmed.'
    ];

    // Redirect to home or confirmation page
    header("Location: ../../modules/office/ticket.php");
    exit();
}
?>
