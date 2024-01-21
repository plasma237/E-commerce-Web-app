<link rel="stylesheet" href="style2.css">

<script>
var mainimg = document.getElementById("mainimg");
var smallimg = document.getElementsByClassName("small-img");

smallimg[0].onclick = function () {
    mainimg.src = smallimg[0].src;
}
smallimg[1].onclick = function () {
    mainimg.src = smallimg[1].src;
}
smallimg[2].onclick = function () {
    mainimg.src = smallimg[2].src;
}
smallimg[3].onclick = function () {
    mainimg.src = smallimg[3].src;
}
</script>

<style>
  .star{
    color: #e0f400c3;
    cursor: pointer;
}
</style>
<?php  
// connecting database to files
// include('./include/connect.php');

//getting products
function getproducts(){
    global $con;
    // conditions for setting categories
    if(!isset($_GET['category'])){
    $select_query="Select * from `product` order by rand() LIMIT 0,9";
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $category_id=$row['category_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' 
        class='card-img-top' alt='product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='cart-text'>$product_keyword</p>
          <p class='card-text'>Price: $product_price/-</p>
          <div class='star mb-2 m-0'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
          <a href='indexs.php?add_to_cart=$product_id' 
          class='btn btn-primary'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' 
          class='btn btn-secondary'>View more</a>
        </div>
      </div>
  </div>";
  }  
}
} 

// getting all product
function get_all_product(){
    global $con;
    // conditions for setting categories
    if(!isset($_GET['category'])){
    $select_query="Select * from `product` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $category_id=$row['category_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' 
        class='card-img-top' alt='product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='cart-text'>$product_keyword</p>
          <p class='card-text'>Price: $product_price/-</p>
          <div class='star mb-2 m-0'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
          <a href='indexs.php?add_to_cart=$product_id' 
          class='btn btn-primary'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' 
          class='btn btn-secondary'>View more</a>
        </div>
      </div>
  </div>";
    
  }  
}

}

// getting unique categories
function get_unique_categories(){
    global $con;
    // conditions for setting categories
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="Select * from `product` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    // displayed message when no stock made available
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>
        No stock available for this category</h2>";
    }

    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $category_id=$row['category_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' 
        class='card-img-top' alt='product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='cart-text'>$product_keyword</p>
          <p class='card-text'>Price: $product_price/-</p>
          <div class='star mb-2 m-0'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
          <a href='indexs.php?add_to_cart=$product_id' 
          class='btn btn-primary'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id'
           class='btn btn-secondary'>View more</a>
        </div>
      </div>
  </div>";
    
  }  
}
}

// displaying categories sidenav
function getcategories(){
    global $con;
    $select_categories="Select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);
           // $row_data=mysqli_fetch_assoc($result_categories);
           // echo $row_data['category_title'];
           while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item'>
            <a href='indexs.php?category=$category_id' class='nav-link text-light'>$category_title</a>
        </li>";
    }

}

// searching product function
function search_product(){
     global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
       $search_query="Select * from `product` where product_title
        like '%$search_data_value%'";
       $result_query=mysqli_query($con,$search_query);
       $num_of_rows=mysqli_num_rows($result_query);
       // displayed message when no stock made available
       if($num_of_rows==0){
           echo "<h2 class='text-center text-danger'>
           No products available for this category</h2>";
       }
        while($row=mysqli_fetch_assoc($result_query)){
         $product_id=$row['product_id'];
         $product_title=$row['product_title'];
         $product_description=$row['product_description'];
         $product_keyword=$row['product_keyword'];
         $product_image1=$row['product_image1'];
         $category_id=$row['category_id'];
         $product_price=$row['product_price'];
         echo "<div class='col-md-4 mb-2'>
         <div class='card'>
         <img src='./admin_area/product_images/$product_image1' 
         class='card-img-top' alt='product_title'>
         <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='cart-text'>$product_keyword</p>
          <p class='card-text'>Price: $product_price/-</p>
          <div class='star mb-2 m-0'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
          <a href='indexs.php?add_to_cart=$product_id' 
          class='btn btn-primary'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id'
           class='btn btn-secondary'>View more</a>
         </div>
         </div>
         </div>";
        }
    }  
    

}

