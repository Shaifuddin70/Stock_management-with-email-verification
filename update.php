<?php
session_start();
include 'conn.php';
$id= $_GET['updateid'];
$query = mysqli_query($conn, "SELECT * FROM `sscatagory` WHERE `id`='$id'");
$fetch = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>

    <title>Update Item</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    h1 {
        text-align: center;
        font-weight: 2000;

    }

    .button {
        text-align: right;

    }
</style>

<body>
    <form method="post">
        <h1>Update Item Details</h1>
        <div class="container mt-3">
            <?php
            if (isset($_SESSION['status'])) {
                echo "<h4>" . $_SESSION['status'] . "<h4>";
                unset($_SESSION['status']);
            }
            ?>
            <table class="table table-borderless">
                <tr>
                    <th>Item Name</th>
                    <th>Item Description</th>
                </tr>
                <tr>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="iname" value="<?php echo '' . $fetch['name'] . '' ?>"></td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="description" value="<?php echo '' . $fetch['description'] . '' ?>"></td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="price" value="<?php echo '' . $fetch['price'] . '' ?>"></td>

                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">Update</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php


if (isset($_POST['submit'])) {
    $iname = $_POST['iname'];
    $description = $_POST['description'];
    $price = $_POST['price'];


    $id = $_GET['updateid'];

    $query = "UPDATE sscatagory SET`name`='$iname',`description`='$description',`price`='$price' WHERE `id`='$id'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        
        echo "<script>window.location='sscatagory.php? selectid=" . $_SESSION['scid'] . "'</script>";
    } else {
        echo "fail";
        echo "<script>window.location='sscatagory.php? selectid=" . $_SESSION['scid'] . "'</script>";
    }
}


?>