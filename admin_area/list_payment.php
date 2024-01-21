<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
<?php  
$get_payment= "Select * from `user_payment`";
$result=mysqli_query($con,$get_payment);
$row_count=mysqli_num_rows($result);
echo " <tr>
<th>S1 no</th>
<th>Invoice Number</th>
<th>Amount</th>
<th>Payment Mode</th>
<th>Orders Date</th>
<th>Delete</th>
</tr>
</thead>";

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Payments Yet </h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo "<tbody class='text-light bg-secondary'>
        <tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
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