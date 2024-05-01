<?php
session_start();
error_reporting(0);
include_once('includes/config.php');
if (strlen($_SESSION['jsmsuid']==0)) {
  header('location:logout.php');
  } else{ 

 

    ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Mobile Store Management Ssytem-Invoice</title>
</head>
<body>

<div style="margin-left:50px;">

<?php  
$oid=$_GET['oid'];
$query=mysqli_query($con,"select products.id,products.productName,products.shippingCharge,products.productDescription,products.productPrice,products.productImage1,orders.id,orders.UserId,orders.PId,orders.IsOrderPlaced,orders.OrderNumber,orders.PaymentMethod from orders join products on products.id=orders.PId where orders.IsOrderPlaced='1' and orders.OrderNumber=$oid and orders.IsOrderPlaced=1");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="8" >Invoice of #<?php echo  $oid;?></th> 
  </tr>
  <tr>
    <th colspan="2">Order Date :</th>
<td colspan="4">  </b> <?php echo $_GET['odate'];?></td>
  </tr>
 <tr>
    <th>#</th>
<th>Product Image </th>
<th>Product Name</th>
<th>Payment Method</th>
<th>Price</th>
<th>Shipping</th>
<th>Total</th>
</tr>



  <?php  

while ($row1=mysqli_fetch_array($query)) {?>
            <tr>
  <td><?php echo $cnt;?></td>
 <td><img src="admin/productimages/<?php echo $row1['productImage1'];?>" width="60" height="40" alt="<?php echo $row1['productName']?>"></td> 
  <td><?php  echo $row1['productName'];?></td> 
  <td><?php  echo $row1['PaymentMethod'];?></td>
   <td><?php  echo $price=$row1['productPrice'];?></td>
                            <?php 
$totprice+=$price;
$cnt=$cnt+1; 
                           
 ?>
 <td><?php  echo $shipping=$row1['shippingCharge'];?></td>
                            <?php 
$shippingtotal+=$shipping;
$cnt=$cnt+1; 
                           
 ?>
 <td class="total"><?php  echo $total=$price+$shipping;?></td>
                            
                            <?php 
$grandtotal+=$total;
$cnt=$cnt+1; 
                           
 ?>
</tr>
<?php $cnt++; } ?>

<tr>
  <th colspan="6" style="text-align:center;color: red;">Grand Total </th>
<td>$ <?php  echo $grandtotal;?></td>
</tr> 
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Close" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

  <?php } ?>   