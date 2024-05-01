<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
	$pid = $_POST['pid'];
	$userid = $_SESSION['jsmsuid'];
	$query = mysqli_query($con, "insert into orders(UserId,PId) values('$userid','$pid') ");
	if ($query) {
		echo "<script>alert('Jewellery has been added in to the cart');</script>";
		echo "<script type='text/javascript'> document.location ='cart.php'; </script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
}

if (isset($_POST['wsubmit'])) {
	$wpid = $_POST['wpid'];
	$userid = $_SESSION['jsmsuid'];
	$query = mysqli_query($con, "insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
	if ($query) {
		echo "<script>alert('Jewellery has been added to the wishlist');</script>";
		echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";
	} else {
		echo "<script>alert('Something went wrong.');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System||Jewellery Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

	<?php include_once('includes/header.php'); ?>

	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Product results</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div class="pagination">

			</div>
			<div class="products-wrap">

				<div id="content">
					<section class="products">

						<?php
						if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
							$page_no = $_GET['page_no'];
						} else {
							$page_no = 1;
						}

						$total_records_per_page = 10;
						$offset = ($page_no - 1) * $total_records_per_page;
						$previous_page = $page_no - 1;
						$next_page = $page_no + 1;
						$adjacents = "2";

						$result_count = mysqli_query($con, "SELECT COUNT(id) As total_records FROM products ");
						$total_records = mysqli_fetch_array($result_count);
						$total_records = $total_records['total_records'];
						$total_no_of_pages = ceil($total_records / $total_records_per_page);
						$second_last = $total_no_of_pages - 1; // total page minus 1


						$ret = mysqli_query($con, "select * from products  LIMIT $offset, $total_records_per_page");
						$cnt = 1;
						while ($row = mysqli_fetch_array($ret)) {

						?><article>
								<a href="single-product.php?pid=<?php echo $row['id']; ?>"><img src="admin/productimages/<?php echo $row['productImage1']; ?>" height="150" alt=""></a>
								<h3><a href="single-product.php?pid=<?php echo $row['id']; ?>"><?php echo $row['productName']; ?></a></h3>
								<h4><a href="single-product.php?pid=<?php echo $row['id']; ?>">$<?php echo $row['productPrice']; ?></a></h4>
								<?php if ($_SESSION['jsmsuid'] == "") { ?>
									<a href="login.php" class="btn-grey">Add to cart</a>
								<?php } else { ?>
									<form method="post">
										<input type="hidden" name="pid" value="<?php echo $row['id']; ?>">
										<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
									</form>
								<?php } ?> <div style="margin-top: 2%;">
									<?php if ($_SESSION['jsmsuid'] == "") { ?>
										<a href="login.php" class="btn-grey">Wishlist</a>
									<?php } else { ?>
										<form method="post">
											<input type="hidden" name="wpid" value="<?php echo $row['id']; ?>">
											<button type="submit" name="wsubmit" class="btn-grey"> Wishlist </button>
										</form>
									<?php } ?>


							</article>
						<?php } ?>





					</section>
				</div>
				<!-- / content -->
			</div>

			<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
				<strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
			</div>
			<div class="pagination">
				<ul>

					<li <?php if ($page_no <= 1) {
							echo "class='disabled'";
						} ?>>
						<a <?php if ($page_no > 1) {
								echo "href='?page_no=$previous_page'";
							} ?>>Previous</a>
					</li>

					<?php
					if ($total_no_of_pages <= 10) {
						for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
							if ($counter == $page_no) {
								echo "<li class='active'><a>$counter</a></li>";
							} else {
								echo "<li><a href='?page_no=$counter'>$counter</a></li>";
							}
						}
					} elseif ($total_no_of_pages > 10) {

						if ($page_no <= 4) {
							for ($counter = 1; $counter < 8; $counter++) {
								if ($counter == $page_no) {
									echo "<li class='active'><a>$counter</a></li>";
								} else {
									echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
							}
							echo "<li><a>...</a></li>";
							echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
							echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
						} elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
							echo "<li><a href='?page_no=1'>1</a></li>";
							echo "<li><a href='?page_no=2'>2</a></li>";
							echo "<li><a>...</a></li>";
							for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
								if ($counter == $page_no) {
									echo "<li class='active'><a>$counter</a></li>";
								} else {
									echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
							}
							echo "<li><a>...</a></li>";
							echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
							echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
						} else {
							echo "<li><a href='?page_no=1'>1</a></li>";
							echo "<li><a href='?page_no=2'>2</a></li>";
							echo "<li><a>...</a></li>";

							for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
								if ($counter == $page_no) {
									echo "<li class='active'><a>$counter</a></li>";
								} else {
									echo "<li><a href='?page_no=$counter'>$counter</a></li>";
								}
							}
						}
					}
					?>

					<li <?php if ($page_no >= $total_no_of_pages) {
							echo "class='disabled'";
						} ?>>
						<a <?php if ($page_no < $total_no_of_pages) {
								echo "href='?page_no=$next_page'";
							} ?>>Next</a>
					</li>
					<?php if ($page_no < $total_no_of_pages) {
						echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
					} ?>
				</ul>

			</div>
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