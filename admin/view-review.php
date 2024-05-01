<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

//For Adding categories
if(isset($_POST['submit']))
  {
    
    $rid=$_GET['rid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
     
   $query=mysqli_query($con, "update   tblreview set Status='$ressta',Remark='$ressta' where ID='$rid'");
    if ($query) {
   
    echo '<script>alert("Review status has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-reviews.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}
  
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Jewellery Management System || View Review</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">View Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Orders</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<?php
 $rid=$_GET['rid'];
$ret=mysqli_query($con,"select tblreview.ID,tblreview.ProductID,tblreview.ReviewTitle,tblreview.DateofReview,tblreview.Review,tblreview.Remark,tblreview.Status,products.productName,products.productweight,products.productDescription,users.FirstName,users.LastName,users.Email,users.MobileNumber from tblreview join users on users.id=tblreview.UserId join products on products.id=tblreview.ProductID where tblreview.ID='$rid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
            <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Review Details</td></tr>

    <tr>
    <th>Product Name</th>
    <td colspan="6"><?php  echo $row['productName'];?></td>
   
 </tr>
  <tr>
    
    <th>Product Description</th>
    <td colspan="6"><?php  echo $row['productDescription'];?></td>
 </tr>
  <tr>
    <th>Final Status</th>
    <td colspan="6"> <?php  
   $reviestatus=$row['Status'];
if($row['Status']=="Review Accept")
{
  echo "Review Accept";
}


if($row['Status']=="Review Reject")
{
  echo "Review Reject";
}


if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
     
  </tr>
  
 <tr>
    <th>Review By</th>
    <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
    
  </tr>
  <tr>
    
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th>Review Title</th>
    <td><?php  echo $row['ReviewTitle'];?></td>
  </tr>
  <tr>
    <th>Review</th>
    <td><?php  echo $row['Review'];?></td>
    <th>Date of Review</th>
    <td><?php  echo $row['DateofReview'];?></td>
  </tr>
</table><?php }?>
<?php

  if($reviestatus=="" ){ ?>
<table class="table table-bordered data-table">

<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="5" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control" required="true" >
     <option value="Review Accept" selected="true">Review Accept</option>
          <option value="Review Reject">Review Reject</option>
     
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
    <td ><button type="submit" name="submit" class="btn btn-primary">Update Review</button></td>
  </tr>
</form>

</table>
            <?php }?>                </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>