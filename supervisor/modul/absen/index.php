<?php 

include 'sesi.php';
$modul = (isset($_GET['s']))?$_GET['s']:"awal";
$nama_app = " | Absensi Teknisi";
switch ($modul) {
	case 'awal': default: $judul="Data Absen $nama_app"; include 'page.php';  break;
	
	
		
}

 ?>