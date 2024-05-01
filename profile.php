<?php
session_start();

include_once('./includes/config.php');
if (strlen($_SESSION['jsmsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$uid = $_SESSION['jsmsuid'];
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$query = mysqli_query($con, "update users set FirstName='$fname', LastName='$lname' where id='$uid'");
		if ($query) {
			echo '<script>alert("Profile updated successully.")</script>';
			echo '<script>window.location.href=profile.php</script>';
		} else {
			echo '<script>alert("Something Went Wrong. Please try again.")</script>';
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>Jewellery Shop Management System || User Profile</title>

		<link rel="stylesheet" media="all" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	</head>

	<body>

		<?php include_once('includes/header.php'); ?>

		<div id="breadcrumbs">
			<div class="container">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li>Profile</li>
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
							<?php
							$uid = $_SESSION['jsmsuid'];
							$ret = mysqli_query($con, "select * from users where id='$uid'");
							$cnt = 1;
							while ($row = mysqli_fetch_array($ret)) {
							?>
								<label> First Name</label>
								<input type="text" name="firstname" required="true" class="form-control" value="<?php echo $row['FirstName']; ?>">
								<br>
								<label> Last Name</label>
								<input type="text" name="lastname" required="true" class="form-control" value="<?php echo $row['LastName']; ?>">
								<br>
								<label> Mobile Number</label>
								<input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" readonly="true" class="form-control" value="<?php echo $row['MobileNumber']; ?>">
								<br>
								<label> Email address</label>
								<input type="email" name="email" required="true" class="form-control" value="<?php echo $row['Email']; ?>" readonly="true">
								<br>
								<label>Registration</label>
								<input type="text" name="regdate" value="<?php echo $row['regDate']; ?>" readonly="true" class="form-control">
								<br>
								<button class="btn btn-primary" type="submit" name="submit">Save Change</button>
						</form>
					<?php } ?>
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