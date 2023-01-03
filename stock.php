<?php
include 'nav/nav.php';
include 'nav/footer.php';
?>

<head>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.js"></script>
  <script src="./Jquery/tableHTMLExport.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<section class="home">
  <!--body-->
  <div class="text">
    <div class="container">
      <h1>Stocked Items</h1>
      <a href="select.php" class="text-light"><button class="btn btn-primary">Add Stock</button></a>
     
        <button class="btn btn-success" onclick="myfun()" >Export PDF</button>
      
      <button id="csv" class="btn btn-success">Export CSV</button>
      <table id="users">
        <thread>
          <tr class="text">
            <th>SL.</th>
            <th>Item Name</th>
            <th>Price</th>
            <th>Quantity</th>
          </tr>
        </thread>
        <?php
        include("conn.php");
        $query = "select * from stock";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $count = 1;
        if ($total != 0) {

          while ($result = mysqli_fetch_assoc($data)) {

            echo "
                  <tr>
                  <td>" . $count . "</td>
                  <td>" . $result['name'] . "</td>
                  <td>" . $result['price'] . "</td>
                  <td>" . $result['quantity'] . "</td>
                
                  </tr>";
            $count++;
          }
        } else {
          echo "NO records Found";
        }; ?>
      </table>

    
    </div>
    <script type="text/javascript">
      function myfun(){
        window.print();
      }
      $('#csv').click(function() {
        $("#users").tableHTMLExport({
          type: "csv",
          filename: "Stock.csv"
        })
      })
    </script>
</section>