// viewing products details
function view_details(){
    global $con;
    // conditions for setting categories
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
    $select_query="Select * from `product` where product_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_description=$row['product_description'];
      $product_keyword=$row['product_keyword'];
      $product_image1=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $product_image3=$row['product_image3'];
      $category_id=$row['category_id'];
      $product_price=$row['product_price'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/product_images/$product_image1' 
        class='card-img-top' alt='product_title'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='cart-text'>$product_keyword</p>
          <p class='card-text'>Price: $product_price/-</p>
          <div class='star mb-2 m-0'>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                        <i class='fas fa-star'></i>
                    </div>
          <a href='indexs.php?add_to_cart=$product_id' 
          class='btn btn-primary'>Add to cart</a>
          <a href='indexs.php' 
          class='btn btn-secondary'>Go Home</a>
        </div>
      </div>
  </div>
  
  <div class='col-md-8'>
  <!-- related images -->
  <div class='row'>
      <div class='col-md-12'>
          <h4 class='text-center text-info mb-5'>Related Products</h4>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/product_images/$product_image2' 
class='card-img-top' alt='$product_title'>
      </div>
      <div class='col-md-6'>
      <img src='./admin_area/product_images/$product_image3' 
class='card-img-top' alt='$product_title'>
      </div>
  </div>

</div>
 
<h1 class='text-center text-black mb-5'>Featured Products</h1>
      ";


  }  
}
}
}

// getting ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip_address=getIPAddress();
  $get_product_id=$_GET['add_to_cart'];

  $select_query="Select * from `cart` where ip_address='$get_ip_address' 
  and product_id=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){
    echo "<script>alert('This item is already present in the cart')</script>";
    echo "<script>window.open('indexs.php','_self')</script>";
  }else{
    $insert_query="insert into `cart` (product_id,ip_address,quantity) values   
    ($get_product_id,'$get_ip_address',0)";
    $result_query=mysqli_query($con,$insert_query);
    echo "<script>alert('Item is added to cart')</script>";
    echo "<script>window.open('indexs.php','_self')</script>";
  }
}

}

// function to get cart items number
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address=getIPAddress();
    $select_query="Select * from `cart` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }else{
    global $con;
    $get_ip_address=getIPAddress();
    $select_query="Select * from `cart` where ip_address='$get_ip_address'";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

// total price function
function total_cart_price(){
global $con;
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query="Select * from `cart` where ip_address='$get_ip_address'";
$result=mysqli_query($con,$cart_query);
while($row=mysqli_fetch_array($result)){
  $product_id=$row['product_id'];
  $select_product="Select * from `product` where product_id='$product_id'";
  $result_product=mysqli_query($con,$select_product);
  while($row_product_price=mysqli_fetch_array($result_product)){
    $product_price=array($row_product_price['product_price']); //getting prices
    $product_values=array_sum($product_price);  //summing prices
    $total_price+=$product_values;  //giving total sum of prices

  }
}
echo $total_price; //displaying totalprices
}

// getting user order details
function get_user_order_details(){
 global $con;
 $username=$_SESSION['username'];
 $get_details= "Select * from `user_table` where username='$username'";
 $result_query=mysqli_query($con,$get_details);
 while($row_query=mysqli_fetch_array($result_query)){
   $user_id=$row_query['user_id'];
   if(!isset($_GET['edit_account'])){
     if(!isset($_GET['my_order'])){
      if(!isset($_GET['delete_account'])){
         $get_orders= "Select * from `user_order` where user_id=$user_id and 
         order_status='pending'";
         $result_orders_query=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result_orders_query);
         if($row_count>0){
           echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>
           $row_count</span> pending orders</h3>
           <p class='text-center'><a href='profile.php?my_order' class='text-dark'>
           Order Details</a></p>";

          }else{
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have Zero pending orders</h3>
           <p class='text-center'><a href='../index.php' class='text-dark'>
           Explore Products</a></p>";
          }

        }
      }

    }

  }
}

?>