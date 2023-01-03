<?php
include '../conn.php';

$scatagory_id =  $_POST['scatagory_data'];

$sscatagory = "SELECT * FROM sscatagory WHERE scatagory_id = $scatagory_id";
$sscatagory_qry = mysqli_query($conn, $sscatagory);


$output = '<option value="">Select Item</option>';
while ($sscatagory_row = mysqli_fetch_assoc($sscatagory_qry)) {
    $output .= '<option value="' . $sscatagory_row['id'] . '">' . $sscatagory_row['name'] . '</option>';
}
echo $output;
