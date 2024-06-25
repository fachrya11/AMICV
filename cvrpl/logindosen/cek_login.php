<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';
 
// menangkap data yang dikirim dari form
$nip = $_POST['nip'];
$password_nip = $_POST['password_nip'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from nip_dsn where nip='$nip' and password_nip='$password_nip'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['nip'] = $nip;
	$_SESSION['status'] = "login";
	header("location:../dashboarddosen/dash_dsn1.php");
}else{
	echo '<script>alert("Masukan NIP dan Password dengan Benar !!!");
                        window.location.href="logindsn.php"</script>';
}
?>