<?php
include 'nav/nav.php';
include 'nav/footer.php';
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
    <section class="home">
        <div class="text">
    <form  method="post">
        <h1>Add Catagory</h1>
        <div class="container mt-3">
            <table class="table table-borderless">
                <tr class="text">
                    <th>Name</th>
                    <th>Description</th>
                </tr>
                <tr class="text">
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="name" placeholder="Name"></td>
                    <td> <input type="text" class=" form-control form-control-lg" required="true" name="description" placeholder="Description"></td>
                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </div>
        </div>
    </form>
    </div>
    </section>
</body>

</html>
<?php
 include("conn.php");
 if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query="INSERT INTO catagory(name,description)VALUES('$name','$description')";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
      // $_SESSION['status']="Inserted Succesfully";
       
       header("location:catagory.php");
   }
   else{
      // $_SESSION['status']="Not Inserted";
       header("location:add_catagory.php");
   }
 }



?>