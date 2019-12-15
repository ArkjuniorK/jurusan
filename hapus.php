<?php 
include 'assets/koneksi.php';

if(isset($_GET['id'])) : $id = $_GET['id'];

$query = $koneksi->query("SELECT * FROM jurusan WHERE id = $id");
$img = $query->fetch_assoc();

$sql = "DELETE FROM jurusan WHERE id = $id";
if (mysqli_query($koneksi, $sql)) {
    unlink('assets/img/' . $img['gambar']);
    header('Location: index.php');
}

endif; 