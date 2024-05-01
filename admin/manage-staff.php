<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<?php include_once('includes/header.php');?>
<section class="d-flex">
    <div class="sidebar" style="width: 250px;">
        <?php include_once('includes/sidebar.php');?>
    </div>
    <div class="main-staff container-fluid w-100">
        <div class="staff-header d-flex justify-content-between align-items-center mt-2">
            <h3 class="mb-0">Meet Our Staff</h3>
            <buttion class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalForm">Add Staff <i
                    class="fa-solid fa-user-plus"></i>
            </buttion>
        </div>

        <!-- card start here -->
        <div class="msg-box"></div>
        <div class="card mt-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Staff Details
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Contact No.</th>
                            <th>Email</th>
                            <th>Permission</th>
                            <th>Created at</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody id="staff-records"> </tbody>
                </table>
            </div>
        </div> <!-- card end here -->

        <!--  Modal to add new staff member -->
        <div class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5">Add Staff</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="error-msg"></div>
                        <form method="post" id="frmUser" name="frmUser">
                            <div class="mb-2">
                                <label> First Name</label>
                                <input type="text" name="firstname" placeholder="Your First Name..." required="true"
                                    class="form-control" id="fname">
                            </div>

                            <div class="mb">
                                <label> Last Name</label>
                                <input type="text" name="lastname" placeholder="Your Last Name..." required="true"
                                    class="form-control" id="lname">
                            </div>

                            <div class="mb">
                                <label> Username</label>
                                <span class="text-danger">(username is autocomplete **)</span>
                                <input type="text" name="lastname" placeholder="Your username..." required="true"
                                    class="form-control" id="username">
                            </div>

                            <div class="mb-2">
                                <label> Mobile Number</label>
                                <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}"
                                    placeholder="Mobile Number" required="true" class="form-control" id="phone">
                            </div>
                            <div class="mb-2">
                                <label> Email address</label>
                                <input type="email" name="email" placeholder="Email address" required="true"
                                    class="form-control" id="email">
                            </div>
                           
                           <!-- <div class="mb-2">
                               <label> Password</label>
                               <input type="password" name="password" placeholder="Enter password" required="true"
                                   class="form-control" id="password">
                           </div>
                           <div class="mb-2">
                               <label>Repeat Password</label>
                               <input type="password" name="repeatpassword" placeholder="Enter repeat password"
                                   required="true" class="form-control" id="confPassword">
                           </div> -->
                           
                            <div class="mt-2 d-flex justify-content-end">
                                <input type="submit" value="Add Staff" name="submit" id="addStaffBtn"
                                    class="btn btn-outline-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end modal here  -->

        <!-- modal for updates -->
        <div class="modal fade" id="updateModalForm" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-5">User Permission</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="error-msg"></div>
                                    <form method="post" id="frmStaff" name="frmStaff">
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

    </div> <!-- main-staff ends here -->

</section>



    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/userHandler.js" type="text/javascript"></script>
</body>

</html>