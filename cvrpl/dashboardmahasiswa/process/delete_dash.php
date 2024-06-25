
<?php
include '../../koneksi/koneksi.php';

if(isset($_GET['id_dash'])) {
    $id_dash = $_GET['id_dash'];

    // Query untuk menghapus data berdasarkan id_dash
    $query = "DELETE FROM dashboard WHERE id_dash = '$id_dash'";
    $result = mysqli_query($koneksi, $query);

    if($result) {
        // Jika penghapusan berhasil, redirect ke halaman tertentu
        header("Location: ../dashboard1.php");
        exit;
    } else {
        // Jika gagal menghapus, lakukan sesuatu (misalnya tampilkan pesan error)
        echo "Gagal menghapus data.";
    }
} else {
    // Jika parameter id_dash tidak ditemukan, lakukan sesuatu (misalnya kembali ke halaman sebelumnya)
    echo "ID tidak ditemukan.";
}

mysqli_close($koneksi);
?>
