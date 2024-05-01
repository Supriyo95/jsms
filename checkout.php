<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

//placing order

if(isset($_POST['placeorder'])){
//getting address
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$area=$_POST['area'];
$lndmark=$_POST['landmark'];
$city=$_POST['city'];
$zipcode=$_POST['zipcode'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$paymode=$_POST['paymode'];
$userid=$_SESSION['jsmsuid'];
//genrating order number
$orderno= mt_rand(100000000, 999999999);
$query="update orders set OrderNumber='$orderno',IsOrderPlaced='1',PaymentMethod='$paymode' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Area,Landmark,City,Zipcode,Phone,Email,PaymentMethod) values('$userid','$orderno','$fnaobno','$street','$area','$lndmark','$city','$zipcode','$phone','$email','$paymode');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-orders.php'</script>";

}
}    

 }   ?>
<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Jewellery Shop Management System || Checkout</title>
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
				<li>Checkout</li>
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
							
							<th class="delete"></th>
						</tr>
						<?php 
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"select products.id,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced  from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
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
							<td class="delete"><a href="cart.php?delid=<?php echo $row['id'];?>" class="ico-del" onclick="return confirm('Do you really want to Delete ?');"></a></td>
						</tr><?php $cnt++; } ?>
					</table>
				</div>

				
		<div class="row">
					<div class="col-lg-6">
                    <div class="section-content">
                        <h5 class="section-content__title">Billing Details</h5>
                    </div>
                    <form action="#" method="post" class="form-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-box__single-group">
                                    <label for="form-first-name">Flat or Building Number *</label>
                                    
                                    <input type="text" name="flatbldgnumber"   class="form-control" required="true">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-box__single-group">
                                    <label for="form-last-name">Street Name *</label>
                                    <input type="text" name="streename"  class="form-control" required="true">
                                </div>
                            </div>
                            
                          
                            <div class="col-md-12">
                                <div class="form-box__single-group">
                                    <label for="form-address-1">Area</label>
                                    <input type="text" name="area"  class="form-control" >
                                   
                                </div>
                            </div>
                           <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode">* Zip/Postal Code</label>
                                    <input type="text" id="zipcode" class="form-control" name="zipcode" maxlength="6" required="true">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Landmark if any</label>
                                    <input type="text" id="zipcode" class="form-control" name="landmark">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-zipcode"> Town / City *</label>
                                    <input type="text" name="city" placeholder="City" class="form-control" required="true">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-phone">*Phone</label>
                                    <input type="text" id="form-phone" class="form-control" name="phone" maxlength="10" pattern="[0-9]+">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-email">*Email Address</label>
                                    <input type="email" id="form-email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-box__single-group">
                                    <label for="form-email">*Payment Method</label>
                                    <select class="form-control" name="paymode" required>
                                    	<option value="">Choose Payment Mode</option>
                                    	<option value="Debit Card">Debit Card</option>
                                    	<option value="Credit Card">Credit Card</option>
                                    	<option value="Cash on Delivery">Cash on Delivery</option>
                                    	<option value="E-Wallet">E-Wallet</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                  
				</div>
						<div class="col-lg-6">
				  <div class="total-count">
					<h4>Subtotal: $<?php  echo $totprice;?></h4>
					<p>+shippment: $<?php  echo $shippingtotal;?></p>
					<h3>Total to pay: <strong>$<?php echo $grandtotal;?></strong></h3>
					<button class="btn btn-primary" type="submit" name="placeorder">PLACE ORDER</button></form> 
				</div>
			</div>
                </div>

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
