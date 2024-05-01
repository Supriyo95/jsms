<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
   header('location:logout.php');
  } else{

$vid=$_GET['viewid'];
$isread=1;
$query=mysqli_query($con, "update   tblcontact set IsRead ='$isread' where ID='$vid'");
  

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
             
$ret=mysqli_query($con,"select * from tblcontact where ID=$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                 <table class="table table-bordered mg-b-0" style="font-size: 20px;">
                                   
                                   <tr style="color: blue;font-size: 30px;text-align: center;"><td>View Enquiry</td></tr>
              
                <tr>
    <th scope style="font-size: 15px;">Name</th>
    <td><?php  echo $row['Name'];?></td>
    <th style="font-size: 15px;" scope>Email</th>
    <td><?php  echo $row['Email'];?></td>
  
                </tr>
                <tr>
    
    <th style="font-size: 15px;">Message</th>
    <td colspan="4"><?php  echo $row['Message'];?></td>
  </tr>
              </table><?php $cnt=$cnt+1;} ?>
                            </div>
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