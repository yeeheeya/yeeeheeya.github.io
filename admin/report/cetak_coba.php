<!DOCTYPE html>
<html>

<head>
	<title>CETAK LAPORAN</title>
	
</head>
<body>
 
	<center>
 
		<h2>Laporan LogBook Kegiatan Teknisi Laboratorium FIK UPNVJ</h2>
 
	</center>

	
 
	<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'absenkaryawan');
	?>
 $htmlTable=
	<table border="1" style="width: 100%">
		<tr>
			<th>Kategori Uraian Tugas</th>
			<th>Deskripsi Kegiatan</th>
			<th>Tanggal Mulai</th>
			<th>Waktu Mulai</th>
            <th>Tanggal Selesai</th>
			<th>Waktu Selesai</th>
            <th>Email</th>
		</tr>
		<?php 
		$no = 1;
		$sql = mysqli_query($koneksi,"select * from tb_kegiatan");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td><?php echo $data['kategori']; ?></td>
			<td><?php echo $data['deskripsi']; ?></td>
			<td><?php echo $data['tgl_mulai']; ?></td>
			<td><?php echo $data['waktu_mulai']; ?></td>
            <td><?php echo $data['tgl_selesai']; ?></td>
			<td><?php echo $data['waktu_selesai']; ?></td>
            <td><?php echo $data['email']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
 

	<?php
	require('lib/fpdf.php');
	$pdf = new FPDF(); 
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell($sql);
	$pdf->Output();
	
	?>

</body>
</html>