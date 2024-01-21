<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
<?php  
$get_orders= "Select * from `user_order`";
$result=mysqli_query($con,$get_orders);
$row_count=mysqli_num_rows($result);
echo " <tr>
<th>S1 no</th>
<th>Due Amount</th>
<th>Invoice Number</th>
<th>Total Products</th>
<th>Orders Date</th>
<th>Status</th>
<th>Delete</th>
</tr>
</thead>";

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Orders Yet </h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_product=$row_data['total_product'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tbody class='text-light bg-secondary'>
        <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_product</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='' class='text-light'>
                <i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
}

?>
<!-- 
    <tbody class="text-light bg-secondary">
        <tr>
            <td>1</td>
            <td>a</td>
            <td>b</td>
            <td>c</td>
            <td>d</td>
            <td>e</td>
            <td>f</td>
        </tr>
    </tbody> -->
</table>