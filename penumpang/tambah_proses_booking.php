<?php 

include '../koneksi.php';

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat = $_POST['alamat'];
$tanggal = $_POST['tanggal'];
$kota_berangkat = $_POST['kota_berangkat'];
$kota_tujuan = $_POST['kota_tujuan'];
$kode_booking = $_POST['kode_booking'];
// $no_kursi = implode(',', $_POST['no_kursi']);
// $last_no_kursi = $_POST['last_no_kursi'];


$strSQL1 = "SELECT kode_booking FROM booking WHERE lower(kode_booking)=lower('$kode_booking')";
$objQuery1 = mysqli_query($koneksi,$strSQL1);
$objResult1 = mysqli_fetch_array($objQuery1);
if ($objResult1) {
	echo "<script>alert('Kode Booking sudah terpakai');window.location.href = '../index.php';</script>";
}else{
	mysqli_query($koneksi,"insert into booking values('','$nama','$no_hp','$alamat','$tanggal','$kota_berangkat','$kota_tujuan','$kode_booking','0','0','0','0')");
	header("location:../index.php");
}


?>