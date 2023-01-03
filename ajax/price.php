<?php
include '../conn.php';

$sscatagory_id =  $_POST['sscatagory_data'];

$price = "SELECT * FROM sscatagory WHERE id = $sscatagory_id";
$price_qry = mysqli_query($conn, $price);


$output = '<option value="">Select Price</option>';
while ($price_row = mysqli_fetch_assoc($price_qry)) {
    $output .= '<option value="' . $price_row['price'] . '">' . $price_row['price'] . '</option>';
}
echo $output;
