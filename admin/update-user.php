<?php
include "../conn.php";
$kd_cus       = $_POST['kd_cus'];
$nama     = $_POST['nama'];
$alamat      = $_POST['alamat'];
$no_telp      = $_POST['no_telp'];
$username      = $_POST['username'];
$password      = $_POST['password'];

$query = mysqli_query($koneksi, "UPDATE customer SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password' WHERE kd_cus='$kd_cus'")or die(mysql_error());
if ($query){
header('location:customer.php');	
} else {
	echo "gagal";
    }
?>