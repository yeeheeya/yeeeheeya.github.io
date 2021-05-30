<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'absenkaryawan');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;
//halaman
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;

//buat database
/*$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan where month(tgl_mulai) = '$bulan' and year(tgl_mulai) = '$tahun'");*/
$data = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id='$_POST[id]'");

//tampil per teknisi


if (isset($_POST['lihat'])) {
    lihat_laporan();
}

// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $kegiatan = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id LIKE '%".$cari."%'");
}else{
  $kegiatan = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan LIMIT $halaman_awal, $batas");
}


foreach ($kegiatan as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['kategori'];?></td>
                              <td><?=  $pro['deskripsi'];?></td>
                              <td><?= $pro['tgl_mulai'];?></td>
                              <td><?=  $pro['waktu_mulai'];?></td>
                              <td><?= $pro['tgl_selesai'];?></td>
                              <td><?=  $pro['waktu_selesai'];?></td>
                              <td><?= $pro['email'];?></td>
                            




                              </tr> 
                              <?php endforeach; ?>