<?php
include '../conn.php';
$catagory_id =   $_POST['catagory_data'];
//echo $catagory_id;
$scatagory = "SELECT * FROM scatagory WHERE catagory_id = $catagory_id";

$scatagory_qry = mysqli_query($conn, $scatagory);
// $output="";
$output = '<option value="">Select Brand</option>';
while ($scatagory_row = mysqli_fetch_assoc($scatagory_qry)) {
    $output .= '<option value="' . $scatagory_row['id'] . '">' . $scatagory_row['name'] . '</option>';
}
echo $output;
