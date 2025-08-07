<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg" style="background-color: #003366;"> <!-- Dark blue background -->
    <div class="container-fluid"> <!-- Added a container for better layout control -->
        <a class="navbar-brand" href="#">
            <img src="/Ticketbooking/assets/images/logo.jpg" class="rounded-logo"> <!-- Added class for round logo -->
            <span style="color: #ffcc00; padding-left: 10px;">Train System</span> <!-- Optional: "Train System" text next to logo -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav1"> <!-- Use a div for the left-aligned items -->
                <div class="nav-item active">
                    <a class="nav-link" href="/ticketbooking/modules/office/views/home.php">Home</a>
                </div>
                <div class="nav-item active">
                    <a class="nav-link" href="/Ticketbooking/modules/office/dept.php">Train Information</a>
                </div>
                <div class="nav-item active">
                    <a class="nav-link" href="/Ticketbooking/modules/office/ticket.php">Ticket Booking</a>
                </div>
            </div>
            <ul class="navbar-nav"> <!-- Create a separate list for the Logout button aligned to the right -->
                <li class="nav-item active">
                    <a class="nav-link" href="/Ticketbooking/logout.php">&#x27A1; Logout</a> <!-- Using a logout emoji icon -->
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
/* Add hover effect for the links */
.nav-link {
    color: #ffcc00; /* Bright orange for the links */
    transition: color 0.3s ease-in-out; /* Smooth transition effect */
    font-weight: bold; /* Make all nav links bold */
}

.navbar-nav1 {
    margin-right: auto;
    display: flex; /* Make the nav items align side by side */
    gap: 15px; /* Add spacing between the buttons */
    padding: 5px;
}

.nav-link:hover {
    color: #ffffff; /* Change link color to white on hover */
    background-color: #00509e; /* Slightly darker blue background on hover */
    border-radius: 5px; /* Optional: Rounded corners */
    padding: 5px; /* Optional: Extra padding for better hover effect */
}

/* Navbar brand hover effect */
.navbar-brand:hover {
    color: #ffffff; /* Change brand color to white on hover */
}

/* Toggler icon style for better visibility */
.navbar-toggler-icon {
    background-image: url('data:image/svg+xml;charset=utf8,%3Csvg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath stroke="rgba%28 255, 204, 0, 1%29" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"/%3E%3C/svg%3E'); /* Bright orange for toggler icon */
}

/* Optional: Change the navbar-toggler button background on hover */
.navbar-toggler:hover {
    background-color: #00509e; /* Darker blue on hover */
}

/* Adjusting the alignment of the Logout button */
.navbar-nav {
    margin-left: auto; /* Automatically aligns the Logout button to the right */
}

.nav-item.active:last-child .nav-link {
    font-weight: bold; /* Make Logout link bold */
    color: #ffcc00; /* Keep the Logout link color */
}

.nav-item.active:last-child .nav-link:hover {
    color: #ffffff; /* Change Logout link color on hover */
    background-color: #00509e; /* Different hover color for Logout */
    border-radius: 5px; /* Optional: Rounded corners */
    padding: 5px; /* Extra padding for better hover effect */
}

/* Additional style to ensure proper spacing */
.navbar-nav > .nav-item {
    margin-right: 15px; /* Space between left-aligned items */
}

/* Styles for the rounded logo */
.rounded-logo {
    height: 50px; /* Set a fixed height */
    width: 50px; /* Set a fixed width to make it circular */
    border-radius: 50%; /* Makes the logo round */
    object-fit: cover; /* Ensures the image covers the area without distortion */
}
</style>
