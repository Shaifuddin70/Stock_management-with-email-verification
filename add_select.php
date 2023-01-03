<?php
 include("conn.php");
 if(isset($_POST['submit']))
 {
    $id = $_POST['sscatagory'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    $query = "SELECT *FROM `sscatagory` WHERE id='$id'";
    $data = mysqli_query($conn, $query);
   $name=mysqli_fetch_assoc($data);

$name= $name['name'];

$in_query="INSERT INTO `stock`( `name`, `quantity`, `price`) VALUES ('$name','$quantity','$price')";
$query_run = mysqli_query($conn, $in_query);
   if($in_query)
   {
    echo "<script>success</script>";
       $_SESSION['status']="Inserted Succesfully";
       
      echo "<script>window.location='stock.php'</script>";
   }
   else{
       $_SESSION['status']="Not Inserted";
       echo "<script>fail</script>";
       echo "<script>window.location='stock.php'</script>";
   }
  }



?>