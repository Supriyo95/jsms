

<header id="header">
    <div class="container">
        <a href="index.php">
            <img src="images/logo1.png" alt="JSMS" width="120" height="95" style="position: absolute; top:0;left:0">
        </a>
        <div class="right-links">
            <ul>
                <?php if (strlen($_SESSION['jsmsuid'] > 0)) { ?>
                    <li> <?php
                            $userid = $_SESSION['jsmsuid'];
                            $ret2 = mysqli_query($con, "select sum(products.shippingCharge+products.productPrice) as total,COUNT(orders.PId) as totalp from orders join products on products.id=orders.PId where orders.UserId='$userid' and orders.IsOrderPlaced is null");
                            $resultss = mysqli_fetch_array($ret2);

                            ?>
                        <a href="cart.php"><?php echo $resultss['totalp']; ?> products, $<?php echo $resultss['total']; ?><i class="mx-2 fa-solid fa-cart-shopping" style="font-size: 1rem; margin:0 .25rem;"></i></a>
                    </li>
                    <li><a href="wishlist.php">Wishlist<i class="mx-2 fa-solid fa-heart" style="font-size: 1rem; margin:0 .25rem;"></i></a></li>
                    <li><a href="profile.php">My Profile<i class="mx-2 fa-solid fa-user" style="font-size: 1rem; margin:0 .25rem;"></i></a></li>
                    <li><a href="my-orders.php">My Orders<i class="mx-2 fa-solid fa-box-open" style="font-size: 1rem; margin:0 .25rem;"></i></a></li>
                    <li><a href="change-password.php">Setting<i class="mx-2 fa-solid fa-gear" style="font-size: 1rem; margin:0 .25rem;"></i></a></li>
                    <li><a href="logout.php">LOGOUT<i class="mx-2 fa-solid fa-right-from-bracket" style="font-size: 1rem; margin:0 .25rem;"></i></a></li><?php } ?>
            </ul>
        </div>
    </div>
    <!-- / container -->
</header>
<!-- / header -->

<nav id="menu">
    <div class="container">
        <div class="trigger"></div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="category.php">Category</a></li>


            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="admin/index.php">Admin </a></li>
            <?php if (strlen($_SESSION['jsmsuid'] == 0)) { ?>
                <li><a href="signup.php">Register</a></li>
                <li><a href="login.php">Login</a></li><?php } ?>
        </ul>
    </div>
    <!-- / container -->
</nav>
<!-- / navigation -->