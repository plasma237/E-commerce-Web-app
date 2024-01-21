<!--connetion to file-->
<?php  
include('include/connect.php');
include('functions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK TECH</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" 
    crossorigin="anonymous">
    <!--bootstrap font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">

</head>
<style>
    body{
        overflow-x:hidden;
    }

#pagination a.active::after,
#pagination a:hover::after {
    color: #090fd1;
}

/* #pagination a.active::after,
#pagination a:hover::after {
    content: "";
    width: 40%;
    height: 2px;
    background: #090fd1;
    position: absolute;
    bottom: -4px;
    left: 30px;
} */
</style>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="background/LOGO2.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="indexs.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="display_all.php">Shop</a>
        </li>
        <?php  
            if(isset($_SESSION['username'])){
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                </li>";
            }else{
                echo "<li class='nav-item'>
            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }

            ?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" 
          aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" 
        aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-success"
        name="search_data_product">
      </form>
    </div>
  </div>
</nav>
</div>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
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
            <a href='./users_area/user_login.php' class='nav-link'>Login</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
            <a href='./users_area/user_logout.php' class='nav-link'>Logout</a>
        </li>";
          }
        
        ?>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Featured Products</h3>
    <p class="text-center">Summer Collection New Modern Design</p>
</div>

<!--fourth child-->
<div class="row px-1">
    <div class="col-md-10">
        <!--product-->
        <div class="row">

         <!-- Inputting products -->
         <?php  
        //  calling function to display products
          get_all_product();
          get_unique_categories();
         ?>
         <!-- row end -->
        </div>
       <!-- col end -->
    </div>

    <div class="col-md-2 bg-secondary p-0">
        <!--categorie sidenav-->
        <ul class="navbar-nav me-auto text-center">       
        <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
          
            <?php  
            // calling function displaying categories sidenav
            getcategories();
            ?>

        </ul>
    </div>
</div>
<div class="container my-3">
        <?php
        if(isset($_GET['display_all'])){
          include('display_all.php');
        } 
        if(isset($_GET['display_all2'])){
            include('display_all2.php');
        }
        ?>
    </div>

<section id="pagination" class="section-p1">
        <a class="active" href="display_all.php">1</a>
        <a href="display_all2.php">2</a>
        <a href="display_all2.php"><i class="fal fa-long-arrow-alt-right"></i></a>
    </section>

    <section id="new" class="section-p1 section-m1">
        <div class="newtext">
            <h4>Sign Up For Newletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers</span></p>
        </div>
        <div class="form">
          <!--  <input type="text" placeholder="your email address">-->
           <a href="./users_area/user_registration.php"><button class="normal">Sign Up</button></a>
        </div>

    </section>

<!--last child-->
      <?php  
        include('./include/footer.php');
        ?>
        </div>



    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
</body>
</html>