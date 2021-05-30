<?php include 'comp/header.php'; ?>
<?php 

date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");

if (isset($_POST['simpan'])) {

	simpan_absen();

}

if (isset($_POST['simpan_ket'])) {
	simpan_keterangan();
}
 ?>
<div class="main-content">
	<div class="section__content section__content--p30">
		
	</div>
	<div class="content-wrapper">
	<div class="content-header">
		 <div class="row mb-2">
          <div class="col-sm-6">
           <h3 class="col-sm-10">Silahkan Isi Kegiatan, <?php echo $adm['nama']; ?>!</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Logbook</li>
            </ol>
          </div><!-- /.col -->
        </div>
	</div>


	<!-- Main Content -->
  <section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><br>
					<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-5" data-toggle="modal" data-target="#exampleModal">
  Isi Kegiatan
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Tambah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form action="" method="POST" enctype="multipart/form-data">
      	<div class="form-group">
          <label>Kategori Uraian Tugas</label>
          <input type="text" class="form-control" name="kategori">
        </div>
        <div class="form-group">
          <label>Deskripsi Kegiatan</label>
          <input type="text" class="form-control" name="deskripsi">
        </div>
         <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl_mulai">
        </div>
        <div class="form-group">
          <label>Waktu Mulai</label>
          <input type="time" class="form-control" name="waktu_mulai">
        </div>
         <div class="form-group">
          <label>Tanggal Selesai</label>
          <input type="date" class="form-control" name="tgl_selesai">
        </div>
         <div class="form-group">
          <label>Waktu Selesai</label>
          <input type="time" class="form-control" name="waktu_selesai">
        </div>
           <div class="form-group">
          <label>Email Pemberi Tugas</label>
          <input type="text" class="form-control" name="email">
        </div>

         <div class="form-group">
          <label>Dokumen Pendukung</label>
          <input type="file" class="form-control" name="dokumen">
        </div>
        <div class="modal-footer">
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
     
    </div>
      
    </div>
  </div>
</div>
</div>

<!-- Tabel -->
<div class="row">
 <div class="table-responsive table--no-card m-b-30">
	  	<!-- <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Waktu Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Email</th>
                                                <th>Dokumen Pendukung</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <?php 
                           

                                            $i = 1;
                                            
                                         ?>
                                        <tbody>
                                            <?php include 'paging.php'; ?>
										</tbody>
                                    </table> -->
                                        <table class="table table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Waktu Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Waktu Selesai</th>
                                                <th>Email</th>
                                                <th>Dokumen Pendukung</th>
                                                
                                            </tr>
                                        </thead>
                      
                                        <tbody>
                                          <?php
                                            $i = 1;
                                           include 'paging.php'; ?>
                                        </tbody>
                                    </table>
</div>
	</div>
    <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=karyawan&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=karyawan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=karyawan&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
	 
<!-- end table -->
  
				</div>	
			</div>
		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
