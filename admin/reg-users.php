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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Jewellery Shop Management System- User Details</title>
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
                    <h1 class="mt-4">User Details</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Details</li>
                    </ol>
                    <div class="msg-box d-flex justify-content-center mb-2"></div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            User Details
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="table table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <!-- <th>Change Permission</th> -->
                                        <th>Reg Date</th>
                                        <!-- <th>Action</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ret=mysqli_query($con,"select * from users");
                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($ret)) {

                                        ?>

                                    <tr class="gradeX">
                                        <td><?php echo $cnt;?></td>
                                        <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                                        <td><?php  echo $row['MobileNumber'];?></td>
                                        <td><?php  echo $row['Email'];?></td>
                                        <!-- <td>
                                        <?php  echo $row['user_role'];?></td>
                                        </td> -->
                                        <td><?php  echo $row['regDate'];?></td>
                                        <!-- <td>
                                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#modalForm"
                                                onclick='editUser("<?php  echo $row["Email"];?>",)'>Edit</a>
                                            <a href="#" class="btn btn-danger"
                                                onclick='deleteUser("<?php  echo $row["Email"];?>",this)'>Delete</a>
                                        </td> -->
                                    </tr>
                                    <?php $cnt=$cnt+1; } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- open modal form for update -->
                    <div class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5">User Permission</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="error-msg"></div>
                                    <form method="post" id="frmUser" name="frmUser">
                                        <select class="form-select" aria-label="Default select example" id="permit-option"> 
                                            <option value="" selected>Select Permission</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Staff">Staff</option>
                                            <option value="User">User</option>permit
                                        </select>
                                        <div class="mt-2 d-flex justify-content-end">
                                            <input type="submit" value="Save Edit" name="submit" id="editBtn" class="btn btn-outline-primary">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
            <?php include_once('includes/footer.php');?>

        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/userHandler.js" type="text/javascript"></script>
</body>

</html>
<?php } ?>