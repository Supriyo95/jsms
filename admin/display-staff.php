<?php 
    include('includes/config.php');

    $sql = "SELECT `ID`, `AdminName`, `last_name`, `UserName`, `MobileNumber`, `Email`, `role`, `createdAt` FROM `tbladmin` WHERE role not in ('super-admin')";
    $res = mysqli_query($con, $sql);

    if(!$res){
        $msg = ["msg"=>"No Data Found!","type"=>"error"];
        echo json_encode($msg);
        die();
    }
    
    $row = mysqli_fetch_all($res,MYSQLI_ASSOC);
    echo json_encode($row);
?>