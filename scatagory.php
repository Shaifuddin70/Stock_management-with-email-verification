<?php
include 'nav/nav.php';
include 'nav/footer.php';
$_SESSION['cid']=$_GET['selectid'];
?>
<section class="home">
  <!--body-->
  <div class="text">
    <div class="container">
      <h1>Scatagry</h1>
      <td>  <?php
     
                echo '  <td><a href="add_scatagory.php? selectid=' .$_SESSION['cid'] . '"  class="text-light"><button  class="btn btn-primary" type="submit" name="submit">Add Brand</button></a></td>';
            ?></td>
      <table id="users">
        <thread>
          <tr class="text">
            <th>SL.</th>
            <th>Brand Name</th>
            <th>Description</th>
            <th>Operation</th>
          </tr>
        </thread>
        <?php
        include("conn.php");
        $query = "select * from scatagory";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $id=$_SESSION['cid'];
        $count = 1;
        if ($total != 0) {
          while ($result = mysqli_fetch_assoc($data)) {
            if($result['catagory_id']==$id){
            echo '
                  <tr>
                  <td>' . $count . '</td>
                  <td>' . $result['name'] . '</td>
                  <td>' . $result['description'] . '</td>
                  <td><a href="sscatagory.php? selectid=' . $result['id'] . '"  class="text-light"><button  class="btn btn-primary">View Items</button></a></td>
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