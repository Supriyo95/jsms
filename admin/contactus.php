<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    
     $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];
$email=$_POST['email'];
$mobnumber=$_POST['mobnumber'];
$timing=$_POST['timing'];
     
   $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle',Email='$email',MobileNumber='$mobnumber',Timing='$timing',PageDescription='$pagedes' where  PageType='contactus'");
    if ($query) {
   
    echo '<script>alert("Contact us has been updated.")</script>';
  }
  else
    {
     echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Jewellery Management System|| Contact Us</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Contact Us</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact Us</li>
                        </ol>
                        <div class="card mb-4">
                                 
<form  method="post">
<?php
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                                
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Page Title</div>
<div class="col-8"><input type="text" name="pagetitle"  id="pagetitle"  value="<?php  echo $row['PageTitle'];?>" required="true" class="form-control"></div>
</div>

<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Page Description</div>
<div class="col-8"><textarea name="pagedes"  id="pagedes" class="form-control" required><?php echo  ($row['PageDescription']);?></textarea></div>
</div>
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Email</div>
<div class="col-8"><input type="text" name="email"  id="email"  value="<?php  echo $row['Email'];?>" required="true" class="form-control"></div>
</div>
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Mobile Number</div>
<div class="col-8"><input type="text" name="mobnumber"  id="mobnumber"  value="<?php  echo $row['MobileNumber'];?>" required="true" class="form-control"></div>
</div>
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-2">Timing</div>
<div class="col-8"><input type="text" name="timing"  id="timing"  value="<?php  echo $row['Timing'];?>" required="true" class="form-control"></div>
</div>
<?php } ?>
<div class="row" style="margin-top:1%; padding-left: 10px;">
<div class="col-4"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>

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