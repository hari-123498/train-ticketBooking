<?php
if(!session_start())
     session_start();
 if (!isset($_SESSION['username'])) {
        header("Location: /Ticketbooking/index.php");
        exit();
    }
?>
