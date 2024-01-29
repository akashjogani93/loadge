<?php
 
include('link.php');
?>
<style>
  
</style>
 <link href="assets/css/style.css" rel="stylesheet">
<style>
  .sidebar-wrapper .sidebar-header {
  padding: 20px;
  overflow: hidden;
  background-color: #f6fafb;
}
.icns{
  margin: 0 10px 0 7px;
    /* font-size: 12px; */
    width: 15px;
    height: 15px;
    line-height: 30px;
    text-align: center;
    border-radius: 4px
}
</style>

<div id="side" class="page-wrapper chiller-theme toggled">

  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
 
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">
              <span>THE LODGING</span></a>
        <div id="close-sidebar">
        <i class='bx bx-menu'></i>
        </div>
      </div>
     
      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="dashboard.php">
              <img src="img/Vector (1).png" alt=""class="icns">
              <span>DASHBOARD</span>
            </a>
          </li>
          <li>
            <a href="checkin.php">
            <img src="img/Vector (6).png" alt=""class="icns">
              <span>CHECK-IN</span>
            </a>
          </li>
          <li>
            <a href="check_out.php">
            <img src="img/Vector (6).png" alt=""class="icns">
              <span>CHECK-OUT</span>
            </a>
          </li>
          <li>
            <a href="food_ordered.php">
            <img src="img/Vector (2).png" alt=""class="icns">
              <span>FOOD ORDERED</span>
            </a>
          </li>
          <li>
            <a href="freshup.php">
            <img src="img/Vector (3).png" alt=""class="icns">
              <span>FRESHUP</span>
            </a>
          </li>
            <!-- <li>
              <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span>ROOMS</span>
              </a>
            </li> -->
          <li>
            <a href="room_master.php">
            <img src="img/Vector (5).png" alt=""class="icns">
              <span>ROOM MASTER</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
            <img src="img/report.png" alt=""class="icns">
              <span>REPORTS</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="day_calculate.php"  id="valid">Payment Calculation</a>
                </li>
                <!-- <li>
                  <a href="food_reports.php"  id="valid">Resto Reports</a>
                </li> -->
                <li>
                <a href="checkin_report.php"  id="valid">Checkin Reports</a>
                </li>
                 <li>
                 <a href="checkout_report.php"  id="valid">Checkout Reports</a>
                </li>
                <li>
                 <a href="freshup_report.php"  id="valid">Freshup Reports</a>
                </li>
               <li>
                 <a href="average_room.php"  id="valid">Average Room Reports</a>
                </li>
               
              </ul>
            </div>
          </li>
          <li>
            <a href="registration.php">
            <img src="img/register.png" alt=""class="icns">
              <span>REGISTRATION</span>
            </a>
          </li>
          <li>
                 <a href="index.php"  id="valid">
                   <img src="img/register.png" alt=""class="icns">
                   <span>LOG-OUT</span>
            	</a>
             </li>
        </ul>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

  </nav>

  <script>
      if (screen.width < 600) {
       $('#side').removeClass("toggled");
          // download complicated script
          // swap in full-source images for low-source ones
        }
    </script>