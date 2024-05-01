<?php
    include("includes/config.php");
    $username ="admin";
    $password = md5("1234");
    $res=mysqli_query($con," SELECT ID,Password FROM tbladmin WHERE UserName='$username' ");
    $num=mysqli_fetch_array($res);
    print_r($num["Password"]);
    if($password == $num['Password']) {
        echo "Login Successfully!<br>";
    }
    else {
        echo "not login";
    }

    // $p = "1234";
    // $hash_p = password_hash($p,null);
    // echo $hash_p;
    // $res = password_verify($p,"$2y$10$7aFP00mo");
    // $len = strlen("$2y$10$7aFP00mo");
    
    // var_dump($len);
?>