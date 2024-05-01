<?php
    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['email'])){
        include('./includes/config.php');

        // Get the form data
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST['username'];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        
        // check if the user already exists 
        $sql = " SELECT Email FROM `tbladmin` WHERE Email = '$email' ";
        $query = mysqli_query($con,$sql);
        // print_r($query);
        $num_row = mysqli_num_rows( $query );
        
        // If result is more than 0, then user already exist
        if( $num_row >  0 ) { 
            echo "email is already used";
            die();
        }
        
        // Validate the form data
        // if ($password !== $confPassword) {
        //     // Display an error message if the passwords do not match
        //     echo "Passwords do not match.";
        //     die();
        // }
        
        // default password setup 1234
        $hash_paswd = password_hash("1234", PASSWORD_BCRYPT);

        // sql command for insert staff
        $sql = " INSERT INTO `tbladmin`(`AdminName`, `last_name`,`UserName`, `MobileNumber`, `Email`, `Password`) VALUES ('$fname','$lname','$username','$phone','$email','$hash_paswd') ";

        $query = mysqli_query($con,$sql);

        if(!$query){
            echo "Record not added";
            die();
        }

        echo "User - <b>{$email}</b> added successfully";
        mysqli_close($con);

    }
?>