<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

  	if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
	$query=mysqli_query($con,"delete from wishlist where UserId='$userid' && ProductId='$pid'");
 echo "<script>alert('Jewellery has been added in to the cart');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
// Code for deleting product from wishlist
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$query=mysqli_query($con,"delete from wishlist where id='$rid'");
 echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'wishlist.php'</script>";     
}
    ?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System || Cart</title>
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
				<li><a href="dashboard.php">Home</a></li>
				<li>Cart</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="cart-table">
					<table>
						<tr>
							<th class="items">Items</th>
							<th class="price">Price</th>
							<th class="total">Shipping</th>
							<th class="qnt">Quantity</th>
							<th class="total">Total</th>
							<th class="delete">Delete</th>
							<th class="delete">Add To Cart</th>
						</tr>
						<?php 
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"select products.id as pid,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,wishlist.id,wishlist.UserId,wishlist.ProductId,wishlist.postingDate  from wishlist join products on products.id=wishlist.ProductId where wishlist.UserId='$userid'");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>
						<tr>
							<td class="items">
								<div class="image">
									<img src="admin/productimages/<?php echo $row['productImage1'];?>" height="150" alt="">
								</div>
								<h3><a href="#"><?php  echo $row['productName'];?></a></h3>
								<p><?php  echo $row['productDescription'];?>.</p>
							</td>
							<td class="price"><?php  echo $price=$row['productPrice'];?></td>
							<?php 
$totprice+=$price;
$cnt=$cnt+1; 
                           
 ?>
							<td class="price"><?php  echo $shipping=$row['shippingCharge'];?></td>
							<?php 
$shippingtotal+=$shipping;
$cnt=$cnt+1; 
                           
 ?>
							<td class="qnt">1</td>
							<td class="total"><?php  echo $total=$price+$shipping;?></td>
							
							<?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                           
 ?>
							<td class="delete"><a href="wishlist.php?delid=<?php echo $row['id'];?>" class="ico-del" onclick="return confirm('Do you really want to Delete ?');"></a></td>

							<td><?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Add to cart</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['pid'];?>">   
<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
  </form> 
<?php } ?></td>
						</tr><?php $cnt++; } } else {?>
							<tr>
								<td colspan="7" style="text-align:center;color:red;font-size:20px;">Wishlist is empty</td>
							</tr>
						<?php } ?>
					</table>
				</div>

			
		
			</div>
			<!-- / content -->
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
</html><?php } ?>
