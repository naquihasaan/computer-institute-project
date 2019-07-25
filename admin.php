<?php include_once 'inc/head.php'; ?>
<body>
<?php include_once 'inc/header.php';?>

	<h1 class="text-center my-4">Admin Panel</h1>
   	<div class="container">
   		<div class="row">
   			<div class="col-md-12">
   				<form action="" method="post">
					<div class="form-group">
					  <label>Email Id: </label>
					  <input type="email" class="form-control" name="admin_email">
					</div>
				  <div class="form-group">
				    <label for="dob">Password:</label>
				    <input type="password" class="form-control" name="password">
				  </div>
				  <input type="submit" class="btn btn-primary mb-4" name="admin_login" value="Submit"/>
				</form>
   			</div>
   		</div>
   	</div>


<?php include_once 'inc/footer.php'; ?>
