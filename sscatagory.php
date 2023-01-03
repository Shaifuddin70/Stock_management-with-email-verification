<?php
include 'nav/nav.php';
include 'nav/footer.php';
$_SESSION['scid']=$_GET['selectid'];
?>
<section class="home">
    <!--body-->
    <div class="text">
        <div class="container">
            <h1>Item</h1>
            <td><?php
     
     echo '  <td><a href="add_sscatagory.php? selectid=' .$_SESSION['scid'] . '"  class="text-light"><button  class="btn btn-primary" type="submit" name="submit">Add Item</button></a></td>';
 ?></td>
            <table id="users">
                <thread>
                    <tr class="text">
                        <th>SL.</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>price</th>
                        <th>Operation</th>
                    </tr>
                </thread>
                <?php
                include("conn.php");
                $query = "select * from sscatagory";
                $data = mysqli_query($conn, $query);
                $total = mysqli_num_rows($data);
                $id = $_SESSION['scid'];
                $count = 1;
                if ($total != 0) {
                    while ($result = mysqli_fetch_assoc($data)) {
                        if ($result['scatagory_id'] == $id) {
                            echo '
                  <tr>
                  <td>' . $count . '</td>
                  <td>' . $result['name'] . '</td>
                  <td>' . $result['description'] . '</td>
                  <td>' . $result['price'] . '</td>

                  <td>
                    <a href="update.php? updateid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary">Update</button></a>
                   <a href="delete.php? deleteid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-danger">Delete</button></a>
                    </td>
                  </tr>';
                            $count++;
                        }
                    }
                } else {
                    echo "NO records Found";
                }; ?>
            </table>
          



        </div>



</section>
</body>

</html>