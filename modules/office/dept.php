<?php
include '../../includes/common.php';
 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $Trainid = $_POST['Trainid'];
    $Trainname = isset($_POST['Trainname']) ? $_POST['Trainname'] : "";
    $Departurecity = isset($_POST['Departurecity']) ? $_POST['Departurecity'] : ""; 
    $Arrivalcity = isset($_POST['Arrivalcity']) ? $_POST['Arrivalcity'] : "";
    $Depaturetime = isset($_POST['Depaturetime']) ? $_POST['Depaturetime'] : "";
    $Arrivaltime = isset($_POST['Arrivaltime']) ? $_POST['Arrivaltime'] : "";

    if ($action == 'create') {
        $res= $officeHandler->createDepartment($Trainid, $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime);
        if($res!=0)
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Data added successfully.'];
    else
         $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Error:Data is not inserted!Try Again.'];
  
    } elseif ($action == 'update') {
        $officeHandler->updateDepartment($Trainid, $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime);
        $_SESSION['alert'] = ['type' => 'info', 'message' => 'Data updated successfully.'];
   
    } elseif ($action == 'delete') {
        $officeHandler->deleteDepartment($Trainid);
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Dept deleted successfully.'];

    }
}

$departments = $officeHandler->readDepartments();
include 'views/vw_dept.php';
?>
