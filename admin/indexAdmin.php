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
        <p class="card-title mb-0"><form action="index.php" method="get">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Kode Booking / Nama" name="searching">
            </div>
            <div class="col">
              <input type="submit" class="btn btn-success" value="Cari">
            </div>
          </div>
          
          
        </form></p>
        <?php 
        if(isset($_GET['searching'])){
          $cari = $_GET['searching'];
          echo "<b>Hasil pencarian : ".$cari."</b>";
        }
        ?>
        <div class="table-responsive">
          <table class="table table-hover table-borderless">
           <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Booking</th>
              <th scope="col">Nama</th>
              <th scope="col">No Hp</th>
              <th scope="col">Alamat</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Kota Berangkat</th>
              <th scope="col">Kota Tujuan</th>
              <th scope="col">Agen Konfirmasi</th>
              <th scope="col">Keterangan</th>
              
            </tr>
          </thead>
          <tbody>
            <?php 
            if(isset($_GET['searching'])){
              $cari = $_GET['searching'];
              $data = mysqli_query($koneksi, "select * from booking where kode_booking like '%".$cari."%' or nama like '%".$cari."%' order by tanggal DESC");       
            }else{
              $data = mysqli_query($koneksi, "select * from booking order by tanggal DESC");    
            }
            $no = 1;
            while($d = mysqli_fetch_array($data)){
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['kode_booking']; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo $d['alamat']; ?></td>
                <td><?php echo $d['tanggal']; ?></td>
                <td><?php echo $d['kota_berangkat']; ?></td>
                <td><?php echo $d['kota_tujuan']; ?></td>
                <td><?php echo $d['agen_konfirmasi']; ?></td>
                <?php if ($d['konfirmasi']==1) {
                  echo "<td><div class='badge badge-success'>Completed</div></td>";
                }else{
                  echo "<td><div class='badge badge-danger'>Pending</div></td>";
                } ?>
                
              </tr>
            <?php }  ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>


</div>
<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<?php include"footer.php";?>
