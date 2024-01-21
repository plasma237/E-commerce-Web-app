<?php  
// connection to database 
$con=mysqli_connect('localhost','root','','mystore');
if(!$con){
    die(mysqli_error($con));
}

?>