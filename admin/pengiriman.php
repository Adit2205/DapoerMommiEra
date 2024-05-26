<?php
// Koneksi ke database
include '../conn.php';

// Ambil data dari URL
$id_kon = $_GET['id'];
$status = $_GET['status'];

// Update status di tabel konfirmasi
$query_update = "UPDATE konfirmasi SET status='$status' WHERE id_kon='$id_kon'";
mysqli_query($koneksi, $query_update) or die(mysqli_error());

// Jika status menjadi 'Bayar', simpan 'nopo', 'kd_cus', dan 'kode_produk' di tabel po
if ($status == 'Bayar') {
    $query_select_data = "SELECT nopo, kd_cus, kode FROM konfirmasi WHERE id_kon='$id_kon'";
    $result = mysqli_query($koneksi, $query_select_data);
    $row = mysqli_fetch_assoc($result);
    $nopo = $row['nopo'];
    $kd_cus = $row['kd_cus'];
    $kode = $row['kode'];

    // Simpan data ke dalam tabel po
    $query_insert_po = "INSERT INTO po (nopo, kd_cus, kode) VALUES ('$nopo', '$kd_cus', '$kode')";
    mysqli_query($koneksi, $query_insert_po) or die(mysqli_error());
}

// Redirect ke halaman sebelumnya
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
?>
