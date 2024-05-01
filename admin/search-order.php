<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>Jewellery Shop Management System || Search Orders</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Search Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Search Orders</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                              
                            </div>
                            <form method="post" class="form-horizontal">
           
           <br>
            <div class="row">
<div class="col-4" style="padding-left: 30px;font-weight: bold;">Search by Order Number / Name :</div>
<div class="col-6"><input type="text" class="form-control"  id="searchdata" name="searchdata" value="" required='true' /></div>
</div>
          
           <div class="text-center">
                  <button class="btn btn-primary my-4" type="submit" name="search">Search</button>
                </div>
          </form>
                             <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];

  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Order Number</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$ret=mysqli_query($con,"select * from tblorderaddresses join users on users.id=tblorderaddresses.UserId where Ordernumber like '%$sdata%' || users.FirstName like '%$sdata%'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  

                                <tr>
                                            <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['Ordernumber'];?></td>
                  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td><?php  echo $row['OrderTime'];?></td>
                  <?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?> 
                                    <td><a href="view-order.php?orderid=<?php echo $row['Ordernumber'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>