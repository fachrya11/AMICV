<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';
 
// menangkap data yang dikirim dari form
$nim = $_POST['nim'];
$password_nim = $_POST['password_nim'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from nim_mhs where nim='$nim' and password_nim='$password_nim'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['nim'] = $nim;
	$_SESSION['status'] = "login";
	header("location:../dashboardmahasiswa/dashboard1.php");
}else{
	echo '<script>alert("Masukan NIM dan Password dengan Benar !!!");
                        window.location.href="loginmhs.php"</script>';
}
?>