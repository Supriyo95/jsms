<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into orders(UserId,PId) values('$userid','$pid') ");
if($query)
{
 echo "<script>alert('Jewellery has been added in to the cart');</script>";
 echo "<script type='text/javascript'> document.location ='cart.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}

if(isset($_POST['wsubmit']))
{
$wpid=$_POST['wpid'];
$userid= $_SESSION['jsmsuid'];
$query=mysqli_query($con,"insert into wishlist(UserId,ProductId) values('$userid','$wpid') ");
if($query)
{
 echo "<script>alert('Jewellery has been added to the wishlist');</script>";
 echo "<script type='text/javascript'> document.location ='wishlist.php'; </script>";   
} else {
 echo "<script>alert('Something went wrong.');</script>";      
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Jewellery Shop Management System || Home Page</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php include_once('includes/header.php');?>

    <!-- <div id="slider">
        <ul>
            <li style="background-image: url(images/0.jpg)">
                <h3 class="bg-info"> Make your life better </h3>
                <h2>Genuine diamonds</h2>
            </li>
            <li class="purple" style="background-image: url(images/01.jpg)">
                <h3>She will say “yes” </h3>
                <h2>engagement ring</h2>
            </li>
            <li class="yellow" style="background-image: url(images/02.jpg)">
                <h3>You deserve to be beauty</h3>
                <h2>golden bracelets</h2>
            </li>
        </ul>
    </div> -->
    
	<div class="container">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>

                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>

				<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded-1">
                <div class="carousel-item active">
                    <img src="./images/home_bg_1.webp" class="d-block w-100" alt="..." height="450px;" width="100%">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-light">You deserve to be beauty</h5>
                        <p class="text-light">Golden necklace</p>
                    </div>
                </div>

				<div class="carousel-item">
                    <img src="./images/home_bg_3.webp" class="d-block w-100" alt="..." height="450" width="100%">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-light">Make your life better</h5>
                        <p class="text-light">Sengagement ring</p>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="./images/home_bg_2.webp" class="d-block w-100" alt="..." height="450" width="100%">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-light">She will say “yes”</h5>
                        <p class="text-light">Genuine diamonds</p>
                    </div>
                </div>

				

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- / body -->

    <div id="body">
        <div class="container">
            <div class="last-products">
                <h2>Last added products</h2>
                <section class="products">

                    <?php											
						$ret=mysqli_query($con,"select * from products  order by  id desc limit 10");
						$cnt=1;
						while ($row=mysqli_fetch_array($ret)) {?>


                    <article>
                        <a href="single-product.php?pid=<?php  echo $row['id'];?>"><img
                                src="admin/productimages/<?php echo $row['productImage1'];?>" width="250" height="60%"
                                alt=""></a>
                        <h3><?php echo $row['productName'];?></h3>
                        <h4><?php echo $row['productPrice'];?></h4>
                        <?php if($_SESSION['jsmsuid']==""){?>
                        <a href="login.php" class="btn-add">Add to cart</a>
                        <?php } else {?>
                        <form method="post">
                            <input type="hidden" name="pid" value="<?php echo $row['id'];?>">
                            <button type="submit" name="submit" class="btn-grey">Add to Cart</button>
                        </form>
                        <?php } ?>
                    </article>
                    <?php } ?>

                </section>
            </div>

            <!--Categories -->
            <section class="quick-links">
                <div class="last-products">
                    <h2>Jewellery Categories</h2>
                    <?php				
				$ret=mysqli_query($con,"select * from category");
				$cnt=1;
				while ($row=mysqli_fetch_array($ret)) {

				?>
                    <article
                        style="background-image: url(images/18.jpg); width: 360px !important; margin-top:1%; border-radius:.25rem;"
                        class="category-card">
                        <a href="subcategory.php?scid=<?php  echo $row['id'];?>&&catname=<?php  echo $row['categoryName'];?>"
                            class="table">
                            <div class="cell">
                                <div class="text">
                                    <h4><?php  echo $row['categoryName'];?></h4>
                                    <hr>
                                    <h3><?php  echo $row['categoryDescription'];?></h3>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php } ?>
            </section>
        </div>
    </div>
    <!-- / container -->
    </div>
    <!-- / body -->

    <?php include_once('includes/footer.php');?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    window.jQuery || document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>")
	$(document).ready(function(){
		 $('#myCarousel').carousel({ interval: 3000, cycle: true }); 
	});
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>