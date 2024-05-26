<?php
include "../conn.php";
if(isset($_POST['update'])){
    $kode     = $_POST['kd_cust'];
    $nama     = $_POST['nama'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $username = $_POST['username'];
    $password = $_POST['password'];
        
    // Memeriksa apakah ada file yang diunggah
    if (!empty($_FILES["nama_file"]["tmp_name"])) {
        $namafolder="../admin/gambar_customer/.."; //tempat menyimpan file
        $jenis_gambar=$_FILES['nama_file']['type'];
        
        if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png") {            
            $gambar = $namafolder . basename($_FILES['nama_file']['name']);        
            if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
                $sql="UPDATE customer SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password', gambar='$gambar' WHERE kd_cus='$kode'" or die(mysqli_error());
                $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
                //echo "Gambar berhasil dikirim ke direktori".$gambar;
                echo "<script>alert('Data Customer berhasil diupdate!'); window.location = 'index.php'</script>";       
            } else {
                echo "<p>Gambar gagal dikirim</p>";
            }
        } else {
            echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
        }
    } else {
        // Jika tidak ada file yang diunggah, tetapkan nilai gambar ke gambar yang ada dalam database
        $sql="UPDATE customer SET nama='$nama', alamat='$alamat', no_telp='$no_telp', username='$username', password='$password' WHERE kd_cus='$kode'" or die(mysqli_error());
        $res=mysqli_query($koneksi, $sql) or die (mysqli_error());
        echo "<script>alert('Data Customer berhasil diupdate!'); window.location = 'index.php'</script>"; 
    }
} else {
    echo "Anda belum memilih gambar";
}
?>
