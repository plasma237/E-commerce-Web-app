<?php  
include('../include/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FK TECH-ADMIN REGISTRATION</title>
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
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-4">
                <img src="../background/admin2.jpg" alt="Admin Registration" 
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
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">
                            <strong>User Email</strong></label>
                        <input type="text" id="email" name="email" class="form-control"
                        placeholder="Enter email" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">
                            <strong>User Password</strong></label>
                        <input type="text" id="password" name="password" class="form-control"
                        placeholder="Enter password" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">
                            <strong>User Confirm Password</strong></label>
                        <input type="text" id="confirm_password" name="confirm_password" class="form-control"
                        placeholder="confirm_password" required="required">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0"
                        name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you have already an account?
                            <a href="admin_login.php"> Login</a>
                        </p>
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

<!-- php code -->
<?php  
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_password'];

    // select query checking existence of user
    $select_query= "Select * from `admin_table` where username='$admin_name' or
    email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Admin Name or Email already presente')</script>";
}else if($admin_password!=$confirm_admin_password)
        echo "<script>alert('Passwords donot match')</script>";
else{
        // insert_query for user information
        $insert_query="insert into `admin_table` 
        (admin_name,email,password)
        values ('$admin_name','$admin_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
        }else{
            die(mysqli_error($con));
        }

}
}
?>