<?php
require('C:\xampp2\htdocs\projectkp\lib\fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=absenkaryawan','root','');

class myPDF extends FPDF {
function header(){
	$this->SetFont('Arial','B',14);
	$this->Cell(276,5,'Laporan LogBook Kegiatan Teknisi Laboratorium FIK UPNVJ',0,0,'C');
	$this->Ln(20);
}

function headerTable(){
	$this->SetFont('Arial','B',10);
	$this->Cell(60,10,'Kategori Uraian Tugas',1,0,'C');
	$this->Cell(60,10,'Deskripsi Kegiatan',1,0,'C');
	$this->Cell(25,10,'Tgl Mulai',1,0,'C');
	$this->Cell(25,10,'Waktu Mulai',1,0,'C');
	$this->Cell(25,10,'Tgl Selesai',1,0,'C');
	$this->Cell(25,10,'Waktu Selesai',1,0,'C');
	$this->Cell(40,10,'Email',1,0,'C');
	$this-> Ln();

}
function viewTable($db){
	$this->SetFont('Arial','',10);
	$stmt = $db->query('select * from tb_kegiatan');
	while($data = $stmt-> fetch(PDO::FETCH_OBJ)){
	$this->Cell(60,10,$data->kategori,1,0,'L');
	$this->Cell(60,10,$data->deskripsi,1,0,'L');
	$this->Cell(25,10,$data->tgl_mulai,1,0,'C');
	$this->Cell(25,10,$data->waktu_mulai,1,0,'C');
	$this->Cell(25,10,$data->tgl_selesai,1,0,'C');
	$this->Cell(25,10,$data->waktu_selesai,1,0,'C');
	$this->Cell(40,10,$data->email,1,0,'L');
	$this->Ln();
	}
	}
	
}


$pdf = new myPDF();
$pdf->AddPage('L','A4',0);
$pdf->SetFont('Arial','B',12);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
?>