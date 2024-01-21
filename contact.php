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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style2.css">

</head>
<style>
    body{
        overflow-x:hidden;
    }
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
            <a class="nav-link" href="display_all.php">Shop</a>
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
            <a class="nav-link active" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"
             aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a></li>
            <li class="nav-item">
            <a class="nav-link" href="#">Total price: <?php total_cart_price(); ?>/-</a>
            </li>
             </ul>
          <form class="d-flex" action="search_product.php" method="get">
           <input class="form-control me-2" type="search" placeholder="search" 
            aria-label="search" name="search_data">
           <input type="submit" value="search" class="btn btn-outline-success"
            name="search_data_product">
          </form>
      </div>
    </div>
  </nav>
</div>
<!-- calling cart function -->
<?php  
cart();
?>

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
    <h3 class="text-center">#Let's_Talk</h3>
    <p class="text-center">LEAVE A MESSAGE, we love to hear news from you/p>
</div>

<!-- body -->
<section id="contact-details" class="section-p1">
        <div class="details">
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency location or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Tradex Village "Rue lumiere" Douala Cameroon</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Sunday, 8.00am to 20.pm</p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.69146941109!2d9.778131349852103!3d4.0831015478263915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610c257517af81%3A0x6b6e16b5b4d74e50!2sInstitut%20Universitaire%20de%20la%20C%C3%B4te%20-%20IUC!5e0!3m2!1sfr!2scm!4v1673007255481!5m2!1sfr!2scm"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </section>

<section id="form-details">
<form action="">
            <span>LEAVE A MESSAGE</span>
            <h2>We love to hear from you</h2>
            <input type="text" placeholder="Your Name">
            <input type="text" placeholder="E-mail">
            <input type="text" placeholder="Subject">
            <textarea name="" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
            <button class="normal">Submit</button>
        </form>

        <div class="people">
            <div>
                <img src="Background/people1.jpg" alt="">
                <p><span>John Doe</span>  Senior market manager <br> Phone: + 000 123 000 77 88 <br>
                Email: conatct@example.com</p>
            </div>
            <div>
                <img src="Background/people2.jpg" alt="">
                <p><span>Simgue victorine</span>  Senior market manager <br> Phone: + 000 123 000 87 58 <br>
                Email: conatct@example.com</p>
            </div>
            <div>
                <img src="Background/people3.jpg" alt="">
                <p><span>Alice Page</span>  Senior market manager <br> Phone: + 000 123 000 09 89 <br>
                Email: conatct@example.com</p>
            </div>
        </div>

</section>

<!--last child-->
        <!-- include footer -->
        <?php  
        include('./include/footer.php');
        ?>
        </div>



    <!--bootstrap js link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
<script>
               const bar = document.getElementById('bar');
       const close = document.getElementById('close');
       const nav = document.getElementById('nav');

       if(bar){
           bar.addEventListener('click',() => {
               nav.classList.add('active');
           })
       }
       if(close){
           close.addEventListener('click',() => {
               nav.classList.remove('active');
           })
       }
</script>
</body>
</html>