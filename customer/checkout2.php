<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');    
} else {
    include "../conn.php";
}
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php";?>
<body>
    
    <?php include "header.php"; ?>
    
    <!-- start: Page Title -->
    <div id="page-title">

        <div id="page-title-inner">

            <!-- start: Container -->
            <div class="container">

                <h2><i class="ico-usd ico-white"></i>Cart</h2>

            </div>
            <!-- end: Container  -->

        </div>  

    </div>
    <!-- end: Page Title -->
    
    <!--start: Wrapper-->
    <div id="wrapper">
                
        <!-- start: Container -->
        <div class="container">

<?php
    if(isset($_POST['submit'])){
        $bayar_via = $_POST['bayar_via'];
        $total = $_POST['total'];
        $tanggal = date("Y-m-d H:i:s");
        $nopo = uniqid();

        // Ambil data produk dari keranjang belanja
        $query_cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE session='$_SESSION[user_id]'");
        while ($row_cart = mysqli_fetch_assoc($query_cart)) {
            $kode = $row_cart['kode'];
            $qty = $row_cart['qty'];

            // Insert data ke tabel po_terima
            $input = mysqli_query($koneksi, "INSERT INTO po_terima(nopo, kd_cus, kode, tanggal, qty, total) VALUES ('$nopo', '$_SESSION[user_id]', '$kode', '$tanggal', '$qty', '$total')") or die(mysqli_error());
        }

        $query1 = mysqli_query($koneksi, "INSERT INTO konfirmasi (nopo, kd_cus, kode, bayar_via, tanggal, jumlah, status) VALUES ('$nopo', '$_SESSION[user_id]', '$kode' ,'$bayar_via', '$tanggal', '$total', 'Belum')") or die(mysqli_error());

        if ($query1 and $input) {
            $delete = mysqli_query($koneksi, "DELETE FROM cart WHERE session='$_SESSION[user_id]'"); 
            echo "<script>alert('Checkout Sukses, silahkan lakukan pembayaran.'); window.location = 'index1.php'</script>";
        } else {
            echo "<script>alert('Checkout Gagal !'); window.location = 'index.php'</script>";
        }
    }

    // Ambil data dari tabel cart
    $query_cart = mysqli_query($koneksi, "SELECT * FROM cart WHERE session='$_SESSION[user_id]'");
    $total = 0; // Variabel untuk menyimpan total pembayaran

    // Cek apakah ada barang di keranjang
   if (mysqli_num_rows($query_cart) > 0) {
    ?>
    <h2>Detail Pemesanan</h2>
    <table border="1" cellpadding="5" cellspacing="0" style="width: 100%; font-size: 16px; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px;">No</th>
                <th style="padding: 10px;">Kode Produk</th>
                <th style="padding: 10px;">Nama Produk</th>
                <th style="padding: 10px;">Harga</th>
                <th style="padding: 10px;">Qty</th>
                <th style="padding: 10px;">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0; // Inisialisasi total
            while ($row_cart = mysqli_fetch_assoc($query_cart)) {
                // Hitung subtotal untuk setiap produk
                $subtotal = $row_cart['harga'] * $row_cart['qty'];
                $total += $subtotal; // Tambahkan subtotal ke total pembayaran
                ?>
                <tr>
                    <td style="padding: 10px;"><?php echo $no++; ?></td>
                    <td style="padding: 10px;"><?php echo $row_cart['kode']; ?></td>
                    <td style="padding: 10px;"><?php echo $row_cart['nama']; ?></td>
                    <td style="padding: 10px;">Rp. <?php echo number_format($row_cart['harga'], 0, ',', '.'); ?></td>
                    <td style="padding: 10px;"><?php echo $row_cart['qty']; ?></td>
                    <td style="padding: 10px;">Rp. <?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="5" style="text-align: right; padding: 10px;"><strong>Total Pembayaran:</strong></td>
                <td style="padding: 10px;"><strong>Rp. <?php echo number_format($total, 0, ',', '.'); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <!-- Form untuk memilih jenis pembayaran -->
    <form method="post">
        <label for="bayar_via">Pilih Metode Pembayaran:</label>
        <select name="bayar_via" id="bayar_via">
            <option value="Transfer Bank">Transfer Bank</option>
            <!-- Tambahkan jenis pembayaran lainnya sesuai kebutuhan -->
        </select>
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <input type="submit" name="submit" value="Checkout" style="display: block; margin: 50 auto;">

    </form>
    <?php
} else {
    echo '<p>Keranjang belanja Anda kosong.</p>';
}
?>


</table>
            
                
            <!-- end: Table -->

        </div>
        <!-- end: Container -->
                
    </div>
    <!-- end: Wrapper  -->          

    <!-- start: Footer Menu -->
    <div id="footer-menu" class="hidden-tablet hidden-phone">

        <!-- start: Container -->
        <div class="container">
            
            <!-- start: Row -->
            <div class="row">

                <!-- start: Footer Menu Logo -->
                <div class="span2">
                    <div id="footer-menu-logo">
                        <a href="#"><img src="../img/logodapoer.png" alt="logo" /></a>
                    </div>
                </div>
                <!-- end: Footer Menu Logo -->

                <!-- start: Footer Menu Links-->
                <div class="span9">
                    
                    <div id="footer-menu-links">

                        <ul id="footer-nav">

                            <li><a href="#">Delivery Max 10 KM</a></li>

                            <li><a href="#">Pembayaran via online</a></li>

                            <li><a href="#">Pelayanan Cepat</a></li>

                        </ul>

                    </div>
                    
                </div>
                <!-- end: Footer Menu Links-->

                <!-- start: Footer Menu Back To Top -->
                <div class="span1">
                        
                    <div id="footer-menu-back-to-top">
                        <a href="#"></a>
                    </div>
                
                </div>
                <!-- end: Footer Menu Back To Top -->
            
            </div>
            <!-- end: Row -->
            
        </div>
        <!-- end: Container  -->    

    </div>  
    <!-- end: Footer Menu -->

    <?php include "footer.php"; ?>
<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../js/jquery-1.8.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/flexslider.js"></script>
<script src="../js/carousel.js"></script>
<script src="../js/jquery.cslider.js"></script>
<script src="../js/slider.js"></script>
<script defer="defer" src="../js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>
