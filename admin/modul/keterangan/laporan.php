<?php include 'comp/header.php'; ?>
<?php
if (isset($_POST['lihat'])) {
    lihat_laporan();
}
?>

<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-6">Data Logbook Teknisi</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Logbook</li>
            </ol>
          </div><!-- /.col -->
        </div>
	</div>


	<!-- Main Content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><br>
	
                <div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table-responsive table-borderless table-earning">
				<tbody>
                <?php 
                        $id  = $_GET['id'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id = '$id'");
                        $pro = mysqli_fetch_array($query);
                        ?>
					<tr>
					    <th class="border-0 py-0">NIP    :   <?php echo $pro['nip']; ?>
                         </th>
					    <th class="border-0 py-0"></th>
					</tr>
					<tr>
						<th class="border-0 py-0">NAMA   :   <?php echo $pro['nama']; ?>
                            </th>
						<th class="border-0 py-0"></th>
					</tr>

                    <form action="laporan-pdf.php" target="_blank">
    <button class="btn btn-secondary" type="submit" id="cetak-laporan" href="laporan-pdf.php">
        <i class="fa fa-print"></i>
            Export Laporan
    </button>
    </form>
    

                    <?php 
                                          
                                            ?>
                                            <br>
                                            


    <center>                                    
    <div class="container">
    <br>
    <form method="post">
    <table>
    <tr>
    <td>Dari tanggal</td>
    <td><input type="date" name="dari_tgl" ></td>
    <br>
    <td>Sampai tanggal</td>
    <td><input type="date" name="sampai_tgl" ></td>
    <td><input type="submit" class="btn btn-primary" name="filter" value="Filter Tanggal"></td>
    </tr>
    </table>
    <br>

    <?php
     
    if (isset($_POST['filter'])) {

        $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
        $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
       echo "Dari tanggal   "  . $dari_tgl .  "   // Sampai tanggal  " . $sampai_tgl;
    }
    ?>
    <br><br>
    <!-- form method="post" class="form-inline">
<input type="date" name="" class="form-control">
<input type="date" name="" class="form-control ">
<button type="submit" name="filter_tgl" class="btn btn-info "> Filter</button>

</form>
    </div>            
</div>
-->
<!-- Dorpdown bulan 
<form action="" method="get">
            <div class="row">
                <div class="col">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="" disabled selected>-- Pilih Bulan --</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="12">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col ">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="" disabled selected>-- Pilih Tahun</option>
                        ?php
                            $mulai= date('Y') - 50;
                            for($i = $mulai;$i<$mulai + 100;$i++){
                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                }
                        ?>
                    </select>
                </div>
                <div class="col ">
                    <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                </div>
            </div>
        </form>
-->
<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">
	  	<!-- <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>Foto</th>
                                                
                                                
                                            </tr>
                                        </thead>
 
                                        <tbody>
                                            
										</tbody>
                                    </table> -->
                                        <table class="table table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Waktu Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Email Pemberi Tugas</th>
                                                
                                               
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                                         $i = 1;
                                         $id  = $_GET['id'];
                                        if(isset($_POST['filter'])){
                                           
                                            $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
                                            $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
                                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id = '$id' and tgl_mulai BETWEEN '$dari_tgl'and '$sampai_tgl' ORDER BY kategori DESC");
                                        } else { 
                                        $i = 1;
                                        $id  = $_GET['id'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id = '$id' ORDER BY kategori DESC");
                                         } foreach ($query as $row):
                                        
                                        ?>

                                        <tbody>
                                          <tr>
                                            <td><?php echo $i++;  ?></td>
                                            <td><?php echo $row['kategori'];?></td>
                                            <td><?php echo $row['deskripsi'];?></td>
                                            <td><?php echo $row['tgl_mulai'];?></td>
                                            <td><?php echo $row['waktu_mulai'];?></td>
                                            <td><?php echo $row['tgl_selesai'];?></td>
                                            <td><?php echo $row['waktu_selesai'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                          </tr>

                                          <?php 
                                          endforeach;
                                            ?>
                                        </tbody>
                                    </table>
</div>
	</div>
	   

<?php include 'comp/footer.php'; ?>