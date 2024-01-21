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
    <title>Cart Page of FK TECH</title>
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
    <style>
        .cart_img {
    width: 70px;
    height: 70px;
    object-fit: contain;
}
body{
        overflow-x:hidden;
    }
    </style>

</head>
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
            <li class="nav-item">
            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href="cart.php"><i class="fa fa-shopping-cart"
             aria-hidden="true"></i><sup><?php cart_item(); ?></sup></a></li>
             </ul>
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
    <h3 class="text-center">Featured Products</h3>
    <p class="text-center">Summer Collection New Modern Design</p>
</div>

<!-- fourth child-table -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">

                <!-- php code to display the dynamic data -->
                    <?php  
                    $get_ip_address=getIPAddress();
                    $total_price=0;
                    $cart_query="Select * from `cart` where ip_address='$get_ip_address'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colsapn='2'>Operations</th>
                        </tr>
                    </thead>";
                    while($row=mysqli_fetch_array($result)){
                      $product_id=$row['product_id'];
                      $select_product="Select * from `product` where product_id='$product_id'";
                      $result_product=mysqli_query($con,$select_product);
                      while($row_product_price=mysqli_fetch_array($result_product)){
                        $product_price=array($row_product_price['product_price']); //getting prices
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_values=array_sum($product_price);  //summing prices
                        $total_price+=$product_values;  //giving total sum of prices
            
                    ?>

                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./images/<?php echo $product_image1 ?>" alt=""  class="cart_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                    <?php  
                    $get_ip_address=getIPAddress();
                    if(isset($_POST['update_cart'])){
                        $quantities=$_POST['qty'];
                        $update_cart="update `cart` set quantity=$quantities 
                        where ip_address='$get_ip_address'";
                        $result_product_quantity=mysqli_query($con,$update_cart);
                        $total_price=$total_price*$quantities;

                    }
                    
                    ?>
                    <td><?php echo $price_table ?>/-</td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php  
                        echo $product_id
                    ?>"></td>
                    <td>
                        <!-- <button class="bg-success px-2 py-2 border-0 mx-3">Update</button -->
                        <input type="submit" value="Update Cart" 
                        class="bg-info px-2 py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-2 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove Cart" 
                        class="bg-info px-2 py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php 
                  }
}}
else{
    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
}
                ?>
        
            </tbody>
        </table>
        <?php 
            $get_ip_address=getIPAddress();
            $cart_query="Select * from `cart` where ip_address='$get_ip_address'";
            $result=mysqli_query($con,$cart_query);
            $result_count=mysqli_num_rows($result);
             if($result_count>0){
              echo "
               <div class='d-flex mb-3'>
                   <h4 class='px-3'>Subtotal: <strong class='text-info'>
                  $total_price XAF/-</strong></h4>
                  <input type='submit' value='Continue Shopping' 
                  class='bg-info px-2 py-2 border-0 mx-3' name='Continue Shopping'>
                 <button class='bg-primary p-2 py-2 border-0 text-light'>
                 <a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
            }else{
                echo "<input type='submit' value='Continue Shopping' 
                class='bg-info px-2 py-2 mb-2 border-0 mx-3' name='Continue Shopping'>";
            }
            if(isset($_POST['Continue_Shopping'])){
                echo "<script>window.open('display_all.php','_self')</script>";
            }

        ?>

        </div>
    </div>
</div>
</form>
<!-- remove item function -->
<?php  
function remove_cart_item(){
global $con;
if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="Delete from `cart` where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
  }
}
echo $remove_item=remove_cart_item();

?>

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
</body>
</html>