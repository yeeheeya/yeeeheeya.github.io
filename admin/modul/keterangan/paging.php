<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'absenkaryawan');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_karyawan ");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;

if (isset($_GET['lihat'])) {
  lihat_laporan();
}

// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE nama LIKE '%".$cari."%'");
}else{
  $karyawan = mysqli_query($koneksi, "SELECT * FROM tb_karyawan LIMIT $halaman_awal, $batas");
}

//lihat laporan


foreach ($karyawan as $pro):
  ?>
    



<tr>
                              <td><?= $i++;  ?></td>
                              <td><?=  $pro['nip'];?></td>
                              <td><?=  $pro['nama'];?></td>
                              <td> <button class="has-sub" title= "lihat" data-target="#lihat_laporan<?= $pro['id']; ?>">
                              <a href="index.php?m=laporan&id=<?php echo $pro['id']; ?>" >
                                Lihat laporan <?= $pro['nama'];?> </a>  
                                </button></td>
                              </tr> 
                              <?php endforeach; ?>