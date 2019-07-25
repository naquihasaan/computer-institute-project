<?php
if (!isset($_SESSION)) {
    session_start();    
}

include_once 'Database.php';

class Admin extends Database
{
    public function login($email, $pass){
        $sql = "SELECT * FROM admin_user WHERE email = '$email' AND pass = '$pass'";
        $result = $this->conn->query($sql);
        $row =$result->fetch();
        if ($result->rowCount($row) > 0){
            header("location: ./student_panel.php");
            $_SESSION['admin_login'] = $email;
        }
        else{
                echo "<script>alert('Sorry Email Id & Password is wrong');</script>";
        }
    }
}
