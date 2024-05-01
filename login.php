<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from users where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['jsmsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
  
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jewellery Shop Management System || Login</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="css/style.css">
    <link rel="stylesheet" href="./css/login.css">

</head>

<body>

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="cart-table">
                    <div class="cart-table d-flex justify-content-center align-items-center">
                        <main class="main">
                            <header id="header_login">
							<h3 class="text-center">Login To User Panel</h3>
                            </header>
                            <form action="#" method="post" id="form">
                                <div class="form_wrapper">
                                    <input id="input" type="text" name="emailcont" required />
                                    <label for="input">Registered Email or Contact no. </label>
                                </div>
                                <div class="form_wrapper">
                                    <input id="password" type="password" name="password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="remember_box">
                                    <div class="remember">
                                    </div>
                                    <a href="change-password.php">Forgot Password ?</a>
                                </div>
                                <button type="submit" name="login">Login</button>
                                <div class="new_account">
                                    Don't have an account ? <a href="signup.php">Sign up</a>
                                </div>
                            </form>
                        </main>

                    </div>
                </div>
            </div>
            <!-- / content -->
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->
<!-- 
    <?php include_once('includes/footer.php');?> -->


    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>