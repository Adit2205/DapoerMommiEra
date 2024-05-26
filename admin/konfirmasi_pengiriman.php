<?php 
session_start();
if (empty($_SESSION['username'])){
    header('location:../index.php');    
} else {
    include "../conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin</title>
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
                Administrator
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
                                <?php include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
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
                        Pesanan
                        <small>Administrator</small>
                    </h1>
             <?php
             if(isset($_GET['hal']) == 'hapus'){
                $kode = $_GET['kd'];
                $cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode='$kode'");
                if(mysqli_num_rows($cek) == 0){
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
                }else{
                    $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE kode='$kode'");
                    if($delete){
                        echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
                    }
                }
            }
            ?>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Pembayaran</a></li>
                        <li class="active">Konfirmasi Pembayaran</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='konfirmasi_pengiriman.php' method="POST">
          
           <input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari Pesanan' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='konfirmasi_pengiriman.php' class="btn btn-sm btn-success" >Refresh</i></a>
            </div>
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Konfirmasi Pengiriman </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                                    <?php
$query3 = "SELECT konfirmasi.*, customer.nama AS nama_pelanggan, produk.nama AS nama_produk 
           FROM konfirmasi 
           INNER JOIN customer ON konfirmasi.kd_cus = customer.kd_cus
           INNER JOIN produk ON konfirmasi.kode = produk.kode";

           if(isset($_POST['qcari'])){
    $qcari = $_POST['qcari'];
    $query3 = "SELECT konfirmasi.*, customer.nama AS nama_pelanggan, produk.nama AS nama_produk 
           FROM konfirmasi 
           INNER JOIN customer ON konfirmasi.kd_cus = customer.kd_cus
           INNER JOIN produk ON konfirmasi.kode = produk.kode
               WHERE konfirmasi.nopo LIKE '%$qcari%' OR customer.nama LIKE '%$qcari%'";
}
$hasil2 = mysqli_query($koneksi, $query3) or die(mysqli_error());
?>

<table id="example" class="table table-hover table-bordered">
  <thead>
    <tr>
      <th><center>ID</center></th>
      <th><center>No PO</center></th>
      <th><center>Nama Customer</center></th>
      <th><center>Nama Produk</center></th>
      <th><center>Pembayaran</center></th>
      <th><center>Tanggal</center></th>
      <th><center>Jumlah</center></th>
      <th><center>Status</center></th>
      <th><center>Bukti Transfer</center></th>
      <th><center>Tools</center></th>
    </tr>
  </thead>
  <tbody>
   <?php 
    while($data2 = mysqli_fetch_array($hasil2)) { 
      if ($data2['status'] == 'Bayar') { ?>
        <tr>
          <td><center><?php echo $data2['id_kon']; ?></center></td>
          <td><center><?php echo $data2['nopo']; ?></center></td>
          <td><center><?php echo $data2['nama_pelanggan']; ?></center></td>
          <td><center><?php echo $data2['nama_produk']; ?></center></td>
          <td><center><?php echo $data2['bayar_via']; ?></center></td>
          <td><center><?php echo $data2['tanggal']; ?></center></td>
          <td><center>Rp. <?php echo number_format($data2['jumlah'], 2, ",", "."); ?></center></td>
          <td id="statusCell_<?php echo $data2['id_kon']; ?>"><center>
            <?php
            if ($data2['status'] == 'Bayar') {
              echo '<span class="label label-success">Sudah di Bayar</span>';
            } else if ($data2['status'] == 'Belum') {
              echo '<span class="label label-danger">Belum di Bayar</span>';
            } else if ($data2['status'] == 'Proses') {
              echo '<span class="label label-warning">Sedang diproses</span>';
            }
            ?>
          </center></td>
          <td><center>
            <?php if (!empty($data2['bukti_transfer'])) { ?>
              <a href="#" class="view-image" data-toggle="modal" data-target="#imageModal" data-image="<?php echo $data2['bukti_transfer']; ?>">
                <img src="<?php echo $data2['bukti_transfer']; ?>" class="thumbnail" style="width: 50px;">
              </a>
            <?php } else { ?>
              <span class="text-muted">Tidak ada bukti transfer</span>
            <?php } ?>
          </center></td>
          <td><center>
            <div id="thanks">
              <a class="btn btn-sm btn-warning" href="pengiriman.php?id=<?php echo $data2['id_kon']; ?>&status=Bayar">Verifikasi</a>
            </div>
          </center></td>
        </tr>
    <?php }} ?>
  </tbody>
</table>


<!-- Modal -->
<div id="imageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gambar Bukti Transfer</h4>
      </div>
      <div class="modal-body">
        <img id="modalImage" src="" style="width: 100%;" />
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    $(".view-image").click(function(){
      var image = $(this).data('image');
      $("#modalImage").attr("src", image);
      $("#imageModal").modal('show');
    });
  });
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
