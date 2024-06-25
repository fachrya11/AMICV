<?php
// Di dalam edit_dash.php
include '../../koneksi/koneksi.php';
// Lakukan koneksi ke database disini

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_dash = $_POST['id_dash'];
    $deskripsi_dash = $_POST['deskripsi_dash'];
    $file_dash = $_POST['file_dash'];
    // Ambil nilai dari input fields lainnya

    // Lakukan query untuk mengupdate data
    $query = "UPDATE dashboard SET deskripsi_dash='$deskripsi_dash',file_dash='$file_dash' WHERE id_dash=$id_dash";
    // Lakukan query untuk update data lainnya jika ada

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect ke halaman setelah berhasil mengedit
        header("Location: ../dashboard1.php");
        exit();
    } else {
        echo "Gagal mengedit data.";
    }
}
?>
