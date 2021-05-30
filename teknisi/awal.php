<?php include 'comp/header.php'; ?>
<?php 

/*date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");
*/
if (isset($_POST['simpan'])) {

	simpan_kegiatan();
}

if (isset($_POST['hapus'])) {
  hapus_kegiatan();
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
          <div class="col-sm-12"><br>
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Logbook</li>
            </ol>
          </div><!-- /.col --></br>
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
<form action="laporan-pdf.php" target="_blank">
    <button class="btn btn-secondary" type="submit" id="cetak-laporan" href="laporan-pdf.php">
        <i class="fa fa-print"></i>
            Export Laporan
    </button>
    </form>
    <br>
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
            <select name="kategori">
				    <option value="Menyusun konsep kebutuhan lab">Menyusun konsep kebutuhan lab</option>
				    <option value="Melakukan pencatatan kebutuhan lab">Melakukan pencatatan kebutuhan lab</option>
				    <option value="Melakukan persiapan kegiatan lab">Melakukan persiapan kegiatan lab</option>
				    <option value="Melakukan pemeliharan dan perawatan">Melakukan pemeliharan dan perawatan</option>
				    <option value="Menyusun laporan kegiatan lab">Menyusun laporan kegiatan lab</option>
				    <option value="Melaksanakan tugas kedinasan (lisan/tulisan)">Melaksanakan tugas kedinasan (lisan/tulisan)</option>
				    </select>
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
	  	<table class="table table-borderless table-striped table-earning">
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
                                                <th>Aksi</th>
                                              
                                            </tr>
                                        </thead>
                                        <?php 

                                               foreach (select_kegiatan() as $row):
                                            
                                         ?>
                                        
                                        <tbody>
                                            <tr>
                                                <td><?php echo $row['kategori']; ?></td>
                                                <td><?php echo $row['deskripsi']; ?></td>
                                                <td><?php echo $row['tgl_mulai']; ?></td>
                                                <td><?php echo $row['waktu_mulai']; ?></td>
                                                <td><?php echo $row['tgl_selesai']; ?></td>
                                                <td><?php echo $row['waktu_selesai']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td>
                                                  <?php 

                                                  if ($row['dokumen'] != "") {
                                                    echo '<img src="img/'.$row['dokumen'].'" width="150">';
                                                  }else{
                                                    echo '<img src="img/user_logo.png" width="150">';
                                                  }

                                                   ?>
                                                </td>
                                                
                                                    

                                                </td>
                                                <td> 
                                                <!-- Trigger Modal Hapus -->
                              <div data-toggle="modal" data-target="#hapus-kegiatan<?= $row['kategori'] ?>">
                              <button type="button" class="btn btn-danger datapotensi" data-toggle="tooltip" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              </div>

                              <!-- Modal Hapus -->
                            <form action="" method="POST">
                      <div class="modal fade" id="hapus-kegiatan<?= $row['kategori'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <b><p class="modal-title" id="hapus-kegiatan<?= $row['kategori'] ?>" style="text-align: center; font-size: 18px;"></p></b>
                        </div>
                        <div class="modal-body">
                          <div class="modal-body">

                          <p>Kategori Uraian Tugas</p>
                        <b><p><?= $row['kategori']; ?></p></b>

                        <p>Deskripsi Kegiatan</p>
                        <b><p><?= $row['deskripsi']; ?></p></b>
                        
                        <p>Tanggal Mulai</p>
                        <b><p><?= $row['tgl_mulai']; ?></p></b>

                        <p>Waktu Mulai</p>
                        <b><p><?= $row['waktu_mulai']; ?></p></b>

                        <p>Tanggal Selesai</p>
                        <b><p><?= $row['tgl_selesai']; ?></p></b>

                        <p>Waktu Selesai</p>
                        <b><p><?= $row['waktu_selesai']; ?></p></b>

                        <p>Email</p>
                        <b><p><?= $row['email']; ?></p></b>

                        <p>Dokumen Pendukung</p>
                                                        <?php 
                                    if ($row['dokumen']!='') {
                                      echo '<img src="img/'.$row['dokumen'].'" width="150">';
                                      
                                    }else{
                                      echo '<img src="img/user_logo.png" width="150">';
                                    }
    
    
    
                                     ?>


                          <input type="hidden" name="kategori" value="<?= $row['kategori'] ?>" class="form-control" hidden>
                          </div>
                         
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    </form>


                                                </td>


                                                
                                            </tr>
                                            <?php 
                                          endforeach;
                                            ?>
                                        </tbody>


                                    </table> 
                                        

	 
<!-- end table -->
  

  
				</div>	
			</div>
		</div>
	</section>

</div>

</div>
<?php include 'comp/footer.php'; ?>
