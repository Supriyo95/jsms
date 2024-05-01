<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <title>Jewellery Shop Management System - Sales Report</title>
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
                        <h1 class="mt-4">Sales Report</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales Report</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" action="sales-reports-detailed.php">                                
<div class="row">
<div class="col-2">From Date:</div>
<div class="col-6">
    <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'/>
</div>
</div>
<br>
<div class="row">
<div class="col-2">To Date:</div>
<div class="col-6"><input type="date" class="form-control" name="todate" id="todate" value="" required='true'/></div>
</div>
<br>
<div class="row">
<div class="col-2">Request Type:</div>
<div class="col-6">
                   <input type="radio" name="requesttype" value="mtwise" checked>Month wise
                   <input type="radio" name="requesttype" value="yrwise">Year wise</div>
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