<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['change'])) {
		$userid = $_SESSION['jsmsuid'];
		$cpassword = md5($_POST['currentpassword']);
		$newpassword = md5($_POST['newpassword']);
		$query1 = mysqli_query($con, "select id from users where id='$userid' and   Password='$cpassword'");
		$row = mysqli_fetch_array($query1);
		if ($row > 0) {
			$ret = mysqli_query($con, "update users set Password='$newpassword' where id='$userid'");

			echo '<script>alert("Your password successully changed.")</script>';
		} else {
			echo '<script>alert("Your current password is wrong.")</script>';
		}
	}  ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>Jewellery Shop Management System || User Profile</title>

		<link rel="stylesheet" media="all" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script type="text/javascript">
			function checkpass() {
				if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
					alert('New Password and Confirm Password field does not match');
					document.changepassword.confirmpassword.focus();
					return false;
				}
				return true;
			}
		</script>
	</head>

	<body>

		<?php include_once('includes/header.php'); ?>

		<div id="breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Change Password</li>
				</ul>
			</div>
			<!-- / container -->
		</div>
		<!-- / body -->

		<div id="body">
			<div class="container">
				<div id="content" class="full">
					<div class="cart-table">
						<form action="#" method="post">

							<label> Current Password</label>
							<input type="text" name="currentpassword" required="true" class="form-control" placeholder="Current Password">
							<br>
							<label> New Password</label>
							<input type="text" name="newpassword" required="true" class="form-control" placeholder="New Password">
							<br>
							<label> Confirm Password</label>
							<input type="text" name="confirmpassword" required="true" class="form-control" placeholder="Confirm Password">
							<br>
							<button class="btn btn-primary" type="submit" name="change">Save Change</button>
						</form>

					</div>
				</div>
				<!-- / content -->
			</div>
			<!-- / container -->
		</div>
		<!-- / body -->

		<?php include_once('includes/footer.php'); ?>


		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script>
			window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
		</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html><?php } ?>