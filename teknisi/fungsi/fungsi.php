<?php 

$koneksi = mysqli_connect('localhost','root','','absenkaryawan');

// --------------------------------------------ADMIN SECTION-----------------------------------------------------------------------------
function panggil_karyawan()
{
	global $koneksi;
	$id  = $_SESSION['idabsen2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id='$id'");
}

function select_admin()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_admin ORDER BY id DESC");
}

function select_admin_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM tb_admin");
	$r = mysqli_fetch_array($select);
	echo $r['jadmin'];
}

function simpan_admin()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	if ($foto!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$foto;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru'");

		}
	}else if (empty($_POST['foto'])) {
		$res = mysqli_query($koneksi, "INSERT INTO tb_admin SET username='$username', password='$password', nama='$nama', kontak='$kontak'");
	}
	
}

function hapus_admin()
{
	global $koneksi;
	$id = $_POST['id'];
	$select = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE id='$id'");
	$array = mysqli_fetch_array($select);
	$foto = $array['foto'];

	if ($array['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id='$id'");
	}else{
		unlink("img/$foto");
		return mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id='$id'");
	}
}

function edit_karyawan()
{
	global $koneksi;
	$id = $_POST['id'];
	$nip = $_POST['nip'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	// unlink 
	$sql = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id='$id'");
	$r = mysqli_fetch_array($sql);

	$hapus_foto = $r['foto'];

		if(isset($_POST['ubahfoto']))
	{
		if ($r['foto']=="") 
		{
				if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, '../admin/img/karyawan/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			
		    }

			}
		}else if ($r['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, '../admin/img/karyawan/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("../admin/img/karyawan/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE tb_karyawan SET nip='$nip', username='$username', password='$password', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', kontak='$kontak' WHERE id='$id'");
	}


}

// -------------------------------------------------KEGIATAN SECTION----------------------------------------------------------------\\

function select_kegiatan()
{
	global $koneksi;
	$id  = $_SESSION['idabsen2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE id = '$id' ORDER BY kategori DESC");
}

function select_kegiatan_2()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(kategori) AS jkegiatan FROM tb_kegiatan");
	$r = mysqli_fetch_array($select);
	echo $r['jkegiatan'];

}

function simpan_kegiatan()
{
	
	global $koneksi;
	$id  = $_SESSION['idabsen2'];
	$kategori = $_POST['kategori'];
	$deskripsi = $_POST['deskripsi'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$waktu_mulai = $_POST['waktu_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$waktu_selesai = $_POST['waktu_selesai'];
	$email = $_POST['email'];
	$dokumen = $_FILES['dokumen']['name'];

	if ($dokumen!= "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $dokumen);
		$ext = strtolower(end($x));
		$file_tmp = $_FILES['dokumen']['tmp_name'];
		$angka_acak = rand(1,999);
		$nama_file_baru = $angka_acak.'-'.$dokumen;
		if (in_array($ext, $allowed_ext)===true) {
			move_uploaded_file($file_tmp, 'img/'.$nama_file_baru);
			$res = mysqli_query($koneksi, "INSERT INTO tb_kegiatan SET kategori='$kategori', deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', waktu_mulai='$waktu_mulai', tgl_selesai='$tgl_selesai', waktu_selesai='$waktu_selesai', email='$email', dokumen='$nama_file_baru', id = '$id'");

		}
	}else if (empty($_POST['dokumen'])) {
		$res = mysqli_query($koneksi, "INSERT INTO tb_kegiatan SET kategori='$kategori', deskripsi='$deskripsi', tgl_mulai='$tgl_mulai', waktu_mulai='$waktu_mulai', tgl_selesai='$tgl_selesai', waktu_selesai='$waktu_selesai', email='$email',id = '$id'");
	}
}

function hapus_kegiatan()
{
	global $koneksi;
	$id  = $_SESSION['idabsen2'];
	$kategori = $_POST['kategori'];

	// hapus dokumen
	$select = mysqli_query($koneksi, "SELECT * FROM tb_kegiatan WHERE kategori='$kategori'");
	$array = mysqli_fetch_array($select);
	$dokumen = $array['dokumen'];

	if ($array['dokumen'] == "") {
		return mysqli_query($koneksi, "DELETE FROM tb_kegiatan WHERE kategori='$kategori'");
	}else{
		unlink("img/$dokumen");
		return mysqli_query($koneksi, "DELETE FROM tb_kegiatan WHERE kategori='$kategori'");
	}
}




// ----------------------------------------FUNCTION URL, KEEP IT BELOW!!------------------------------------------------------------------
function url()
{
	return $url = "//localhost/absenKaryawan-master/assets/";

}

 ?>