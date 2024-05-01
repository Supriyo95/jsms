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
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {

echo '<script>alert("Your current password is wrong.")</script>';
}

}
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Jewellery Management System || Change Password</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Change Password</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" name="changepassword" onsubmit="return checkpass();">  
                             
<div class="row">
<div class="col-2">Current Password</div>
<div class="col-4">
<input type="password" class="form-control" name="currentpassword" id="currentpassword" value="" required='true' />
</div>
</div>
<br>
<div class="row">
<div class="col-2">New Password</div>
<div class="col-4">

<input type="password" class="form-control" name="newpassword" id="newpassword" value="" required='true' />
</div>
</div><br>
<div class="row">
<div class="col-2">Confirm Password</div>
<div class="col-4">
<input type="password"  class="form-control" name="confirmpassword" id="confirmpassword" value="" equired='true'/>
</div>
</div>


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