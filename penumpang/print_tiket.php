
			<?php 
			require('../third-party/fpdf.php');
			include '../koneksi.php';
			$pdf = new FPDF('P', 'mm',array(400,220));

			$kode_booking = $_GET['kode_booking'];
     		$query = "SELECT * FROM booking WHERE kode_booking like '%".$kode_booking."%'";
     		$result = mysqli_query($koneksi, $query);
     		$cek = mysqli_num_rows($result);


    		if ($cek<0) {
    			echo "kode booking tidak ada";
    		}
    		if(!$result) {
     			die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    		}

			$pdf->AddPage();
			$pdf->Image('../img/logo.png',10,10);
			$pdf->SetFont('Arial','B',18);
			$pdf->Cell(250,7,' E-TIKET PT GUNUNGHARTA ',0,1,'C');
			$pdf->SetFont('Arial','BI',12);
			$pdf->SetTextColor(0,204,0);
			$pdf->Cell(250,7,' "We Are Your Green Solution" ',0,1,'C');
			$pdf->SetFont('Arial','B',10);
			$pdf->SetTextColor(0,0,255);
			$pdf->Cell(250,3,' www.gunungharta.com ',0,1,'C');
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(10,7,'',0,1,'C');
			$pdf->SetFont('Arial','B',8);
	    	$pdf->Cell(30,8,'NAMA',0,0,'C');
			$pdf->Cell(20,8,'ALAMAT',0,0,'C');
			$pdf->Cell(20,8,'NO HP',0,0,'C');
			$pdf->Cell(20,8,'TANGGAL',0,0,'C');
			$pdf->Cell(28,8,'KOTA BERANGKAT',0,0,'C');
			$pdf->Cell(28,8,'KOTA TUJUAN',0,0,'C');
			$pdf->Cell(25,8,'HARGA',0,0,'C');
			$pdf->Cell(30,8,'KETERANGAN',0,0,'C');
			

			
			$pdf->SetFont('Arial','',8);

