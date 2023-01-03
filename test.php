<?php
include 'nav/nav.php';
require 'conn.php';
$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
include 'nav/footer.php';
?>

<!DOCTYPE html>
<html>

<head>
<title>Edite Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
	<div id="content">
    <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="image/user.jpg" alt="Admin" class="rounded-circle" width="150">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="uploadfile" value="" />
                                    </div>
                                    <div class="mt-3">
                                        <h4>
                                            <?php

                                            echo "<h2 class='text-success'>" . $fetch['username'] . "</h2>";
                                            ?>
                                        </h4>
                                        <p class="text-secondary mb-1">Full Stack Developer</p>
                                        <p class="text-muted font-size-sm"><?php echo '' . $fetch['address'] . '' ?></p>
                                        <a href="user_display.php"><button class="btn btn-primary">Home</button></a>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="name" value="<?php echo '' . $fetch['username'] . '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="email" value="<?php echo '' . $fetch['email'] . '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="phone" value="<?php echo '' . $fetch['phone'] . '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">NID</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="nid" value="<?php echo '' . $fetch['nid'] . '' ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="address" value="<?php echo '' . $fetch['address'] . '' ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary" name="upload">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

		</form>
	</div>
	
</body>

</html>
<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    $id = $_SESSION['id'];

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

    include ('conn.php');

	// Get all the submitted data from the form
	$sql = "INSERT INTO user (image) VALUES ('$filename') WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $sql);
    $query = "UPDATE `user` SET `id`='$id',`username`='$name',`email`='$email',`phone`='$phone',`nid`='$nid',`address`='$address' WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $query);
	// Execute query
	mysqli_query($conn, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>