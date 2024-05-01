<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['review']))
  {
  	$userid= $_SESSION['jsmsuid'];
       $review=$_POST['reviewdescription'];
    $reviewtitle=$_POST['reviewtitle'];
     $pid=$_GET['pid'];
    $query=mysqli_query($con, "insert into tblreview(ProductID,ReviewTitle,Review,UserId) value('$pid','$reviewtitle','$review','$userid')");
    if ($query) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
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
	<title>Jewellery Shop Management System|| Single Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<link rel="stylesheet" media="all" href="css/style.css">
</head>
<body>
<?php include_once('includes/header.php');?>
	<div id="breadcrumbs">
		<div class="container">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Product page</li>
			</ul>
		</div>
		<!-- / container -->
	</div>
	<!-- / body -->

	<div id="body">
		<div class="container">
			<div id="content" class="full">
				<div class="product">
					<?php
$pid=$_GET['pid'];
                    
$ret=mysqli_query($con,"select * from products where id='$pid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
					<div class="image">
						<img src="admin/productimages/<?php echo $row['productImage1'];?>" alt="<?php echo $row['productName'];?>" class="img-responsive" height="100%">
					</div>
					<div class="details">
						<h1><?php echo $row['productName'];?></h1>
						<h4>$<?php echo $row['productPrice'];?></h4>
						<div class="entry">
							<p><?php echo $row['productDescription'];?>.</p>
							<div class="tabs">
								<div class="nav">
									<ul>
										<li class="active"><a href="#desc">Products Info</a></li>
										<li><a href="#spec">Proucts Reviews</a></li>
										<li><a href="#ret">View Reviews</a></li>
									</ul>
								</div>
								<div class="tab-content active" id="desc">
									<p><?php echo $row['productDescription'];?>.</p>
									<p>Type of Products: <?php echo $row['type'];?></p>
									<p>Weight of Products: <?php echo $row['productweight'];?></p>
									<p>Gender: <?php echo $row['gender'];?></p>
								</div>


								<div class="tab-content" id="spec">
									<?php if (strlen($_SESSION['jsmsuid']==0)) {

										echo "<font color='red'>Login is Required for Review</font>";
									} else {?>
									<p>Write Your Review</p>
									<form action="#" method="post" class="form-box">
                                    <div class="form-box__single-group">
                                        <label for="form-message">Title for your review*</label>
                                        <input type="text" id="reviewtitle" name="reviewtitle" required="true" class="form-control">
                                    </div>
                                    <div class="form-box__single-group">
                                        <label for="form-review">Your review*</label>
                                        <textarea id="reviewdescription" rows="5" name="reviewdescription" required="true" class="form-control"></textarea>
                                    </div>
                       
                                    <div class="from-box__buttons d-flex justify-content-between d-flex-warp m-t-25 align-items-center">
                                        <div class="from-box__left">
                                            <span>* Required fields</span>
                                        </div>
                                        <div class="form-box-right">
                                            <button class="btn btn-primary" type="submit" name="review">Send</button>
                                            or
                                            <button class="btn btn-primary" type="reset" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
								</div>
								<div class="tab-content" id="ret">
									 <?php
$pid=$_GET['pid'];
                    
$query1=mysqli_query($con,"select * from tblreview 

	join users on users.id=tblreview.UserId where ProductID='$pid' && Status='Review Accept'");
$cnt=1;
while ($result=mysqli_fetch_array($query1)) {

?>
									<p><?php echo $result['Review'];?><br />
									<span style="font-size:10px;"> Reviewed By
										<?php echo $result['Name'];?> on <?php echo $result['DateofReview'];?></span></p>
<hr />
								<?php }?>
								</div>
							</div>
						</div>
						<div class="actions">
							<label>Quantity:</label>
							<select><option>1</option></select>
							<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Add to cart</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="pid" value="<?php echo $row['id'];?>">   
<button type="submit" name="submit" class="btn-grey">Add to Cart</button>
  </form> 
<?php } ?>
<div style="margin-top:10%;">

<?php if($_SESSION['jsmsuid']==""){?>
							<a href="login.php" class="btn-grey">Wishlist</a>
							<?php } else {?>
    <form method="post"> 
    <input type="hidden" name="wpid" value="<?php echo $row['id'];?>">   
<button type="submit" name="wsubmit" class="btn-grey">Wishlist</button>
  </form> 
</div>
<?php } ?>
						</div>
					</div>
				</div><?php } ?>
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
</html>
