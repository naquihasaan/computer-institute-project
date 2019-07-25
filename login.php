<?php include_once 'inc/head.php'; ?>
<body>
<?php include_once 'inc/header.php';?>

  <h1 class="text-center my-4">Student Panel</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form action="" method="post">
            <div class="form-group">
            <label for="enroll">Enrollment No: </label>
            <input type="text" class="form-control" id="enroll" name="student_enrol">
          </div>
          <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="student_password">
                    </div>
                    <input type="submit" value="Submit" class="form-control bt btn-primary mb-4" name="student_login"/>
        </form>
        </div>
      </div>
    </div>


<?php include_once 'inc/footer.php'; ?>
