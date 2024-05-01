<?php

if(isset($_POST['email']) && !empty($_POST['email'])){
    include('./includes/config.php');
    $email = $_POST['email'];
    $sql = "DELETE FROM tbladmin WHERE Email = '$email' ";
    $query = mysqli_query($con,$sql);
    if(!$query){
        echo "Staff not delete";
        die();
    }
    echo "Staff deleted successfully";
    mysqli_close($con);
}
?>