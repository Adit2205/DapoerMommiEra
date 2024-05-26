<?php
include "../conn.php";
if(isset($_POST['update'])){
    $namafolder="../admin/gambar_admin/"; //tempat menyimpan file

    $id_kon     = $_POST['id_kon'];
    $nopo       = $_POST['nopo'];
    $kd_cus     = $_POST['kd_cus'];
    $bayar_via  = $_POST['bayar_via'];
    $tanggal    = $_POST['tanggal'];
    $jumlah     = $_POST['jumlah'];

    // Jika pembayaran melalui COD, tidak perlu upload bukti
    if ($bayar_via == 'Cash On Delivery (COD)') {
        $sql="UPDATE konfirmasi SET bayar_via='$bayar_via', tanggal='$tanggal', jumlah='$jumlah', status='Proses' WHERE id_kon='$id_kon'";
        $res=mysqli_query($koneksi, $sql);
        if($res) {
            echo "<script>alert('Data Konfirmasi berhasil diupdate!'); window.location = 'index1.php'</script>";
        } else {
            echo "<p>Data gagal diupdate</p>";
        }  
    } else {
        // Jika bukan COD, perlu upload bukti
        if (!empty($_FILES["nama_file"]["tmp_name"]))
        {
            $jenis_gambar=$_FILES['nama_file']['type'];
            
            if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
            {           
                $gambar = $namafolder . basename($_FILES['nama_file']['name']);      
                if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
                    $sql="UPDATE konfirmasi SET bayar_via='$bayar_via', tanggal='$tanggal', jumlah='$jumlah', bukti_transfer='$gambar', status='Proses' WHERE id_kon='$id_kon'";
                    $res=mysqli_query($koneksi, $sql);
                    if($res) {
                        echo "<script>alert('Data Konfirmasi berhasil diupdate!'); window.location = 'index1.php'</script>";
                    } else {
                        echo "<p>Data gagal diupdate</p>";
                    }       
                } else {
                    echo "<p>Gambar gagal dikirim</p>";
                }
            } else {
                echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
            }
        } else {
            echo "Anda belum memilih gambar";
        }
    }
}
?>
