<?php
	require_once 'conn.php';
	session_start();
	if(ISSET($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email` = '$email'") ;
		$fetch = mysqli_fetch_array($query);
		$row = mysqli_num_rows($query);
		$hased_pass=$fetch['password'];
		if (password_verify($password,$hased_pass )) {
			if($row > 0){
				if($fetch['verified']==1){
					$_SESSION['id']=$fetch['id'];
					echo "<script>window.location='user_display.php'</script>";
				}
				else{
					echo "<script>alert('User Not verfied.')</script>";
					echo "<script>window.location='login.php'</script>";
				}
				
			}else{
				echo "<script>alert('Invalid username or password')</script>";
				echo "<script>window.location='login.php'</script>";
			}
		} else {
			echo 'Invalid password.';
		}
		
		
		
	}
