<?php
include '../../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_dash'])) {
    $id_dash = $_GET['id_dash'];

    // Lakukan sanitasi jika perlu
    // ...

    // Query untuk mengupdate data
    $query = "UPDATE dashboard_dosen SET status_dash='diterima' WHERE id_dash=?";

    // Buat prepared statement
    $stmt = mysqli_prepare($koneksi, $query);

    // Bind parameter ke prepared statement
    mysqli_stmt_bind_param($stmt, "i", $id_dash);

    // Eksekusi prepared statement
    mysqli_stmt_execute($stmt);

    // Cek keberhasilan eksekusi
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirect ke halaman dash_dsn1.php setelah berhasil mengedit
        header("Location: ../dash_dsn1.php");
        exit();
    } else {
        echo "Gagal mengedit data.";
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>
