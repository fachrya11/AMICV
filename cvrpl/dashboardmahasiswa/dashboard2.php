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

        <style>
            .text-gradient1 {
                opacity: 0.5; /* Mengatur opasitas menjadi 50% */
            }
            form {
                max-width: 900px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            /* Form field styling */
            .form-control {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px;
            }

            textarea {
                resize: vertical;
                min-height: 100px;
            }

            /* Submit button styling */
            button[type="submit"] {
                background-color: #007bff;
                color: #fff;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
                transition: background-color 0.3s;
            }
            button[type="submit"]:hover {
                background-color: #0056b3;
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
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Pengajuan Project</span></h1><br>
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
                <a class="text-gradient  text-gradient1" href="dashboard1.php" style="margin-right: 60px; margin-left: 60px;"><i class="bi bi-file-earmark-text-fill"></i></a>
                <a class="text-gradient" href="dashboard2.php" style="margin-right: 60px;margin-left: 60px;"><i class="bi bi-send-plus-fill"></i></a>
             </div>
            <div class="container">
                <label class="fw-light text-muted text-gradient  text-gradient1"style="margin-right: 63px; margin-left: 464px;"><h6>Data</h6></label>
                <label class="fw-light text-muted text-gradient"style="margin-right: 30px; margin-left: 30px;"><h6>Pengajuan</h6></label>
            </div>

            <section class="py-5">
            <div class="container px-6">
                    <div class="bg-light rounded-4 py-5 px-4 px-md-6">
                        <div class="col-xl-12">
                        
                                <form method="post" action="process/tambah_dash.php" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <h6 for="judul_dash">Judul:</h6>
                                        <input class="form-control" type="text" id="judul_dash" name="judul_dash" required>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="deskripsi_dash">Deskripsi:</h6>
                                        <textarea class="form-control" id="deskripsi_dash" name="deskripsi_dash" rows="5" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="matkul_dash">Mata Kuliah:</h6>
                                        <select class="form-control" id="matkul_dash" name="matkul_dash" required>
                                            <option value="" disabled selected>Pilih Mata Kuliah</option>
                                            <option value="rpl">Rekayasa Perangkat Lunak</option>
                                            <option value="big data">Big Data dan Data Mining</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="dosen_dash">Dosen:</h6>
                                        <select class="form-control" id="dosen_dash" name="dosen_dash" required>
                                            <option value="" disabled selected>Pilih Dosen</option>
                                            <option value="fahri">Fahri</option>
                                            <option value="andre">Andre</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <h6 for="file_dash">File Pendukung:</h6>
                                        <input class="form-control" type="text" id="file_dash" name="file_dash" required>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-outline-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" type="submit" name="submit">Ajukan Kepada Dosen</button><br>
                                        <a href='dashboard1.php' class="text-gradient1" style="text-decoration:none; display: block; text-align: center;">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
            
        </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="col-auto text-center"><div class="small m-0">Copyright &copy; Kelompok RPL</div></div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>