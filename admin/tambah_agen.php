<?php
session_start();

include('../koneksi.php');
include('header.php');

if($_SESSION['level']<2){
  header("location:../login.php?pesan=admin");
}
?>
<!-- partial -->
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="indexAdmin.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="tambah_agen.php"> Add Agen </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="list_agen.php"> List Agen </a></li>
        </ul>
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="index.php"> Akses Agen Page </a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="../logout.php">
        <i class="ti-power-off menu-icon"></i>
        <span class="menu-title">Log out</span>
      </a>
    </li>
  </ul>
</nav>
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['username']; ?></h3>
            <h6 class="font-weight-normal mb-0">Semua sistem berjalan lancar!</h6>
          </div>
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="images/dashboard/logo.png" height="310px" alt="people">
            <div class="weather-info">

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Total Agen</p>
                <p class="fs-30 mb-2"><?php
                include"../koneksi.php";
                $result = mysqli_query($koneksi,"SELECT * FROM agen WHERE level=1 ");
                $num_rows = mysqli_num_rows($result);
                echo $num_rows;
              ?></p>
              <p>&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Booking</p>
              <p class="fs-30 mb-2"><?php
              include"../koneksi.php";
              $result = mysqli_query($koneksi,"SELECT * FROM booking");
              $num_rows = mysqli_num_rows($result);
              echo $num_rows;
            ?></p>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
        <div class="card card-light-danger">
          <div class="card-body">
            <p class="mb-4">Booking Pending</p>
            <p class="fs-30 mb-2"><?php
            include"../koneksi.php";
            $result = mysqli_query($koneksi,"SELECT * FROM booking WHERE konfirmasi=0");
            $num_rows = mysqli_num_rows($result);
            echo $num_rows;
          ?></p>
          <p>&nbsp;</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 stretch-card transparent">
      <div class="card bg-success">
        <div class="card-body">
          <p class="mb-4">Booking Completed</p>
          <p class="fs-30 mb-2"><?php
          include"../koneksi.php";
          $result = mysqli_query($koneksi,"SELECT * FROM booking WHERE konfirmasi=1");
          $num_rows = mysqli_num_rows($result);
          echo $num_rows;
        ?></p>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>


<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       <form method="post" action="proses_tambah_agen.php">
        <div class="form-group">
          <label for="exampleInputNama">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputNama">Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleInputNama">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">

          <input type="number" value="1" hidden name="level" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="indexAdmin.php" class="btn btn-warning">Kembali</a>
      </form>

    </div>
  </div>
</div>

</div>


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include"footer.php";?>





