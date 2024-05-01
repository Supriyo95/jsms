<?php
session_start();
//error_reporting(0);
include("includes/config.php");

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password= md5($_POST['inputPassword']);
        $query=mysqli_query($con," SELECT ID FROM tbladmin WHERE UserName='$username' and Password = '$password' ");
    
        if($res = mysqli_num_rows($query) > 0){
            $num=mysqli_fetch_array($query);
            $_SESSION['alogin']=$_POST['username'];
            $_SESSION['aid']=$num['ID'];
            header("location:dashboard.php");
        }
        else{
            echo "<script>alert('Invalid username or password');</script>";
            header("location:index.php");
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Jewellery Shop Management System - Login Page</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
        .admin-bg-login {
            width: 100%;
            min-height: 100vh;
            background-image: url("../images/bg-admin-login.jpg");
            background-position:  center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bg-card {
            background-color: rgb(235 245 255 / 10%);
            backdrop-filter: blur(1px);
            box-shadow: 0 0 2px #fff;
        }
        .btn-grab{
            background-image: linear-gradient(to right, #f857a6 0%, #ff5858  51%, #f857a6  100%);
        }
        .btn{
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: .5s;
            background-size: 200% auto;
            color: #fff;
            /* box-shadow: 0 0 20px #eee; */
            border-radius: 10px;
            display: block;
        }
    </style>
</head>

<body class="bg-primary admin-bg-login">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card border-0 rounded-lg mt-5 bg-card">
                                <div class="card-header">
                                    <h2 class="text-center font-weight-light my-4 text-light">Login</h2>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" name="username" type="text"
                                                placeholder="Username" required />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="inputPassword"
                                                type="password" placeholder="Password" required />
                                            <label for="inputPassword">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small text-light" href="forgot-password.php">Forgot Password?</a>
                                            <button type="submit" name="submit" class="btn btn-grab">Login</button>
                                        </div> 
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="../index.php" class="btn btn-outline-dark">Back Home!!!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <?php include_once('includes/footer.php');?>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>