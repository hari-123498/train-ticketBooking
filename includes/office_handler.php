<?php
include_once 'db_handler.php';

class OfficeHandler extends Connection {
    // CRUD functions for tbldept
    public function createDepartment($Trainid, $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime) {
        $sql = "INSERT INTO tbldept (Trainid, Trainname, Departurecity, Arrivalcity, Depaturetime, Arrivaltime) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssssss', $Trainid, $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime);
        return $stmt->execute();
    }

    public function readDepartments() {
        $sql = "SELECT * FROM tbldept";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateDepartment($Trainid, $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime) {
        $sql = "UPDATE tbldept SET Trainname = ?, Departurecity = ?, Arrivalcity = ?, Depaturetime = ?, Arrivaltime = ? WHERE Trainid = ?";
        $stmt = $this->conn->prepare($sql);
    
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($this->conn->error));
        }
    
        // Bind parameters: last parameter should be Trainid
        $stmt->bind_param('ssssss', $Trainname, $Departurecity, $Arrivalcity, $Depaturetime, $Arrivaltime, $Trainid);
    
        if (!$stmt->execute()) {
            die('Execute failed: ' . htmlspecialchars($stmt->error));
        }
    
        return true;
    }
    
    public function deleteDepartment($Trainid) {
        $sql = "DELETE FROM tbldept WHERE Trainid = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $Trainid);
        return $stmt->execute();
    }
    public function getDepartmentByCode($Trainid) 
    { 
        $stmt = $this->conn->prepare("SELECT * FROM tbldept WHERE $Trainid = ?"); $stmt->bind_param("s", $Trainid); $stmt->execute(); 
        $result = $stmt->get_result(); 
        return $result->fetch_assoc(); 
    }  
// CRUD functions for tblreigstration
public function createTicket($userid, $username, $gender, $whenis, $addressis, $phoneno, $Trainid) {
    $sql = "INSERT INTO tblreigstration (userid, username, gender, whenis, addressis, phoneno, Trainid) VALUES (?, ?, ?, ?, ?, ? ,?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('sssssss', $userid, $username, $gender, $whenis, $addressis, $phoneno, $Trainid);
    return $stmt->execute();
}

public function readTicket() {
    $sql = "SELECT * FROM tblreigstration";
    $result = $this->conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

public function updateTicket($userid, $username, $gender, $whenis, $addressis, $phoneno, $Trainid) {
    $sql = "UPDATE tblreigstration SET username = ?, gender = ?,whenis = ?, addressis = ?, phoneno = ?, Trainid = ? WHERE userid = ?";
    $stmt = $this->conn->prepare($sql);
    
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($this->conn->error));
    }

    // Bind parameters in the correct order
    $stmt->bind_param('sssssss', $username, $gender, $whenis, $addressis, $phoneno, $Trainid, $userid);

    if (!$stmt->execute()) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    return true;
}

public function deleteTicket($userid) {
    $sql = "DELETE FROM tblreigstration WHERE userid = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('s', $userid);
    return $stmt->execute();
}
}
?>

    