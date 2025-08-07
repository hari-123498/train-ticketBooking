<?php
include($_SERVER['DOCUMENT_ROOT'] . '/Ticketbooking/includes/head.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Ticketbooking/includes/menubar.php');

if (isset($_SESSION['alert'])) {
    $alert = $_SESSION['alert'];
    unset($_SESSION['alert']);
?>
    <div class="container mt-3">
        <div class="alert alert-<?php echo htmlspecialchars($alert['type']); ?> alert-dismissible fade show" role="alert">
            <?php echo htmlspecialchars($alert['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Ticket Booking</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e3f2fd;
            color: #002855;
            text-align: center;
        }
        header, footer {
            background: linear-gradient(to right, #1e88e5, #42a5f5);
            color: #fff;
            padding: 20px 0;
        }
        main {
            padding: 50px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 900px;
        }
        h1, h2 {
            margin: 0 0 20px;
            color: #002855;
        }
        p {
            margin: 10px 0;
            color: #555;
        }
        .meter-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 0;
        }
        .meter-box {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            margin: 15px;
            text-align: center;
        }
        meter {
            width: 100%;
            height: 30px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #e1f5fe;
        }
        .meter-value {
            margin-top: 10px;
            font-weight: bold;
            color: #1e88e5;
        }
        button {
            padding: 10px 20px;
            background-color: #1e88e5;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #42a5f5;
        }
        footer {
            margin-top: 40px;
            padding: 10px 0;
        }
        @media (max-width: 600px) {
            main {
                padding: 20px;
            }
            .meter-box {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Our Ticket Booking System!</h1>
    </header>

    <main>
        <h2>Your Gateway to Unforgettable Experiences</h2>
        <p>Are you ready for an unforgettable journey? Whether you're craving a weekend getaway or seeking tickets to the hottest events, we’ve got you covered!

Explore exciting destinations and once in a lifetime experiences.
Secure the best seats for concerts, sports, and cultural events.
Browse through a wide selection of travel deals, event packages, and exclusive offers.
Book your tickets online with ease no hassle, just a few clicks away!
Don’t miss out your dream trip or perfect event experience is just one booking away!</p>

    </main>

    <footer>
        <p>&copy; 2024 Ticket Booking Inc. All rights reserved.</p>
    </footer>
</body>
</html>
