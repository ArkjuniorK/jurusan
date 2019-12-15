<?php
include 'assets/koneksi.php';

if (isset($_GET['id'])) : 
    $id = $_GET['id'];
    $data = $koneksi->query("SELECT * FROM jurusan WHERE id = $id");
    $jurusan = $data->fetch_assoc();

?>

<!doctype html>
<html lang="en">

    <head>
        <!-- meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- bootstrap and css -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- website title -->
        <title><?= $jurusan['nama']; ?></title>
    </head>

    <body>
         <!-- header and nav -->
         <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <span class="navbar-brand" href="#">Daftar Jurusan</span>

                    <div class="ml-auto" id="navbarNav">
                        <span class="navbar-text">ArkjuniorK</span>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="jurusan-detail container mt-3">
                <div class="title-section">
                    <h2 class="detail-title"><?= $jurusan['nama'] ?></h2>
                </div>
                <div class="img-detail mt-3">
                    <img src="assets/img/<?= $jurusan['gambar'] ?>" alt="" srcset="">
                </div>
                <div class="detail-text mt-3">
                    <p><?= $jurusan['detail'] ?></p>
                </div>
            </div>
            <div class="fixed-btn-section container">
                <div class="fixed-btn py-3">
                    <a href="hapus.php?id=<?= $jurusan['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?\nAnda akan menghapus data');">Hapus</a>
                    <a href="edit.php?id=<?= $jurusan['id'] ?>" class="btn btn-secondary">Edit</a>
                    
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
    </body>
</html>

<?php endif; ?>