<?php include_once('head.php') ?>
    <body>
<?php
    include_once('nav.php');
    include_once 'PhpClass/Database.php';
    include_once 'PhpClass/UpdateStudent.php';
    $updateStudent = new UpdateStudent();
    if (isset($_POST['add_submit']))
    {
        $enrollment  = $_POST['stu_enroll'];
        $certificate  = $_FILES['certificate'];
        $row = $updateStudent->add_certificate($enrollment,$certificate);
        if($row >0){
            echo "<script>alert('Updated Successfully ');</script>";
        }
        else{
            echo "<script>alert('Sorry Please Again ');</script>";
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <h1 class="alert alert-info">Add Student Certificate</h1>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="col-md-6 col-xs-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Enrollment No:</label>
                        <input type="text" class="form-control" name="stu_enroll" id="stu_enroll" placeholder="Enter Student Enrollment">
                        <span class="text-danger" id="errorStu"></span>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Add Certificate </label>
                        <input type="file"  name="certificate" class="form-control" id="stu_certificate" value="<?php echo $image; ?>"/>
                        <span class="text-danger" id="errorStu"></span>
                    </div>
                </div>
                <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" name="add_submit" value="Submit">
                </div>
            </form>
        </div>

    </div>

<?php include_once('footer.php') ?>