<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <title>Add Item</title>
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
        <h1>Add Item</h1>
        <div class="container mt-3">
            <table class="table table-borderless">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    



                </tr>
                <tr>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="name" placeholder="Name"></td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="description" placeholder="Description"></td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="price" placeholder="Unit Price"></td>
                </tr>

            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php
include("conn.php");
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $id = $_SESSION['scid'];
    $query = "INSERT INTO sscatagory(`name`,`description`,`price`,`scatagory_id`)VALUES('$name','$description','$price','$id')";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        $_SESSION['status'] = "Inserted Succesfully";

        echo "<script>window.location='sscatagory.php? selectid=" . $_SESSION['scid'] . "'</script>";
    } else {
        $_SESSION['status'] = "Not Inserted";
        echo "<script>window.location='sscatagory.php? selectid=" . $_SESSION['scid'] . "'</script>";
    }
}



?>