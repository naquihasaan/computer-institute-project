<?php
/**
 * Created by PhpStorm.
 * User: Nafeed
 * Date: 2/4/2019
 * Time: 8:43 PM
 */

class ShowResults extends Database
{
    public function showCompanyResult($student_enrol_show){

        $sql  = " SELECT  * FROM  student WHERE stu_enrollment = $student_enrol_show";
        $result  = $this->conn->prepare($sql);
        $result->execute();
        return  $result->fetch();

    }
}