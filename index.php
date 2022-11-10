<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin/User Login</title>
</head>

<body>

<style>
	body {
		background: linear-gradient(#00b16a, rgba(0, 0, 0, 0.5), #33b5e5), url(assets/img/banner.jpg) !important;
		background-size: cover !important;
		backdrop-filter: blur(5px) !important;
	}
</style>

<?php
require 'authentication.php'; // admin authentication check 

// auth check
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
include("include/login_header.php");

?>

<style>
	
</style>

<div class="row">
	<div class="col-md-4 col-md-offset-3">
		<div class="well" style="position:relative;top:20vh;">
		<center><h2 style="margin-top:1px;">Work Management System</h2></center>
			<form class="form-horizontal form-custom-login" action="" method="POST">
			  <div class="form-heading">
			    <h2 class="text-center">Login</h2>
			  </div>
			  
			  <?php if(isset($info)){ ?>
			  <h5 class="alert alert-danger"><?php echo $info; ?></h5>
			  <?php } ?>
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Username" name="username" required/>
			  </div>
			  <div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			    <input type="password" class="form-control" placeholder="Password" name="admin_password" required/>
			  </div>
			  <button type="submit" name="login_btn" class="btn btn-info pull-right">Sign In</button>
			</form>
		</div>
	</div>
</div>


<?php

include("include/footer.php");

?>

	
</body>
</html>

