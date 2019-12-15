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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Daftar Film Box Office</title>
</head>
<body>
    <!-- header and nav -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <span class="navbar-brand" href="#">Jurusan Populer</span>

                <div class="ml-auto" id="navbarNav">
                    <span class="navbar-text">ArkjuniorK</span>
                </div>
            </div>
        </nav>
    </header>
    <!-- main (edit and add form) -->
    <main>
        <div class="form-section mt-3 container">
            <div class="title-section mb-3">
                <h2>Edit Jurusan <?= $jurusan['nama'] ?></h2>
            </div>
            <div class="form-input-section ">
                <form method="POST" action="proses.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $jurusan['id']; ?>">
                    <div class="form-group nama-section">
                        <label for="nama">Nama Jurusan</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Jurusan" value="<?= $jurusan['nama']; ?>">
                    </div>
                    <div class="form-group deskripsi-section">
                        <label for="detail">Deskripsi Jurusan</label>
                        <textarea name="detail" class="form-control" id="exampleFormControlTextarea1" rows="5"><?= $jurusan['detail']; ?></textarea>
                    </div>
                    <div class="form-group gambar-section">
                        <label for="gambar">Gambar</label>
                        
                        <div class="custom-file">
                            <input name="gambar" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Gambar</label>
                        </div>
                        <div class="img-preview mt-3">
                            <img src="assets/img/<?= $jurusan['gambar']; ?>">
                        </div>
                    </div>
                    <div class="button-section mb-3">
                        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

<?php endif; ?>