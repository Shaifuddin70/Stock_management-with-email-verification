<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
} ?>
<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!----======== CSS ======== -->
  <link rel="stylesheet" href="menu.css">

  <!----===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


  <!--<title>Dashboard Sidebar Menu</title>-->
</head>

<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
        <span class="image">
          <?php
          require 'conn.php';
          $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `id`='$_SESSION[id]'");
          $fetch = mysqli_fetch_array($query); ?>
          <img src="./image/<?php echo $fetch['image']; ?>" class="rounded-pill" style="width:40px; height: 40px;">
        </span>

        <div class="text logo-text">
          <span class="name"><?php
                              echo "<h2 class='classless'>" . $fetch['username'] . "</h2>";
                              ?></span>
          <span class="profession">Web developer</span>
        </div>
      </div>

      <i class='bx bx-chevron-right toggle'></i>
    </header>

    <div class="menu-bar">
      <div class="menu">

        <li class="search-box">
          <i class='bx bx-search icon'></i>
          <input type="text" placeholder="Search...">
        </li>

        <ul class="menu-links">
          <li class="nav-link">
            <a href="stock.php">
              <i class='bx bx-home-alt icon'></i>
              <span class="text nav-text">Stock</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="catagory.php">
              <i class='bx bx-bar-chart-alt-2 icon'></i>
              <span class="text nav-text">Catagory</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="item.php">
              <i class='bx bx-bell icon'></i>
              <span class="text nav-text">Item List</span>
            </a>
          </li>

          <li class="nav-link">
            <a href="user_display.php">
              <i class='bx bx-pie-chart-alt icon'></i>
              <span class="text nav-text">Employee List</span>
            </a>
          </li>

        </ul>
      </div>

      <div class="bottom-content">
        <li class="nav-link">
          <a href="profile.php">
            <i class='bx bx-user-circle icon'></i>
            <span class="text nav-text">Profile</span>
          </a>
        </li>
        <li class="">
          <a href="logout.php">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
          </a>
        </li>

        <li class="mode">
          <div class="sun-moon">
            <i class='bx bx-moon icon moon'></i>
            <i class='bx bx-sun icon sun'></i>
          </div>
          <span class="mode-text text">Dark mode</span>

          <div class="toggle-switch">
            <span class="switch"></span>
          </div>
        </li>

      </div>
    </div>

  </nav>