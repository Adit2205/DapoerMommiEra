<?php
include "../conn.php";
$nopo       = $_POST['nopo'];
$tanggalkirim     = $_POST['tanggalkirim'];
$status     = $_POST['status'];

$query = mysqli_query($koneksi, "UPDATE po SET tanggalkirim='$tanggalkirim' , status='$status' WHERE nopo='$nopo'")or die(mysql_error());
if ($query){
header('location:status_pengiriman.php');    
} else {
    echo "gagal";
    }
?>