<?php
    $user = $_POST['username'];
    $email = $_POST['email'];
    $num = $_POST['number'];
    $nid = $_POST['nid'];
    $address=$_POST['address'];
    $pass = $_POST['password'];
    $c_pass = $_POST['con_password'];
    $image=$_FILES['image']['name'];
    $temp=$_FILES['image']['temp'];
    $uploc='image/'.$image;
    if ($pass != $c_pass) {
      echo "<script>alert('Password do not match.')</script>";
    } else {
      include("conn.php");
      $vkey = md5(time() . $user);
      //echo $vkey;
      $pass=password_hash($pass,PASSWORD_DEFAULT);
      $query="INSERT INTO `user`(`username`, `email`, `phone`, `nid`, `password`, `vkey`,`image`, `address`)
       VALUES ('$user','$email','$num','$nid','$pass','$vkey','$image','$address')";
      $stmt=mysqli_query($conn,$query);
  if ($stmt) {
    
    $sub = "Email verification";
    $mess = "<a href='http://localhost/kaicom/verify.php?vkey=$vkey'>Register Now</a>";
    $headers = "From: solutionkaicon@gmail.com" . "\r\n";
    if (mail($email, $sub, $mess, $headers)) {
      echo "<script>alert('Please Verify the email Address.')</script>";
      echo "<script>window.location='login.php'</script>";
    } else {
      echo "Email sending failed...";
    }
  } else {
    echo $mysqli->error;
  }
}
