<?php 
include 'assets/koneksi.php'; ?>

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
        <title>Daftar Jurusan Populer</title>
    </head>
    <body>
        <!-- header and nav -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <span class="navbar-brand" href="#">Jurusan Populer</span>

                    <div class="ml-auto" id="navbarNav">
                        <form action="" class="form-inline">
                            <a class="btn btn-dark" data-toggle="modal" href="tambah.php">Tambah Data</a>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!-- main and looping from db -->
        <main>
            <div class="jurusan-list-parent container pt-3">
                <div class="title-section mb-4">
                    <h2>Daftar Jurusan Populer</h2>
                </div>
                <div class="jurusan-list-child">
                    <?php 
                    $data = $koneksi->query("SELECT * FROM jurusan"); ?>

                    <div class="grid-display-card">
                        <?php 
                            while ($jurusan = $data->fetch_assoc()) : ?>
                        <div class="grid-display-card-child">
                            <div class="card-button">
                                <a href="detail.php?id=<?= $jurusan['id'] ?>">
                                <div class="text-preview ml-2">
                                    <h5> <?= $jurusan["nama"]; ?></h5>
                                </div>
                                <div class="img-bg">
                                    <div class="color-overlay"></div>
                                    <img src="assets/img/<?= $jurusan['gambar']; ?> " alt="" srcset="">
                                </div>
                                </a>
                            </div>
                        </div>
                        <?php 
                        endwhile; ?>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>