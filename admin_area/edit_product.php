
<?php 
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $get_data= "Select * from `product` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    // fetching category name
    $select_category= "Select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    // echo $category_title;
}

?>

    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label"><strong>Product Title</strong></label>
                <input type="text" id="product_title" value="<?php echo $product_title?>"
                class="form-control" name="product_title" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_description" class="form-label"><strong>Product Description</strong></label>
                <input type="text" id="product_description" value="<?php echo $product_description?>"
                class="form-control" name="product_description" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keyword" class="form-label"><strong>Product Keywords</strong></label>
                <input type="text" id="product_keyword"  value="<?php echo $product_keyword?>"
                class="form-control" name="product_keyword"   required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_category" class="form-label"><strong>Product Category</strong></label>
                <select name="product_category" id="" class="form-select">
                    <option value="<?php echo $category_title?>"><?php echo $category_title?></option>
                    <?php  
                        $select_category_all= "Select * from `categories`";
                        $result_category_all=mysqli_query($con,$select_category_all);
                       while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                        $category_title=$row_category_all['category_title'];
                        $category_id=$row_category_all['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                       };
                    
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label"><strong>Product Image1</strong></label>
                <div class="d-flex">
                <input type="file" id="product_image1" class="form-control w-90 m-auto" 
                name="product_image1" required="required">
                <img src="./product_images/<?php echo $product_image1?>" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label"><strong>Product Image2</strong></label>
                <div class="d-flex">
                <input type="file" id="product_image2" class="form-control w-90 m-auto" 
                name="product_image2" required="required">
                <img src="./product_images/<?php echo $product_image2?>" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label"><strong>Product Image3</strong></label>
                <div class="d-flex">
                <input type="file" id="product_image3" class="form-control w-90 m-auto" 
                name="product_image3" required="required">
                <img src="./product_images/<?php echo $product_image3?>" alt="" class="product_img">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label"><strong>Product Price</strong></label>
                <input type="text" id="product_price" value="<?php echo $product_price?>"
                class="form-control" name="product_price" required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" value="Update Product"
                class=" btn btn-info px-3 mb-3">
            </div>
        </form>
    </div>

    <!--last child-->
    <div class="bg-info p-3 text-center mt-10 w-100%">
            <p>© 2021, Tech2 etc - HTML CSS Ecommerce Template</p>
        </div>


<!-- editing products -->
<?php  
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_image1=$_FILES['product_image1'];
    $product_image2=$_FILES['product_image2'];
    $product_image3=$_FILES['product_image3'];
    $product_price=$_POST['product_price'];
    
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // checking for field empty
    if($product_title=='' or $product_description=='' or $product_keyword=='' or
    $product_category=='' or $product_image1=='' or $product_image2=='' or
    $product_image3=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields information')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // query to update products
        $update_product= "update `product` set  product_title='$product_title',
        product_description='$product_description',product_keyword='$product_keyword',
        category_id='$product_category',product_image1='$product_image1',
        product_image2='$product_image2',product_image3='$product_image3',
        product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product Updated Succesfully')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }

}

?>
