<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
 echo "<script>alert('Jewellery has been added in to the cart');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}

if(isset($_POST['wsubmit']))
{
$wpid=$_POST['wpid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
if($query)
{
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
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<?php include_once('includes/header.php');?>

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
								<h1 align="center"><?php echo $_GET['subcatname'];?> Products</h1>
								<hr />
					<section class="products">
						
<?php
$pscid=intval($_GET['pscid']);                 
$ret=mysqli_query($con,"select * from products where subCategory='$pscid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
<article>
							<a href="single-product.php?pid=<?php  echo $row['id'];?>"><img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt=""></a>
							<h3><a href="single-product.php?pid=<?php  echo $row['id'];?>"><?php echo $row['productName'];?></a></h3>
							<h4><a href="single-product.php?pid=<?php  echo $row['id'];?>">$<?php echo $row['productPrice'];?></a></h4>
											<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Add to cart</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['id'];?>">   
<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
  </form> 
<?php } ?>
<div style="margin-top:4%;">
<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Wishlist</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['id'];?>">   
<button type="submit" name="wsubmit" class="btn-grey">Wishlist</button>
  </form> 
</div>
<?php } ?>
						

						</article>
						<?php } ?>
						
						
						
						
						
					</section>
				</div>
				<!-- / content -->
			</div>
	
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->
	<?php include_once('includes/footer.php');?>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")</script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
