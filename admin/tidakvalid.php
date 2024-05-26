<?php
include "../conn.php";
// update_status.php

// Lakukan koneksi ke database

if(isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    // Lakukan sanitasi input
    $id = mysqli_real_escape_string($koneksi, $id);
    $status = mysqli_real_escape_string($koneksi, $status);

    // Lakukan query untuk mengupdate status
    $query_update = "UPDATE konfirmasi SET status='$status' WHERE id_kon='$id'";
    $hasil_update = mysqli_query($koneksi, $query_update);

    if($hasil_update) {
        // Redirect ke halaman sebelumnya atau halaman sukses
        header("Location: konfirmasi_pembayaran.php"); // Ganti previous_page.php dengan halaman yang sesuai
        exit();
    } else {
        // Jika gagal update, tampilkan pesan error atau kembali ke halaman sebelumnya
        echo "Gagal melakukan update status.";
    }
} else {
    // Jika id atau status tidak tersedia, kembali ke halaman sebelumnya
    header("Location: konfirmasi_pembayaran.php"); // Ganti previous_page.php dengan halaman yang sesuai
    exit();
}
?>
