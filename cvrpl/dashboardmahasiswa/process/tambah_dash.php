
<?php
session_start(); // Pastikan session telah dimulai sebelum mengakses nilai

include '../../koneksi/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai-nilai dari form
    // Menggunakan nilai nim dari session yang sudah login
    $nim_mhs = $_SESSION['nim']; // Mendapatkan nilai nim dari session

    $judul_dash = $_POST['judul_dash'];
    $deskripsi_dash = $_POST['deskripsi_dash'];
    $matkul_dash = $_POST['matkul_dash'];
    $dosen_dash = $_POST['dosen_dash'];
    $file_dash = $_POST['file_dash'];

    if($dosen_dash == 'fahri'){
        $nip = '234';
    }else{
        $nip='567';
    }
    // Query untuk menyimpan data ke tabel dashboard
    $sql = "INSERT INTO dashboard (nim_mhs, nip, judul_dash, deskripsi_dash, matkul_dash, dosen_dash, file_dash)
    VALUES ('$nim_mhs', '$nip', '$judul_dash', '$deskripsi_dash', '$matkul_dash', '$dosen_dash', '$file_dash')";

    if ($koneksi->query($sql) === TRUE) {
        $id_dashboard_terakhir = $koneksi->insert_id;

        $sql2 = "INSERT INTO dashboard_dosen (id_dash, nama_dosen, status_dash) VALUES ('$id_dashboard_terakhir', '$dosen_dash', 'menunggu')";

        if ($koneksi->query($sql2) === TRUE) {
            header("Location: ../dashboard1.php");
            exit();
        } else {
            echo "Error: " . $sql2 . "<br>" . $koneksi->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>
