<?php

 if(isset($_POST['action']) && $_POST['action'] == 'edit') { 
    if(isset($_POST['permitVal']) && isset($_POST['email']) && !empty($_POST['email'])){
        include('./includes/config.php');

        $email = $_POST['email'];
        $permitVal = $_POST['permitVal']; 

        $sql = " UPDATE `tbladmin` SET `role`='$permitVal' WHERE Email = '$email' ";

        $query = mysqli_query($con,$sql);
        if(!$query){
            echo "Modification incomplete";
            die();
        }
        echo "Staff - <b>{$email}</b> updated successfully";
        mysqli_close($con);
    }
 }
?>