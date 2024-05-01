<?php
include("config.php");
if(isset($_POST['sub']))
  {
   
    $email=$_POST['email'];
 
     
    $query=mysqli_query($con, "insert into tblsubscriber(Email) value('$email')");
    if ($query) {
   echo "<script>alert('Your subscribe successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<footer id="footer" class="">
    <div class="container">
        <div class="cols footer-content">
            <div class="col">
                <h3>Shorts Links</h3>
                <ul>
                    <li><a href="index.php">Home </a></li>
                    <li><a href="category.php">Category </a></li>
                    <li><a href="contact.php">Contact Us </a></li>
                    <li><a href="about.php">About Us </a></li>
                </ul>
            </div>
            <div class="col media">
                <h3>Social media</h3>
                <ul class="social">
                    <li><a href="#"><span class="ico ico-fb"></span>Facebook</a></li>
                    <li><a href="#"><span class="ico ico-tw"></span>Twitter</a></li>
                    <li><a href="#"><span class="ico ico-gp"></span>Google+</a></li>
                </ul>
            </div>
            <div class="col contact">
                <?php

                     $ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
                     $cnt=1;
                     while ($row=mysqli_fetch_array($ret)) {

              ?>
               <h3><?php  echo $row['PageTitle'];?></h3>
                <p style="color: white"><?php  echo $row['PageDescription'];?></p>
                <p><span class="ico ico-em"></span><?php  echo $row['Email'];?></p>
                <p><span class="ico ico-ph"></span><?php  echo $row['MobileNumber'];?></p><?php } ?>
            </div>
       </div>
       <p class="copy">Jewellery Shop Management System</p>
    </div><!-- / container -->

    <!-- <div class="footer-logo">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300">
            <path fill="#eee" fill-opacity="1"
                d="M0,320L40,314.7C80,309,160,299,240,272C320,245,400,203,480,192C560,181,640,203,720,213.3C800,224,880,224,960,218.7C1040,213,1120,203,1200,170.7C1280,139,1360,85,1400,58.7L1440,32L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
            </path>
        </svg>
    </div> -->


</footer><!--  footer -->