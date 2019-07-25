<?php
/**
 * Created by PhpStorm.
 * User: Nafeed
 * Date: 2/3/2019
 * Time: 12:15 PM
 */

class StudentLogin extends Database
{
    public function login($student_enrol,$student_password){
        $sql  = " SELECT  * FROM  student WHERE stu_enrollment = $student_enrol AND stu_pass  = '$student_password'";
        $result  = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch();
    }
    public function fetchRecord($student_enrol){
        $sql  = " SELECT  * FROM  student WHERE stu_enrollment = $student_enrol";
        $result  = $this->conn->prepare($sql);
        $result->execute();
        print_r($result->fetch());
    }
}