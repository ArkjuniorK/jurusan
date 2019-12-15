<?php 
include 'assets/koneksi.php';

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];
    $gambar = $_FILES['gambar']['name'];

    if (isset($_FILES['gambar'])) {
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $ukuran = $_FILES['gambar']['size'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $ekstensi_gambar = ['png', 'jpg', 'jpeg'];
        if (in_array($ekstensi, $ekstensi_gambar) == true) {
            move_uploaded_file($tmp, 'assets/img/' . $gambar);
            $sql = "INSERT INTO jurusan (nama, detail, gambar) VALUES ('$nama', '$detail', '$gambar')";
            if (mysqli_query($koneksi, $sql)) {
                header('Location: index.php');
            } else {
                echo "error";
                mysqli_errno($koneksi);
            }
        }
    }
} elseif (isset($_POST['edit'])) {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];

    if ($_FILES['gambar']['error'] === 3) {
        $gambar = $_POST['gambarLama'];
    }
    else {
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $temp = $_FILES['gambar']['tmp_name'];
        $ekstensi_gambar = ['png', 'jpg', 'jpeg'];
        if (in_array($ekstensi, $ekstensi_gambar) == true) {
            move_uploaded_file($temp, 'assets/img/' . $gambar);
            unlink('assets/img/' . $_POST["gambarLama"]);
        }
    }

    $query = "UPDATE jurusan SET nama = '$nama', detail = '$detail', gambar = '$gambar' WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        header('Location: index.php');
    } else {
        echo "error";
        mysqli_errno($koneksi);
    }
} else {
    // header('Location: index.php');
    echo "error gan";
}
