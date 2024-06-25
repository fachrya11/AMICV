<?php
include '../koneksi/koneksi.php';
?>

<?php 
session_start();
if(!$_SESSION['nim'] && !$_SESSION['password_nim'])
{
    echo "
		<script type='text/javascript'>
		alert('Anda harus login terlebih dahulu!')
		window.location='../index.php';
		</script>";
}
else
{
    
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AMICV</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            .text-gradient1 {
                opacity: 0.5; /* Mengatur opasitas menjadi 50% */
            }
            .ukuran_kolom{
                width: 12%;
            }
            .aksisi { 
                width: 17%; 
            }

            .idcol { 
                width: 1%; 
            }

                        /* Gaya untuk modal */
            .modal-content {
                background-color: #ffffff; /* Warna latar belakang */
                border-radius: 10px; /* Sudut elemen */
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1); /* Bayangan */
            }

            .modal-header {
                background-color: #f8f9fa; /* Warna latar belakang header */
                border-bottom: none; /* Hapus garis bawah */
                border-radius: 10px 10px 0 0; /* Sudut header */
            }

            .modal-title {
                color: #333333; /* Warna teks judul */
            }

            .modal-body {
                padding: 20px; /* Jarak antara konten dan batas modal */
            }

            /* Gaya untuk tombol tutup modal */
            .close {
                color: #333333; /* Warna ikon tutup */
            }

            /* Gaya untuk input fields */
            .modal-body input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ced4da; /* Garis batas input */
                border-radius: 5px; /* Sudut input */
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            /* Gaya untuk tombol 'Simpan Perubahan' */
            .modal-body button[type="submit"] {
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                background-color: #007bff; /* Warna latar belakang tombol */
                color: #ffffff; /* Warna teks tombol */
                transition: background-color 0.3s ease-in-out;
            }

            /* Efek hover pada tombol 'Simpan Perubahan' */
            .modal-body button[type="submit"]:hover {
                background-color: #0056b3; /* Warna latar belakang saat hover */
            }

        </style>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand"><span class="fw-bolder text-primary">AMI CV</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <a class="btn btn-outline-danger" href="../logout/logout.php">Log Out</a>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <?php
            // Pastikan pengguna telah login dan data pengguna tersedia di sesi
            if (isset($_SESSION['nim'])) {
                $nim = $_SESSION['nim'];

                // Tampilkan nama pengguna setelah teks "Data Project"
                echo '<div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Data Project</span></h1><br>
                        <label class="fw-light text-muted text-gradient"><h6>NIM Mahasiswa : ' . $nim . '</h6></label>
                    </div>';
            } else {
                // Tidak ada pengguna yang aktif
                echo '<div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Data Project</span></h1>
                    </div>';
            }
            ?>

           
            
            <div class="d-flex justify-content-center fs-2">
                <a class="text-gradient" href="dashboard1.php" style="margin-right: 60px; margin-left: 60px;"><i class="bi bi-file-earmark-text-fill"></i></a>
                <a class="text-gradient  text-gradient1" href="dashboard2.php" style="margin-right: 60px;margin-left: 60px;"><i class="bi bi-send-plus-fill"></i></a>
             </div>
            <div class="container">
                <label class="fw-light text-muted text-gradient"style="margin-right: 63px; margin-left: 464px;"><h6>Data</h6></label>
                <label class="fw-light text-muted text-gradient  text-gradient1"style="margin-right: 30px; margin-left: 30px;"><h6>Pengajuan</h6></label>
            </div>

            <section class="py-5">
                <div class="container px-6">
                    <div class="bg-light rounded-4 py-5 px-4 px-md-6">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6">
                                    <label class="fw-light text-muted text-dark"><h6>Data Project yang diterima</h6></label>
                                </div>
                                <div class="col-xl-6 text-end">
                                    <!-- <a href="?download_pdf=true" class="btn btn-success">Download PDF</a> -->
                                </div>
                            </div><br>  
                                <table id="tabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="idcol">No</th>
                                            <th class="ukuran_kolom">Judul</th>
                                            <th class="ukuran_kolom">Deskripsi</th>
                                            <th class="ukuran_kolom">Mata Kuliah</th>
                                            <th class="ukuran_kolom">Dosen</th>
                                            <th class="ukuran_kolom">File Pendukung</th>
                                            <th class="ukuran_kolom">Status</th>
                                            <th class="aksisi">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT dashboard.id_dash, judul_dash, deskripsi_dash, matkul_dash, dosen_dash, file_dash, status_dash FROM dashboard
                                    JOIN dashboard_dosen ON dashboard.id_dash=dashboard_dosen.id_dash WHERE dashboard_dosen.status_dash='diterima' AND dashboard.nim_mhs=$nim;";
                                    $result = mysqli_query($koneksi, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $row["id_dash"]; ?></td>
                                        <td><?php echo $row["judul_dash"]; ?></td>
                                        <td><?php echo $row["deskripsi_dash"]; ?></td>
                                        <td><?php echo $row["matkul_dash"]; ?></td>
                                        <td><?php echo $row["dosen_dash"]; ?></td>
                                        <td><?php echo $row["file_dash"]; ?></td>
                                        <td><?php echo $row["status_dash"]; ?></td>
                                        <td>
                                            <a href='#' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal<?php echo $row["id_dash"]; ?>'>Update</a>

                                            <a href='process/delete_dash.php?id_dash=<?php echo $row["id_dash"]; ?>' class='btn btn-danger'>Delete</a>
                                        </td>
                                        <!-- Tambahkan kolom lainnya -->

                                        <!-- Modal untuk setiap data -->
                                        <?php
                                        $id_dash = $row["id_dash"];
                                        $judul_dash = $row["judul_dash"];
                                        $deskripsi_dash = $row["deskripsi_dash"];
                                        $matkul_dash = $row["matkul_dash"];
                                        $dosen_dash = $row["dosen_dash"];
                                        $file_dash = $row["file_dash"];
                                        $status_dash = $row["status_dash"];
                                        ?>
                                        
                                        <div class='modal fade' id='editModal<?php echo $id_dash; ?>' tabindex='-1' role='dialog' aria-labelledby='editModalLabel<?php echo $id_dash; ?>' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='editModalLabel<?php echo $id_dash; ?>'>Edit Data</h5>
                                                        <a href='dashboard1.php' class='btn btn-warning'>kembali</a>
                                        
                                                    </div>
                                                    <div class='modal-body'>
                                                        <!-- Form untuk mengedit data -->
                                                        <form action='process/edit_dash.php' method='POST' enctype="multipart/form-data">
                                                            <input type='hidden' name='id_dash' value='<?php echo $id_dash; ?>'>
                                                            <!-- Isi dengan input fields yang diperlukan untuk mengedit data -->
                                                            
                                                            <label>Deskripsi</label>
                                                            <input type='text' name='deskripsi_dash' value='<?php echo $deskripsi_dash; ?>'>

                                                            <label>File</label>
                                                            <input type='text' name='file_dash' value='<?php echo $file_dash; ?>'>

                                                            
                                                            

                                                            <!-- Tambahkan input fields lainnya sesuai kebutuhan -->
                                                            
                                                            <button type='submit' class='btn btn-primary'>Simpan Perubahan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php
                                    }
                                    
                                    ?>

                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div><br>

                <div class="container px-6">
                    <div class="bg-light rounded-4 py-5 px-4 px-md-6">
                        <div class="col-xl-12">
                        <label class="fw-light text-muted text-dark"><h6>Data Project yang ditolak</h6></label>        
                                <table id="tabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="idcol">No</th>
                                            <th class="ukuran_kolom">Judul</th>
                                            <th class="ukuran_kolom">Deskripsi</th>
                                            <th class="ukuran_kolom">Mata Kuliah</th>
                                            <th class="ukuran_kolom">Dosen</th>
                                            <th class="ukuran_kolom">File Pendukung</th>
                                            <th class="ukuran_kolom">Status</th>
                                            <th class="aksisi">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT dashboard.id_dash, judul_dash, deskripsi_dash, matkul_dash, dosen_dash, file_dash, status_dash FROM dashboard
                                    JOIN dashboard_dosen ON dashboard.id_dash=dashboard_dosen.id_dash WHERE dashboard_dosen.status_dash='ditolak' AND dashboard.nim_mhs=$nim;";
                                    $result = mysqli_query($koneksi, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $row["id_dash"]; ?></td>
                                        <td><?php echo $row["judul_dash"]; ?></td>
                                        <td><?php echo $row["deskripsi_dash"]; ?></td>
                                        <td><?php echo $row["matkul_dash"]; ?></td>
                                        <td><?php echo $row["dosen_dash"]; ?></td>
                                        <td><?php echo $row["file_dash"]; ?></td>
                                        <td><?php echo $row["status_dash"]; ?></td>
                                        <td>
                                            <a href='process/delete_dash.php?id_dash=<?php echo $row["id_dash"]; ?>' class='btn btn-danger'>Delete</a>
                                        </td>
                                        <!-- Tambahkan kolom lainnya -->
                                    </tr>
                                    <?php
                                    }
                                    
                                    ?>

                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div><br>


                <div class="container px-6">
                    <div class="bg-light rounded-4 py-5 px-4 px-md-6">
                        <div class="col-xl-12">
                        <label class="fw-light text-muted text-dark"><h6>Data Project yang menunggu acc dosen</h6></label>        
                                <table id="tabel" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="idcol">No</th>
                                            <th class="ukuran_kolom">Judul</th>
                                            <th class="ukuran_kolom">Deskripsi</th>
                                            <th class="ukuran_kolom">Mata Kuliah</th>
                                            <th class="ukuran_kolom">Dosen</th>
                                            <th class="ukuran_kolom">File Pendukung</th>
                                            <th class="ukuran_kolom">Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $query = "SELECT dashboard.id_dash, judul_dash, deskripsi_dash, matkul_dash, dosen_dash, file_dash, status_dash FROM dashboard
                                    JOIN dashboard_dosen ON dashboard.id_dash=dashboard_dosen.id_dash WHERE dashboard_dosen.status_dash='menunggu' AND dashboard.nim_mhs=$nim;";
                                    $result = mysqli_query($koneksi, $query);
                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        
                                        <td><?php echo $row["id_dash"]; ?></td>
                                        <td><?php echo $row["judul_dash"]; ?></td>
                                        <td><?php echo $row["deskripsi_dash"]; ?></td>
                                        <td><?php echo $row["matkul_dash"]; ?></td>
                                        <td><?php echo $row["dosen_dash"]; ?></td>
                                        <td><?php echo $row["file_dash"]; ?></td>
                                        <td><?php echo $row["status_dash"]; ?></td>
                                        
                                        <!-- Tambahkan kolom lainnya -->
                                    </tr>
                                    <?php
                                    }
                                    mysqli_free_result($result); // Bebaskan memori hasil query
                                    mysqli_close($koneksi);
                                    ?>

                                    </tbody>
                                </table>
                            </div>                    
                        </div>
                    </div>
                </div><br>

                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                    <a class="btn btn-outline-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="dashboard2.php">Tambah Data</a>
                </div>
            </section> 
            
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="col-auto text-center"><div class="small m-0">Copyright &copy; Kelompok RPL</div></div>
            </div>
        </footer>
        <!-- Pastikan Bootstrap JavaScript dipanggil -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Pastikan Bootstrap JavaScript dipanggil -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>