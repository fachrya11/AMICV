<?php
include '../koneksi/koneksi.php';
?>

<?php 
session_start();
if(!$_SESSION['nip'] && !$_SESSION['password_nip'])
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
            if (isset($_SESSION['nip'])) {
                $nip = $_SESSION['nip'];

                // Tampilkan nama pengguna setelah teks "Data Project"
                echo '<div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Data Project</span></h1><br>
                        <label class="fw-light text-muted text-gradient"><h6>NIP Dosen : ' . $nip . '</h6></label>
                    </div>';
            } else {
                // Tidak ada pengguna yang aktif
                echo '<div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Data Project</span></h1>
                    </div>';
            }
            ?>

            <section class="py-1">
                
                <div class="container px-6">
                    <div class="bg-light rounded-4 py-5 px-4 px-md-6">
                        <div class="col-xl-12">  
                            <table id="tabel" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="idcol">No</th>
                                        <th class="ukuran_kolom">Judul</th>
                                        <th class="ukuran_kolom">Deskripsi</th>
                                        <th class="ukuran_kolom">Mata Kuliah</th>
                                        <th class="ukuran_kolom">File Pendukung</th>
                                        <th class="ukuran_kolom">Status</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = "SELECT dashboard.id_dash, judul_dash, deskripsi_dash, matkul_dash, file_dash, status_dash FROM dashboard
                                JOIN dashboard_dosen ON dashboard.id_dash=dashboard_dosen.id_dash WHERE dashboard_dosen.status_dash='menunggu' AND dashboard.nip=$nip;";
                                $result = mysqli_query($koneksi, $query);
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    
                                    <td><?php echo $row["id_dash"]; ?></td>
                                    <td><?php echo $row["judul_dash"]; ?></td>
                                    <td><?php echo $row["deskripsi_dash"]; ?></td>
                                    <td><?php echo $row["matkul_dash"]; ?></td>
                                    <td><?php echo $row["file_dash"]; ?></td>
                                    <td>
                                        <a href='process/diterima.php?id_dash=<?php echo $row["id_dash"]; ?>' class='btn btn-success'>Diterima</a>
                                        <a href='process/ditolak.php?id_dash=<?php echo $row["id_dash"]; ?>' class='btn btn-danger'>Ditolak</a>
                                    </td>
                                    
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
                </div><br>

              
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