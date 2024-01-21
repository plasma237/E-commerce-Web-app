<!--connetion to file-->
<?php  
include('../include/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    
        <!--css file-->
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="./style2.css">
        <style>
            .product_img{
    width: 20%;
    object-fit: contain;
}
        </style>
       
<body>
    <!--navbar-->
<div class="container-fluid p-0">

    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../background/LOGO2.jpg" alt="" class="logo">
<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'>
            <a href='#' class='nav-link'>Welcome Guest</a>
             </li>";
             }else{
                 echo "<li class='nav-item'>
                 <a href='#' class='nav-link'>Welcome ".$_SESSION['username']."</a>
             </li>";
             } 
        if(!isset($_SESSION['username'])){
       echo "<li class='nav-item'>
            <a href='./admin_login.php' class='nav-link'>Login</a>
        </li>";
        }else{
            echo "<li class='nav-item'>
            <a href='./admin_logout.php' class='nav-link'>Logout</a>
        </li>";
        }
        ?>
    </ul>
</nav>
        </div>
    </nav>

    <!--second child-->
    <div class="bg-light">
        <h3 class="text-center p-2">Management Details</h3>
    </div>

    <!--third child-->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-3">
                <a href="#"><img src="../background/sho.png" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin Name</p>            
            <?php  
            // if(isset($_SESSION['username'])){
            //     echo "<li class='nav-item'>
            //     <a class='nav-link' href='./admin_area/profile.php'>My Account</a>
            //     </li>";
            // }

            ?>
            </div>
            <!--button*10>a.nav-link.text-light.bg-info.my-1-->
            <div class="button text-center px-5 m-2">
                <button class="border-0 m-2"><a href="insert_product.php"
                class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button class="border-0 m-2"><a href="index.php?view_product" 
                class="nav-link text-light bg-info my-1">View Products</a></button>
                <button class="border-0 m-2"><a href="index.php?insert_category" 
                class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button class="border-0 m-2"><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">
                View Categories</a></button>
                <button class="border-0 m-2"><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">
                All Orders</a></button>
                <button class="border-0 m-2"><a href="index.php?list_payment" class="nav-link text-light bg-info my-1">
                All Payment</a></button>
                <button class="border-0 m-2"><a href="index.php?list_users" class="nav-link text-light bg-info my-1">
                List Users</a></button>
                <button class="border-0 m-2"><a href="" class="nav-link text-light bg-info my-1">
                Logout</a></button>
            </div>
        </div>
    </div>  

    <!--fourth child-->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['view_product'])){
            include('view_product.php');
        }
        if(isset($_GET['edit_product'])){
            include('edit_product.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['list_payment'])){
            include('list_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>

</div>
    <!--last child-->
    <!-- <div class="bg-info p-3 text-center mt-10">
            <p>© 2021, Tech2 etc - HTML CSS Ecommerce Template</p>
        </div> -->
<!-- <footer class="section-p1">
        <div class="col">
            <img class="logo" src="../background/img.jpeg" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong>Tradex born 10,Rue Lumiere</p>
            <p><strong>Phone:</strong>(+237)674-47-97-44/655-49-02-23</p>
            <p><strong>Hours:</strong>80:00 - 18:00, Mon - sat</p>
            <div class="fol">
                <h4>Follow us:</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-pinterest-p"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">privacy policy</a>
            <a href="#">Term & Conditions</a>
            <a href="#">Contact us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Orders</a>
            <a href="#">Help</a>
        </div>
        <div class="col-install">
            <h4>Install App</h4>
            <p>From App store Or Google Play</p>
            <div class="row">
                <img src="../background/0.jpg" alt="">
                <img src="../background/9.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="../background/%.jpg" alt="">
            <img src="" alt="">
        </div>
        <div class="copyright">
            <p>© 2021, Tech2 etc - HTML CSS Ecommerce Template</p>
        </div>
</footer> -->

    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
</body>
</html>