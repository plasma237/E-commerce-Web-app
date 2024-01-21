<!-- <?php  
// include('../include/connect.php');
// include('../functions/common_function.php');
@session_start();
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK TECH-ADMIN LOGIN</title>
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
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-4">
                <img src="../background/admin.jpg" alt="Admin Login" 
                class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">
                            <strong>Username</strong></label>
                        <input type="text" id="username" name="username" class="form-control"
                        placeholder="Enter username" required="required">
                    </div>
                    <!-- <div class="form-outline mb-4">
                        <label for="email" class="form-label">
                            <strong>User Email</strong></label>
                        <input type="text" id="email" name="email" class="form-control"
                        placeholder="Enter email" required="required">
                    </div> -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                            <strong>User Password</strong></label>
                        <input type="text" id="password" name="password" class="form-control"
                        placeholder="Enter password" required="required">
                    </div>
                    <!-- <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">
                            <strong>User Confirm Password</strong></label>
                        <input type="text" id="confirm_password" name="confirm_password" class="form-control"
                        placeholder="confirm_password" required="required">
                    </div> -->
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_login" value="Login">
                        <!-- <p class="small fw-bold mt-2 pt-1">Don't you have an account?
                            <a href="admin_registration.php"> Register</a>
                        </p> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

        <!--bootstrap js link-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
     crossorigin="anonymous"></script>
</body>
</html>

<!-- accepting admin login -->
<?php  

$host= "localhost";
$admin_name= "root";
$password= " ";
$db= "mystore";

mysql_connect($host,$admin_name,$password);
mysql_select_db($db);

if(isset($_POST['admin_Login'])){
    $admin_name=$_POST['username'];
    $admin_password=$_POST['password'];

    $sql= "Select  * from `admin_table` where 
    username='".$admin_name."'AND password='".$password."'limit 1";
    $result=mysqli_query($sql);

        if(mysql_num_rows($result)==1){
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
          echo "<script>alert('Invalied Credentials')</script>";
        }
    
    }
?> 