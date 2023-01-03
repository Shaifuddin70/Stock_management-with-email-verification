<?php
include 'nav/nav.php';
include 'nav/footer.php';
require 'conn.php';
$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
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

                                <div class="mt-3">
                                    <h4><?php
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
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo '' . $fetch['username'] . '' ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo '' . $fetch['email'] . '' ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo '' . $fetch['phone'] . '' ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NID</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo '' . $fetch['nid'] . '' ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo '' . $fetch['address'] . '' ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <a href="profile_edite.php"><input type="button" class="btn btn-primary px-4" value="Edit"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>