<?php 
// include database connection file
include('db_connect.php');

if(isset($_POST["from_date"], $_POST["to_date"])) {
    $orderData = "";
    $query = "SELECT * FROM orders WHERE purchased_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ORDER BY order_number desc";
    $result = mysqli_query($con, $query);

    $orderData .='
    <table class="table table-bordered">  
    <tr>  
    <th width="5%">Order Number</th>  
    <th width="30%">Customer Name</th>  
    <th width="40%">Item</th>  
    <th width="15%">Price</th>  
    <th width="10%">Purchased Date</th>  
    </tr>';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))  
        {
            $orderData .='
            <tr>  
            <td>'.$row["ref_no"].'</td>  
            <td>'.$row["customer_id"].'</td>  
            <td>'.$row["amount_tendered"].'</td>  
            <td>'.$row["total_amount"].'</td>  
            <td>'.$row["date_updated"].'</td>  
            </tr>';  
        }
    }
    else  
    {  
        $orderData .= '  
        <tr>  
        <td colspan="5">No Order Found</td>  
        </tr>';  
    }  
    $orderData .= '</table>';  
    echo $orderData;  
}
?>
