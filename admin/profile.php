<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['aid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    
    echo '<script>alert("Admin profile has been updated.")</script>';
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
       
        <title>Jewellery Management System || Admin Profile</title>
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
                        <h1 class="mt-4">Admin Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post">  
<?php
$adminid=$_SESSION['aid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                              
<div class="row">
<div class="col-2">Admin Name</div>
<div class="col-4">
<input type="text" class="form-control" name="adminname" id="adminname" value="<?php  echo $row['AdminName'];?>" required='true' />
</div>
</div>
<br>
<div class="row">
<div class="col-2">User Name</div>
<div class="col-4">

<input type="text" class="form-control" name="username" id="username" value="<?php  echo $row['UserName'];?>" readonly="true" />
</div>
</div><br>
<div class="row">
<div class="col-2">Contact Number</div>
<div class="col-4">
<input type="text"  class="form-control" id="contactnumber" name="contactnumber" value="<?php  echo $row['MobileNumber'];?>" required='true' maxlength='10' patter='[0-9]+'  />
</div>
</div><br>
<div class="row">
<div class="col-2">Email address</div>
<div class="col-4">
<input type="email" class="form-control" id="email" name="email" class="form-control" value="<?php  echo $row['Email'];?>" readonly='true' />
</div>
</div>
<br>
<div class="row">
<div class="col-2">Registration Date</div>
<div class="col-4">
<input type="text" class="form-control" value="<?php  echo $row['AdminRegdate'];?>" readonly="true" />
</div>
</div>

<?php } ?>
<br>
<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
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