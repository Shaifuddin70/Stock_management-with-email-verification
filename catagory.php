<?php
include 'nav/nav.php';
include 'nav/footer.php';
?>
<section class="home">
  <!--body-->
  <div class="text">
    <div class="container">
      <h1>Catagory</h1>
      <td><a href="add_catagory.php" class="text-light"><button  class="btn btn-primary">Add Catagory</button></a></td>
      <table id="users">
        <thread>
          <tr class="text">
            <th>SL.</th>
            <th>Catagory Name</th>
            <th>Description</th>
            <th>Operation</th>
          </tr>
        </thread>
        <?php
        include("conn.php");
        $query = "select * from catagory";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $count = 1;
        if ($total != 0) {

          while ($result = mysqli_fetch_assoc($data)) {

            echo '
                  <tr>
                  <td>' . $count . '</td>
                  <td>' . $result['name'] . '</td>
                  <td>' . $result['description'] . '</td>
                  <td><a href="scatagory.php? selectid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary">View Items</button></a></td>
                  </tr>';
            $count++;
          }
        } else {
          echo "NO records Found";
        };
       ?>
      </table>

    </div>



</section>
</body>

</html>