$tgl=date("Y-m-d h:i:sa");
$hari= date("l");
     			
     	while ($d = mysqli_fetch_array($result)) {
		   if ($d['konfirmasi']==1) {
		   	$pdf->Cell(10,7,'',0,1,'C');
		    $pdf->Cell(30,6,$d['nama'],0,0, 'C');
			$pdf->Cell(20,6,$d['alamat'],0,0, 'C');
		    $pdf->Cell(20,6,$d['no_hp'],0,0, 'C');
		    $pdf->Cell(20,6,$d['tanggal'],0,0, 'C');
		    $pdf->Cell(28,6,$d['kota_berangkat'],0,0, 'C');
		    $pdf->Cell(28,6,$d['kota_tujuan'],0,0, 'C');
		    
if($d['kota_berangkat']=='Surabaya'){
    if($d['kota_tujuan']=='Denpasar'||$d['kota_tujuan']=='Probolinggo'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Jakarta'){
        $pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Semarang') {
    	$pdf->Cell(25,6,'RP 350.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Denpasar'){
    if($d['kota_tujuan']=='Surabaya'||$d['kota_tujuan']=='Probolinggo'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Jakarta'){
        $pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Semarang') {
    	$pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Jakarta'){
    if($d['kota_tujuan']=='Probolinggo'||$d['kota_tujuan']=='Surabaya'){
        $pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Semarang'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Denpasar') {
    	$pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Semarang'){
    if($d['kota_tujuan']=='Jakarta'||$d['kota_tujuan']=='Surabaya'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Denpasar') {
    	$pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }
}
		    /*if ($d['kota_tujuan']!=$jepara&&$d['kota_tujuan']!=$magelang&&$d['kota_tujuan']!=$purwodadi&&$d['kota_tujuan']!=$purwodadi1&&$d['kota_tujuan']!=$semarang&&$d['kota_tujuan']!=$surabaya&&$d['kota_tujuan']!=$probolinggo&&$d['kota_tujuan']!=$blitar&&$d['kota_tujuan']!=$yogya&&$d['kota_tujuan']!=$yogya1) {
				echo "<td>Rp. 650.000,00";
			}elseif ($d['kota_tujuan']!=$jakarta1&&$d['kota_tujuan']!=$jakarta&&$d['kota_tujuan']!=$jakarta2&&$d['kota_tujuan']!=$jepara&&$d['kota_tujuan']!=$magelang&&$d['kota_tujuan']!=$purwodadi&&$d['kota_tujuan']!=$purwodadi1&&$d['kota_tujuan']!=$semarang&&$d['kota_tujuan']!=$yogya&&$d['kota_tujuan']!=$yogya1) {
				echo "<td>Rp. 250.000,00";
			}elseif ($d['kota_tujuan']!=$jakarta1&&$d['kota_tujuan']!=$jakarta&&$d['kota_tujuan']!=$jakarta2&&$d['kota_tujuan']!=$surabaya&&$d['kota_tujuan']!=$probolinggo&&$d['kota_tujuan']!=$blitar) {
				echo "<td>Rp. 450.000,00";
			}else{
				echo "Kota Berangkat dan Kota Tujuan belum dipilih !";
			}
		    */
		    $pdf->Cell(30,6,'SUDAH DIKONFIRMASI',0,0, 'C');
		    $pdf->Cell(10,7,'',0,1,'C');
		    $pdf->SetFont('Arial','B',8);
		    $pdf->Cell(53,7,'Kode Booking Anda : '.$d['kode_booking'],0,0,'C');
		   }else{
		   	$pdf->Cell(10,7,'',0,1,'C');
		    $pdf->Cell(30,6,$d['nama'],0,0, 'C');
			$pdf->Cell(20,6,$d['alamat'],0,0, 'C');
		    $pdf->Cell(20,6,$d['no_hp'],0,0, 'C');
		    $pdf->Cell(20,6,$d['tanggal'],0,0, 'C');
		    $pdf->Cell(28,6,$d['kota_berangkat'],0,0, 'C');
		    $pdf->Cell(28,6,$d['kota_tujuan'],0,0, 'C');
		    
if($d['kota_berangkat']=='Surabaya'){
    if($d['kota_tujuan']=='Denpasar'||$d['kota_tujuan']=='Probolinggo'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Jakarta'){
        $pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Semarang') {
    	$pdf->Cell(25,6,'RP 350.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Denpasar'){
    if($d['kota_tujuan']=='Surabaya'||$d['kota_tujuan']=='Probolinggo'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Jakarta'){
        $pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Semarang') {
    	$pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Jakarta'){
    if($d['kota_tujuan']=='Probolinggo'||$d['kota_tujuan']=='Surabaya'){
        $pdf->Cell(25,6,'RP 450.000,00',0,0, 'C');
    }else if($d['kota_tujuan']=='Semarang'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Denpasar') {
    	$pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }
}else if($d['kota_berangkat']=='Semarang'){
    if($d['kota_tujuan']=='Jakarta'||$d['kota_tujuan']=='Surabaya'){
        $pdf->Cell(25,6,'RP 250.000,00',0,0, 'C');
    }else if ($d['kota_tujuan']=='Denpasar') {
    	$pdf->Cell(25,6,'RP 650.000,00',0,0, 'C');
    }
}
		    /*if ($d['kota_berangkat']!=$surabaya&&$d['kota_berangkat']!=$jakarta) {
		    	$pdf->Cell(25,6,'RP 450.000,00',1,0, 'C');
		    }elseif ($d['kota_berangkat']!=$jakarta&&$d['kota_berangkat']!=$semarang) {
		    	$pdf->Cell(25,6,'RP 250.000,00',1,0, 'C');
		    }elseif ($d['kota_berangkat']!=$surabaya&&$d['kota_berangkat']!=$semarang) {
		    	$pdf->Cell(25,6,'RP 650.000,00',1,0, 'C');
		    }elseif ($d['kota_berangkat']==$d['kota_tujuan']) {
		    	$pdf->Cell(25,6,'Error',1,0, 'C');
		    }else{
		    	$pdf->Cell(25,6,'Error',1,0, 'C');
		    }*/
		    $pdf->Cell(30,6,'BELUM DIKONFIRMASI',0,0, 'C');
		    $pdf->Cell(10,7,'',0,1,'C');
		    $pdf->SetFont('Arial','B',8);
		    $pdf->Cell(53,7,'Kode Booking Anda : '.$d['kode_booking'],0,0,'C');
		   }

		}
		$pdf->SetTextColor(0,10,0);
		$pdf->Cell(10,7,'',0,1,'C');
		$pdf->SetFont('Arial','',8);

		$pdf->Cell(25,8,'*Untuk keterangan : BELUM KONFIRMASI, segera konfirmasi pembayaran ke +62 821 4544 4544 atau langsung ke agen terdekat.');
		$pdf->Cell(10,4,'',0,1,'C');
		$pdf->Cell(25,8,'*Untuk keterangan : SUDAH KONFIRMASI, tunjukkan bukti eTiket ini kepada agen.');
		$pdf->Cell(10,7,'',0,1,'C');
		
		$pdf->Cell(190,8,"Tanggal Cetak eTiket : ".$hari." ".$tgl,0,1,'C');

     		
  
		    
			
			
			
	
		$pdf->Output("e-tiket_gunungharta.pdf","I");
		?>
		