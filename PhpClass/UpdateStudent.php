<?php
/**
 * Created by PhpStorm.
 * User: Nafeed
 * Date: 2/3/2019
 * Time: 1:44 AM
 */
class UpdateStudent extends Database
{
    public function add_certificate($enrollment,$certificate)
    {
       // echo  $type = $certificate['type'];
       //  $image_file = $certificate['name'];
       //  $size = $certificate['size'];
       //  $temp_name = $certificate['tmp_name'];
       //  $path="upload/".$image_file;
       //  $directory="upload/";
       //  if ($image_file){

       //      if ($type == 'image/png' || $type =='application/pdf'){
       //          move_uploaded_file($temp_name,"upload/" .$image_file);
       //          $sql = "UPDATE student set stu_certificate = '$temp_name' WHERE  stu_enrollment = $enrollment";
       //          $row =  $this->conn->exec($sql);
       //          return $row;

       //      }
       //      else {
       //          echo "Only PNG & PDF Allowed";
       //      }
       //  }
       
       $file = $certificate['name'];
       $fileName = 'upload'.'/'.md5(uniqid().time()).'.'.strtolower(pathinfo($certificate['name'],PATHINFO_EXTENSION));
       move_uploaded_file($certificate['tmp_name'],$fileName);

       // $sql = "INSERT INTO student (stu_certificate) VALUES('$fileName') WHERE stu_enrollment = $enrollment";

        $sql = "UPDATE student SET stu_certificate ='$fileName' WHERE  stu_enrollment = $enrollment";

        return $this->conn->exec($sql);

    }
    public function showResult($enrollment)
    {
        $sql = "SELECT * FROM student WHERE stu_enrollment = $enrollment";

        $result  = $this->conn->prepare($sql);
        $result->execute();
        return $result->fetch();
    }
}