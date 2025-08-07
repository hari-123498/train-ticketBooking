<?php
include '../../includes/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $userid = $_POST['userid'];
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $whenis = isset($_POST['whenis']) ? $_POST['whenis'] : "";
    $addressis = isset($_POST['addressis']) ? $_POST['addressis'] : "";
    $phoneno = isset($_POST['phoneno']) ? $_POST['phoneno'] : "";
    $Trainid = isset($_POST['Trainid']) ? $_POST['Trainid'] : "";

    if ($action == 'create') {
        $officeHandler->createTicket($userid, $username, $gender, $whenis, $addressis, $phoneno, $Trainid);
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Data added successfully.'];
        
        // Save ticket details in session for payment page
        $_SESSION['payment_details'] = [
            'userid' => $userid,
            'username' => $username,
            'gender' => $gender,
            'whenis' => $whenis,
            'addressis' => $addressis,
            'phoneno' => $phoneno,
            'Trainid' => $Trainid
        ];

        // Redirect to the payment page for 'create' action
        header("Location: payment.php");
        exit();

    } elseif ($action == 'update') {
        $officeHandler->updateTicket($userid, $username, $gender, $whenis, $addressis, $phoneno, $Trainid);
        $_SESSION['alert'] = ['type' => 'info', 'message' => 'Data updated successfully.'];
    } elseif ($action == 'delete') {
        $officeHandler->deleteTicket($userid);
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Data deleted successfully.'];
        
        // No redirection to the payment page for 'delete' action
    }
}

// Fetch departments and ticket data
$departments = $officeHandler->readDepartments();
$Ticket = $officeHandler->readTicket();
include 'views/vw_ticket.php';
?>
