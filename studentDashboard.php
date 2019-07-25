<?php 

if (!isset($_SESSION)) {
    session_start();    
}

include_once('head.php') ?>
<body>
    <?php include_once('nav.php');
    include_once 'PhpClass/Database.php';
    include_once 'PhpClass/UpdateStudent.php';
    $show = new UpdateStudent();
    $result = [];
    if (isset($_POST['logoutStudent'])) {
        unset($_SESSION['login_student']);
        header("location: login.php");
    }
    if(!isset($_SESSION['login_student'])){
        header("location: login.php");
    }
    if (isset($_POST['showResult'])) {
       $result =  $show->showResult($_SESSION['login_student']);           
   }

   ?>
   <br>
   <div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <input type="submit" class="btn btn-primary" value="Show Result" name="showResult"  />
            </form>                
        </div>
        <div class="col-md-6">
            <form action="" method="post">
                <input type="submit" class="pull-right btn btn-danger" value="Logout" name="logoutStudent"  />
            </form>    
        </div>
    </div>

    <br/>
    <br/>
    <div class="row">


        <?php if (!empty($result)): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Enrollment Number</th>
                        <th>Student Name</th>
                        <th>Student Father Name</th>
                        <th>Student Email</th>
                        <th>Student Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php // foreach ($result as $student): ?> -->
                        <!-- <?php // var_dump($student); die() ?> -->
                        <tr>
                            <td><?= $result['stu_enrollment']; ?></td>
                            <td><?= $result['stu_name']; ?></td>
                            <td><?= $result['stu_father']; ?></td>
                            <td><?= $result['stu_email']; ?></td>
                            <td><img src="<?= $result['stu_certificate']; ?>" alt=""></td>
                        </tr>
                    <!-- <?php // endforeach ?> -->
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</div>

<?php include_once('footer.php') ?>