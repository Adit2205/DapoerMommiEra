<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Customer</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Customer
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    
                                    </p>
                                </li>
                                <?php
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.php"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
                                <!-- Menu Body -->
                                <?php // include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-customer.php?hal=edit&kd_cus=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Customer
                        <small>Detail Status</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Customer</a></li>
                        <li class="active">Detail status</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Status PO </h3> 
                        </div>
                   <?php
$kodeku = $_SESSION['user_id'];
$query1 = "SELECT po.*, customer.nama AS nama_pelanggan, customer.alamat AS alamat_pelanggan, customer.no_telp AS no_telp_pelanggan, produk.nama AS nama_produk, SUM(konfirmasi.jumlah) AS total_jumlah
           FROM po 
           INNER JOIN customer ON po.kd_cus = customer.kd_cus 
           INNER JOIN produk ON po.kode = produk.kode 
           INNER JOIN konfirmasi ON po.nopo = konfirmasi.nopo
           WHERE po.kd_cus = $kodeku
           GROUP BY po.nopo";
$hasil2 = mysqli_query($koneksi, $query1) or die(mysqli_error());
?>

<table id="example" class="table table-hover table-bordered">
  <thead>
    <tr>
      <th><center>No</center></th>
      <th><center>No Resi</center></th>
      <th><center>Nama Customer</center></th>
      <th><center>Alamat</center></th>
      <th><center>No. Telepon</center></th>
      <th><center>Nama Produk</center></th>
      <th><center>Total Harga</center></th>
      <th><center>Tanggal</center></th>
      <th><center>Status</center></th>
      <th><center>Aksi</center></th>
    </tr>
  </thead>
  <tbody>
   <?php 
    $no = 1; // Inisialisasi variabel nomor urut
    while($data2 = mysqli_fetch_array($hasil2)) { 
      if ($data2['status'] == 'Proses' || $data2['status'] == 'Dikirim' || $data2['status'] == 'Selesai') { ?>
        <tr>
          <td><center><?php echo $no; ?></center></td> <!-- Kolom nomor urut -->
          <td><center><?php echo $data2['nopo']; ?></center></td>
          <td><center><?php echo $data2['nama_pelanggan']; ?></center></td>
          <td><center><?php echo $data2['alamat_pelanggan']; ?></center></td>
          <td><center><?php echo $data2['no_telp_pelanggan']; ?></center></td>
          <td><center><?php echo $data2['nama_produk']; ?></center></td>
          <td><center><?php echo $data2['total_jumlah']; ?></center></td>
          <td><center><?php echo $data2['tanggalkirim']; ?></center></td>
          <td id="statusCell_<?php echo $data2['nopo']; ?>"><center>
            <?php
            if ($data2['status'] == 'Selesai') {
              echo '<span class="label label-success">Sudah diterima</span>';
            } else if ($data2['status'] == 'Dikirim') {
              echo '<span class="label label-danger">Sedang dikirim</span>';
            } else if ($data2['status'] == 'Proses') {
              echo '<span class="label label-warning">Sedang diproses</span>';
            }
            ?>
          
          <td><center>
            <?php if ($data2['status'] != 'Selesai') { ?>
              <button class="btn btn-sm btn-success" onclick="updateStatus('<?php echo $data2['nopo']; ?>')">Diterima</button>
            <?php } ?>
          </center></td>
        </tr>
    <?php 
      $no++; // Increment nomor urut
    }} ?>
  </tbody>
</table>

<script>
function updateStatus(nopo) {
  if (confirm("Apakah Anda yakin ingin mengubah status menjadi 'Selesai'?")) {
    // Mengirim permintaan AJAX ke server untuk mengubah status
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ubah-statuspo.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          // Mengubah status pada tampilan
          document.getElementById('statusCell_' + nopo).innerHTML = '<span class="label label-success">Sudah diterima</span>';
        } else {
          alert("Gagal mengubah status");
        }
      }
    };
    xhr.send("nopo=" + nopo);
  }
}
</script>









        <script src="../dist/jquery.js"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.core.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        
    </body>
</html>
