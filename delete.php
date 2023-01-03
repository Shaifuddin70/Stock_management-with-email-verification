<?php
session_start();
include 'conn.php';
$id = $_GET['deleteid'];

$sql = "DELETE FROM `sscatagory` WHERE id=$id;";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'delete succesfully';
    echo "<script>window.location='sscatagory.php? selectid=" . $_SESSION['scid'] . "'</script>";
} else {
    die(mysqli_error($conn));
}
