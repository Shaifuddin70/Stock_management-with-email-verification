<?php
include 'nav/nav.php';
include 'nav/footer.php';
?>
  <section class="home">
    <!--body-->
    <div class="text">
      <div class="container">
        <h1>All Registered User</h1>
        <table id="users" >
          <thread>
            <tr class="text">
              <th>SL.</th>
              <th>User Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>NID</th>
            </tr>
          </thread>
          <?php
          include("conn.php");
          $query = "select * from user";
          $data = mysqli_query($conn, $query);
          $total = mysqli_num_rows($data);
          $count = 1;
          if ($total != 0) {

            while ($result = mysqli_fetch_assoc($data)) {
              if ($result['verified'] == 1) {
                echo "
                  <tr>
                  <td>" . $count . "</td>
                  <td>" . $result['username'] . "</td>
                  <td>" . $result['email'] . "</td>
                  <td>" . $result['phone'] . "</td>
                  <td>" . $result['nid'] . "</td>
                  </tr>";
                $count++;
              }
            }
          } else {
            echo "NO records Found";
          }; ?>
        </table>
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
        </div>
</section>
