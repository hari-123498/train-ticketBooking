<?php
include '../../includes/common.php';

if (isset($_POST['Trainid'])) {
    $deptHandler = new OfficeHandler();
    $Trainid = $_POST['Trainid'];
    $department = $deptHandler->getDepartmentByCode($Trainid);

    if ($department) {
        echo '<div class="card">
                <div class="card-body">
                    <p>Trainname: ' . $department['Trainname'] . '</p>
                    <p>Departurecity: ' . $department['Departurecity'] . '</p>
                    <p>Arrivalcity: ' . $department['Arrivalcity'] . '</p>
                    <p>Depaturetime: ' . $department['Depaturetime'] . '</p>
                    <p>Arrivaltime: ' . $department['Arrivaltime'] . '</p>
                </div>
              </div>';
    } else {
        echo '<div class="alert alert-danger">Department not found</div>';
    }
}
?>
