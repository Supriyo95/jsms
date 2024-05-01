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
       
        <title>Jewellery Management System || Sales Report Details</title>
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
                        <h1 class="mt-4">Sales Report Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales Report Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Sales Report Details
                            </div>
                            <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];
 $rtype=$_POST['requesttype'];
?>
<?php if($rtype=='mtwise'){
$month1=strtotime($fdate);
$month2=strtotime($tdate);
$m1=date("F",$month1);
$m2=date("F",$month2);
$y1=date("Y",$month1);
$y2=date("Y",$month2);
    ?>
<hr />
                            <div class="card-body">
                                <h4 align="center" style="color:blue">Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h4>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
</tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
<th>S.NO</th>
<th>Month / Year </th>
<th>Sales</th>
</tr>
                                    </tfoot>
                                    <tbody>
<?php
$fstatus='Delivered';
$ret=mysqli_query($con,"select month(tblorderaddresses.OrderTime) as lmonth,year(tblorderaddresses.OrderTime) as lyear,sum(products.productPrice) as totalitmprice,sum(products.shippingCharge) as totalshiprice from orders join tblorderaddresses on tblorderaddresses.Ordernumber=orders.OrderNumber join products on products.id=orders.PId where date(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.Status='$fstatus'  group by lmonth,lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  

                                 <tr>
                    <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
              <td><?php  echo $total=$row['totalitmprice']+$row['totalshiprice'];?></td>
             
                    </tr>
                                         <?php
$ftotal+=$total;
$cnt++;
}?><tr>
                  <td colspan="2" align="center">Total </td>
              <td>$<?php  echo $ftotal;?></td>
   
                 
                 
                </tr>  
                                       
                                    </tbody>
                                </table>
                                <?php }  else {
$year1=strtotime($fdate);
$year2=strtotime($tdate);
$y1=date("Y",$year1);
$y2=date("Y",$year2);
 ?> 
                                    <div class="card-body">
                                <h4 align="center" style="color:blue">Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h4>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
<th>S.NO</th>
<th> Year </th>
<th>Sales</th>
</tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
<th>S.NO</th>
<th> Year </th>
<th>Sales</th>
</tr>
                                    </tfoot>
                                    <tbody>
<?php
$fstatus='Delivered';
$ret=mysqli_query($con,"select year(tblorderaddresses.OrderTime) as lyear,month(tblorderaddresses.OrderTime) as lmonth,sum(products.productPrice) as totalitmprice,sum(products.shippingCharge) as totalshiprice from orders join tblorderaddresses on tblorderaddresses.Ordernumber=orders.OrderNumber join products on products.id=orders.PId where year(tblorderaddresses.OrderTime) between '$fdate' and '$tdate' and tblorderaddresses.Status='$fstatus'  group by lmonth,lyear");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  

                                <tr>
                    <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['lyear'];?></td>
              <td><?php  echo $total=$row['totalitmprice']+$row['totalshiprice'];?></td>
             
                    </tr>
                                        <?php
$ftotal+=$total;
$cnt++;
}?>
<tr>
                  <td colspan="2" align="center">Total </td>
              <td>$<?php  echo $ftotal;?></td>
                </tr> 
                                       
                                    </tbody>
                                </table>
                               <?php } ?>
                               
                              
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