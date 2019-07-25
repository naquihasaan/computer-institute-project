<?php
/**
 * Created by PhpStorm.
 * User: Nafeed
 * Date: 2/3/2019
 * Time: 12:15 AM
 */

class AddNewStudent extends Database
{

    public function insert($stu_enrollment,$stu_name,$stu_father,$stu_mobile,$stu_email){
        $password = random_int(0,9999999);

        $this->checkStudent($stu_enrollment,$stu_email);

        $sql = "INSERT INTO student(stu_enrollment,stu_name,stu_father,stu_mobile,stu_email,stu_admission_date,stu_pass) VALUES ($stu_enrollment,'$stu_name','$stu_father','$stu_mobile','$stu_email',Now(),'$password')";
       $row = $this->conn->exec($sql);
       return $row;
    }
    function checkStudent($stu_enrollment,$stu_email){
            $sql = "SELECT * FROM student WHERE stu_enrollment = $stu_enrollment OR ,stu_email= '$stu_email' ";
            return $row = $this->conn->exec($sql);

    }
}
