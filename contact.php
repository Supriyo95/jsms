<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$query = mysqli_query($con, "insert into tblcontact(Name,Email,Message) value('$name','$email','$message')");
	if ($query) {
		echo "<script>alert('Your message was sent successfully!.');</script>";
		echo "<script>window.location.href ='contact.php'</script>";
	} else {
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}

?>
<!DOCTYPE html>
<html lang="en"> 

<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System || About Us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<?php include_once('includes/header.php'); ?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="dashboard.php">Home</a></li>
				<li>Contact Us</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<?php

				$ret = mysqli_query($con, "select * from tblpage where PageType='contactus' ");
				$cnt = 1;
				while ($row = mysqli_fetch_array($ret)) {

				?>
					<h1><?php echo $row['PageTitle']; ?></h1>
					<div class="entry">
						<p><strong>Address: </strong><?php echo $row['PageDescription']; ?>.</p>
						<p><strong>Phone: </strong><?php echo $row['MobileNumber']; ?></p>
						<p><strong>Email: </strong><?php echo $row['Email']; ?></p>
						<p><strong>Opening Hours: </strong><?php echo $row['Timing']; ?></p>

					<?php } ?>

					<div class="cart-table">
						<form action="#" method="post">

							<label> Full Name</label>

							<input type="text" placeholder="Name" required="true" name="name" class="form-control">
							<br>
							<label> Email</label>
							<input type="email" placeholder="Email" required="true" name="email" class="form-control">
							<br>
							<label> Message</label>
							<textarea rows="10" placeholder="Your Message" required="true" name="message" class="form-control"></textarea>
							<br>
							<button class="btn btn-primary" type="submit" name="submit">Submit</button>
						</form>

					</div>

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

</html>