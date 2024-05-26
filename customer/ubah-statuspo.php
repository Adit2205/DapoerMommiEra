<?php
include '../conn.php'; // Pastikan file koneksi terhubung

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nopo = $_POST['nopo'];

  // Update status di database
  $query = "UPDATE po SET status='Selesai' WHERE nopo='$nopo'";
  if (mysqli_query($koneksi, $query)) {
    $response = array('success' => true);
  } else {
    $response = array('success' => false, 'error' => mysqli_error($koneksi));
  }

  // Mengirim respons dalam format JSON
  header('status-po.php');
  echo json_encode($response);
}
?>
