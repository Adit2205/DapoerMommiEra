<?php
include "../conn.php";

// Periksa apakah data yang diperlukan telah dikirim
if(isset($_GET['id']) && isset($_GET['status'])) {
    $id_kon = $_GET['id'];
    $status = $_GET['status'];

    // Update status in the database
    $update_query = "UPDATE konfirmasi SET status = '$status' WHERE id_kon = $id_kon";
    $update_result = mysqli_query($koneksi, $update_query);

    if($update_result) {
        // Redirect back to the page where the user came from
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Failed to update status.";
    }
} else {
    echo "ID and status are required.";
}
?>
