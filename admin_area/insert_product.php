<?php  
include('../include/connect.php');
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // acessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // acessing images temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


     // checking empty condition
        if($product_title=='' or $product_description=='' or
        $product_keywords=='' or $product_category=='' or
        $product_price=='' or $product_image1=='' or
        $product_image2=='' or $product_image3==''){
            echo "<script>alert('please fill all the fields')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
       
            // insert query
            $insert_product=" insert into `product` (product_title,product_description,
            product_keyword,category_id,product_image1,product_image2,product_image3,
            product_price,date,status) value('$product_title','$product_description','$product_keywords',
            '$product_category','$product_image1','$product_image2',
            '$product_image3','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_product);
            if($result_query){
                echo "<script>alert('Products Successfully Inserted')</script>";
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
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
    <style>
        body{
        overflow-x:hidden;
    }
</style>
</head>
<body class="bg-light" style="background-image: url(../Background/pb.jpg);">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--form-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label"><strong>Product Title</strong></label>
                <input type="text" name="product_title" id="product_title" 
                class="form-control" placeholder="Enter product title" 
                autocomplete="off" required="required">
            </div>

            <!--description-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label"><strong>Product Description</strong></label>
                <input type="text" name="product_description" id="product_description" 
                class="form-control" placeholder="Enter product description" 
                autocomplete="off" required="required">
            </div>

            <!--keywords-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label"><strong>Product Keywords</strong></label>
                <input type="text" name="product_keywords" id="product_keywords" 
                class="form-control" placeholder="Enter product keywords" 
                autocomplete="off" required="required">
            </div>

            <!--category-->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>

                    <?php  
                    $select_query="Select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    
                    ?>

                    <!-- <option value="">category 1</option>
                    <option value="">category 2</option>
                    <option value="">category 3</option> -->
                </select>
            </div>

            <!--image1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label"><strong>Product Image1</strong></label>
                <input type="file" name="product_image1" id="product_image1" 
                class="form-control" required="required">
            </div>

            <!--image2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label"><strong>Product Image2</strong></label>
                <input type="file" name="product_image2" id="product_image2" 
                class="form-control" required="required">
            </div>

            <!--image3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label"><strong>Product Image3</strong></label>
                <input type="file" name="product_image3" id="product_image3" 
                class="form-control" required="required">
            </div>

            <!--price-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label"><strong>Product Price</strong></label>
                <input type="text" name="product_price" id="product_price" 
                class="form-control" placeholder="Enter product price" 
                autocomplete="off" required="required">
            </div>

            <!--submit button-->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3"
                value="Insert Products">
            </div>
        </form>
    </div>
    
</body>
</html>