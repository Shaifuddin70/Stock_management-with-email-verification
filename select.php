<?php
include 'nav/nav.php';
include 'nav/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <title>Select</title>
</head>

<section class="home">
<form  method="post" action="add_select.php">
    <div class="text">
        <div class="container">
            <h1>Select Item</h1>
            <table class="table">
                <tr>
                    <th class="text">Select Catagory</th>
                    <th class="text">Select Brand</th>
                    <th class="text">Select Item</th>
                    <th class="text">Select Price</th>
                    <th class="text">Select Quantity</th>

                </tr>
                <tr>
                    <td>
                        <?php
                        include 'conn.php';

                        $catagory = "SELECT * FROM catagory";
                        $result = mysqli_query($conn, $catagory);
                        ?>
                        <select class="form-select" aria-label="Default select example" name="catagory" id="catagory">
                            <option selected disabled>Select catagory</option>
                            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="scatagory" id="scatagory">
                            <option selected disabled>Select Brand</option>

                        </select>
                    </td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="sscatagory" id="sscatagory">
                            <option selected disabled>Select Item</option>

                        </select>
                    </td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="price" id="price">
                            <option selected disabled>Select Price</option>

                        </select>
                    </td>


                    <td> <input type="text" class=" form-control form-control" required="true" name="quantity" placeholder="Quantity"></td>
                </tr>
            </table>
            <div class="button">
                <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
            </div>
            <script>
                // catagory scatagory
                $('#catagory').on('change', function() {
                    var catagory_id = this.value;
                    //console.log(catagory_id);
                    $.ajax({
                        url: 'ajax/scatagory.php',
                        type: "POST",
                        data: {
                            catagory_data: catagory_id
                        },
                        success: function(result) {
                            $('#scatagory').html(result);
                            //console.log(result);
                        }
                    })
                });
                // scatagory sscatagory
                $('#scatagory').on('change', function() {
                    var scatagory_id = this.value;
                    console.log(scatagory_id);
                    $.ajax({
                        url: 'ajax/sscatagory.php',
                        type: "POST",
                        data: {
                            scatagory_data: scatagory_id
                        },
                        success: function(data) {
                            $('#sscatagory').html(data);
                            // console.log(data);
                        }
                    })
                });

                // sscatagory price
                $('#sscatagory').on('change', function() {
                    var sscatagory_id = this.value;
                    console.log(sscatagory_id);
                    $.ajax({
                        url: 'ajax/price.php',
                        type: "POST",
                        data: {
                            sscatagory_data: sscatagory_id
                        },
                        success: function(data) {
                            $('#price').html(data);
                            // console.log(data);
                        }
                    })
                });
            </script>

        </div>
    </div>
    </form>
</section>


