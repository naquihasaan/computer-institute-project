<?php 
    session_start();
include_once('head.php') ?>
<body>
<?php include_once('nav.php');
date_default_timezone_set('Asia/Kolkata');
$addStudent ='';
include_once "PhpClass/Database.php";
include_once "PhpClass/AddNewStudent.php";
if(isset($_POST['add_student_form'])){

    $enrollment_no = $_POST['enrollment_no'];
    $stu_name = $_POST['stu_name'];
    $stu_father_name = $_POST['stu_father_name'];
    $stu_mobile = $_POST['stu_mobile'];
    $stu_email = $_POST['stu_email'];

    $add_new_student = new AddNewStudent();
    $row = $add_new_student->insert($enrollment_no,$stu_name,$stu_father_name,$stu_mobile,$stu_email);
    if($row > 0){
        $addStudent ="Successfully Add New Student";
    }
    else{
        $addStudent = "Sorry Please Try Again";
    }
}
if (isset($_POST['logoutAdmin'])) {
        unset($_SESSION['admin_login']);
        header("location: admin.php");
}
if(!isset($_SESSION['admin_login'])){
        header("location: admin.php");
}
?>
<br>
<div class="container">
    <div class="row">
        <form action="" method="post">

            <input type="submit" class="pull-right btn btn-danger" value="Logout" name="logoutAdmin"  />
        </form>
        <div class="col-md-12 col-xs-12 col-sm-12">
            <div class="col-md-12 col-lg-12 col-xs-12"><h1 class="alert alert-success"> Add New Student</h1></div>

            <div class="col-md-6 col-lg-6 col-xs-12">

                <h4><?php echo $addStudent; ?></h4>
                <button class="btn btn-primary" onclick="addStudentFunction()">Add Student</button>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12">
            <form method="post" action="addcertificate.php">
                <button class="alert alert-info">Add Certificate </button>
            </form>
            </div>

        </div>

    </div>  <!--closed the row Div-->
    <div class="row">
        <div id="addStudent" style="display: none;">
            <form  action="" method="post" onsubmit="return student_FormCheck()">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Enrollment No:</label>
                        <input type="text" class="form-control" name="enrollment_no" id="enrollment" placeholder="Enter Enrollment No">
                        <span class="text-danger" id="errorEnroll"></span>
                    </div>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" name="stu_name" id="stu_name" placeholder="Enter Student Name">
                        <span class="text-danger" id="errorStu"></span>
                    </div>
                    <div class="form-group">
                        <label>Student Father Name</label>
                        <input type="text" class="form-control" name="stu_father_name" id="stu_father_name"
                               placeholder="Enter Student Father Name">
                        <span class="text-danger" id="errorFather"></span>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Student Mobile Number</label>
                        <input type="text" class="form-control" name="stu_mobile" id="stu_mobile"
                               placeholder="Enter Student Mobile Number">
                        <span class="text-danger" id="errorMobile"></span>
                    </div>
<!--                    <div class="form-group">-->
<!--                        <label>Student DOB</label>-->
<!--                        <input type="date" class="form-control" name="stu_dob" id="stu_dob" placeholder="Select DOB">-->
<!--                        <span class="text-danger">Please Enter the DOB</span>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label>Student Email</label>
                        <input type="text" class="form-control" name="stu_email" id="stu_email" placeholder="Enter Student Email id">
                        <span class="text-danger" id="emailError"></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <input type="submit" name="add_student_form" class="btn btn-success" value="Submit"/>
                </div>
            </form> <!--close the display div-->
        </div>
    </div>
</div> <!--closed the Container div-->
<?php include_once('footer.php') ?>
<script>
    function student_FormCheck()
    {
        let emailValidate = /^[A-za-z0-9 .]{2,20}[@]{1}[A-za-z.]{2,10}$/;
        let enrollment = /^[0-9]{3,12}$/;
        let student_name = /^[a-z A-Z]{4,30}$/;
        let enrollment_no = document.getElementById('enrollment').value;
        let stu_name = document.getElementById('stu_name').value;
        let stu_father_name = document.getElementById('stu_father_name').value;
        let stu_mobile = document.getElementById('stu_mobile').value;
        // let stu_dob = document.getElementById('stu_dob').value;
        let stu_email = document.getElementById('stu_email').value;
        // alert (stu_email);


        if (!enrollment.test(enrollment_no)){
            document.getElementById('errorEnroll').textContent = "Please Enter the Enrollment Number";
            document.getElementById('errorStu').textContent = "";
            document.getElementById('errorMobile').textContent = " ";
            document.getElementById('errorFather').textContent = "";
            document.getElementById('emailError').textContent = '';
            return false;
        }
        if (!student_name.test(stu_name)) {
            document.getElementById('errorStu').textContent = "Please Enter the Student Name";
            document.getElementById('errorEnroll').textContent = " ";
            document.getElementById('errorMobile').textContent = " ";
            document.getElementById('errorFather').textContent = " ";
            document.getElementById('emailError').textContent = '';
            return false;
        }
        if (!enrollment.test(stu_mobile)) {
            document.getElementById('errorMobile').textContent = "Please Enter the Valid Mobile Number";
            document.getElementById('errorStu').textContent = " ";
            document.getElementById('errorEnroll').textContent = " ";
            document.getElementById('errorFather').textContent = "";
            document.getElementById('emailError').textContent = '';
            return false;
        }
        if (!student_name.test(stu_father_name))
        {
            document.getElementById('errorFather').textContent = "Please Enter the Father Name";
            document.getElementById('errorMobile').textContent = "";
            document.getElementById('errorStu').textContent = " ";
            document.getElementById('errorEnroll').textContent = " ";
            document.getElementById('emailError').textContent = '';
            return false;
        }
        if (!emailValidate.test(stu_email)){
            document.getElementById('emailError').textContent = 'Please Enter the Email Id';
            document.getElementById('errorFather').textContent = "";
            document.getElementById('errorMobile').textContent = "";
            document.getElementById('errorStu').textContent = " ";
            document.getElementById('errorEnroll').textContent = " ";
            return false;
        }
    }
    function addStudentFunction() {
        let addStudent = document.getElementById('addStudent');
        if (addStudent.style.display == 'none') {
            addStudent.style.display = 'block';
        }
    }
</script>

