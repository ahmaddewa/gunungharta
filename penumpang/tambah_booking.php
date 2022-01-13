<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi - WWW.MALASNGODING.COM</title>
</head>
<body>
<?php include"../koneksi.php";
				$query = mysqli_query($koneksi, "SELECT kode_booking FROM booking");
$data = mysqli_fetch_array($query);/*
$kodeBooking = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBooking, 3, 3);
$urutan++;*/
function angkaRandom($length)
{
    $str        = "";
    $characters = '0123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

if (angkaRandom(10)==$data) {
	header("location:tambah_booking.php");
}else{
$huruf = "GH-";
$kodeBooking = $huruf . sprintf("%03s", angkaRandom(10)); 
}



?>
	<h2>CRUD DATA MAHASISWA - WWW.MALASNGODING.COM</h2>
	<br/>
	<a href="index.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA MAHASISWA</h3>
	<form method="post" action="tambah_proses_booking.php">
		<table>
			<tr>
				<td>Kode Booking : </td>
				<td><input type="text" required="required" name="kode_booking" value="<?php echo $kodeBooking ?>" readonly></td>
				<td>*kode ini dipakai untuk cek tiket !</td>
			</tr>
			<tr>			
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td><input type="number" name="no_hp"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tanggal"></td>
			</tr>
			<tr>
				<td>Kota Berangkat</td>
				<td><select name="kota_berangkat">
					<option value="Denpasar">Denpasar</option>
					<option value="Surabaya">Surabaya</option>
					<option value="Semarang">Semarang</option>
					<option value="Jakarta">Jakarta</option>
				</select></td>
			</tr>
			<tr>
				<td>Kota Tujuan</td>
				<td><select name="kota_tujuan">
					<option value="Jakarta">Jakarta</option>
					<option value="Surabaya">Surabaya</option>
					<option value="Semarang">Semarang</option>
					<option value="Denpasar">Denpasar</option>
				</select></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>Denpasar - Surabaya &nbsp;= RP 250.000,00</td>
			</tr>
			<tr>
				<td></td>
				<td>Denpasar - Semarang = RP 450.000,00</td>
			</tr>
			<tr>
				<td></td>
				<td>Denpasar - Jakarta &nbsp;&nbsp;&nbsp;&nbsp;= RP 650.000,00</td>
			</tr>
			<tr>
				<td></td>
				<td>*Berlaku sebaliknya.</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>