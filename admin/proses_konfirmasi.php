<?php 
session_start();
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$konfirmasi = $_POST['konfirmasi']; 
// update data ke database
mysqli_query($koneksi,"update booking set last_no_kursi=no_kursi,konfirmasi='$konfirmasi',agen_konfirmasi='$_SESSION[username]' where id='$id' ");

// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>