<?php
include 'nav/nav.php';
require 'conn.php';
$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
include 'nav/footer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edite Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-3">
                                <span class="image">
                                    <?php

                                    $query = " select * from user  where id='$_SESSION[id]'";
                                    $result = mysqli_query($conn, $query);

                                    while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <img src="./image/<?php echo $data['image']; ?>" class="rounded-pill" style="width:110px; height: 110px;">

                                    <?php
                                    }
                                    ?>
                                </span>
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="uploadfile" value="" />
                                    </div>
                                    <div class="mt-3">
                                        <h4>
                                            <?php

                                            echo "<h2 class='text-success'>" . $fetch['username'] . "</h2>";
                                            ?>
                                        </h4>
                                        
                                        <p class="text-muted font-size-sm"><?php echo '' . $fetch['address'] . '' ?></p>
                                        
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
                                        <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
<?php
include 'conn.php';
$msg = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $address = $_POST['address'];
    $id = $_SESSION['id'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;
    move_uploaded_file($tempname, $folder);
    $query = "UPDATE `user` SET `id`='$id',`username`='$name',`email`='$email',`phone`='$phone',`nid`='$nid',`address`='$address', `image`='$filename' WHERE `id`='$id' ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "<script>success</script>";
        echo "<script>window.location='profile.php'</script>";
    } else {
        echo "<script>fail</script>";
    }
}
?>