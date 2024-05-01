<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System || Categories</title>
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
				<li>Jewellery Categories</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<h1 align="center">Jewellery Categories</h1>
			<hr />
			<section class="quick-links">
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

				$result_count = mysqli_query($con, "SELECT COUNT(*) As total_records FROM pagination ");
				$total_records = mysqli_fetch_array($result_count);
				$total_records = $total_records['total_records'];
				$total_no_of_pages = ceil($total_records / $total_records_per_page);
				$second_last = $total_no_of_pages - 1; // total page minus 1

				$ret = mysqli_query($con, "select * from category  LIMIT $offset, $total_records_per_page");
				$cnt = 1;
				while ($row = mysqli_fetch_array($ret)) { ?>
					<article style="background-image: url(images/18.jpg)">
						<a href="subcategory.php?scid=<?php echo $row['id']; ?>&&catname=<?php echo $row['categoryName']; ?>" class="table">
							<div class="cell">
								<div class="text">
									<h4><?php echo $row['categoryName']; ?></h4>
									<hr>
									<h3><?php echo $row['categoryDescription']; ?></h3>
								</div>
							</div>
						</a>
					</article>
				<?php } ?>


			</section>

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