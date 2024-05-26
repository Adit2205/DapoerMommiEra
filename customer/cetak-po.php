<?php
session_start();

// Redirect if user is not logged in
if (empty($_SESSION['username'])){
    header('location:../index.php');
    exit();
} else {
    include "../customer/conn.php";
    require('../fpdf17/fpdf.php');

    if(isset($_GET['kd'])) {
        $kodesaya = $_GET['kd'];

        // Query to fetch data
        $result = mysqli_query($koneksi, "SELECT po_terima.*, konfirmasi.jumlah, produk.kode AS kode_prod, produk.nama, produk.harga, customer.alamat, customer.no_telp, customer.nama AS nama_cus, po.status 
                                        FROM po_terima
                                        LEFT JOIN produk ON po_terima.kode = produk.kode
                                        LEFT JOIN customer ON po_terima.kd_cus = customer.kd_cus
                                        LEFT JOIN po ON po_terima.nopo = po.nopo
                                        LEFT JOIN konfirmasi ON konfirmasi.nopo = po_terima.nopo
                                        WHERE po_terima.id='$kodesaya'") or die(mysqli_error($koneksi));

        // Check if any rows are returned
        if(mysqli_num_rows($result) > 0) {
            //Create a new PDF file
            $pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
            $pdf->AddPage();
            $pdf->Image('../img/logo1.png',10,10,50,50); // Width and height of the image are both 50mm

            //Fields Name position
            $pdf->SetFont('Arial','B',13);
            $pdf->Cell(80);
            $pdf->Cell(30,10,'STRUK BELANJA',0,0,'C');
            $pdf->Ln();
            $pdf->Cell(80);
            $pdf->Cell(30,10,'Warung Sunda Ibu Nana',0,0,'C');
            $pdf->Ln();

            //Field Name Position
            $pdf->SetFillColor(255,255,255);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(80,8,'No: '.$kodesaya,0,0,'L',1);
            $pdf->Ln();
            $pdf->Cell(200,8,'Alamat : ',0,0,'L',1);
            $pdf->SetX(160);
            $pdf->Cell(45,8,'Tanggal Beli : ',0,0,'R',1);
            $pdf->Ln();
            $pdf->Cell(40,8,'No Telepon : ',0,0,'L',1);
            $pdf->Ln();

            //Fields Name position
            $pdf->SetFillColor(110,180,230);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,8,'Kode',1,0,'C',1);
            $pdf->SetX(45);
            $pdf->Cell(60,8,'Makanan',1,0,'C',1);
            $pdf->SetX(105);
            $pdf->Cell(20,8,'Qty',1,0,'C',1);
            $pdf->SetX(125);
            $pdf->Cell(40,8,'Price',1,0,'C',1);
            $pdf->SetX(165);
            $pdf->Cell(40,8,'Status',1,0,'C',1);
            $pdf->Ln();

            //Now show the columns
            $pdf->SetFont('Arial','',10);
            while($row = mysqli_fetch_array($result))
            {
                $kode_prod = $row['kode_prod'];
                $nama      = $row['nama'];
                $qty       = $row['jumlah'];
                $harga     = number_format($row['harga'],0,",",".");
                $status    = $row['status'];

                $pdf->Cell(40,8,$kode_prod,1,0,'C');
                $pdf->Cell(60,8,$nama,1,0,'L');
                $pdf->Cell(20,8,$qty,1,0,'C');
                $pdf->Cell(40,8,$harga,1,0,'C');
                $pdf->Cell(40,8,$status,1,0,'C');
                $pdf->Ln();
            }

            //Footer Table
            $pdf->SetFillColor(110,180,230);
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(40,8,'Total Tagihan',1,0,'C',1);
            $pdf->SetX(45);
            $pdf->Cell(160,8,'',1,0,'R',1);
            $pdf->Ln();
            $pdf->SetFillColor(110,180,230);
            $pdf->Ln(10);

            //After Footer
            $pdf->SetFillColor(255,255,255);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,8,'Kepala Sekolah,',0,0,'L',1);
            $pdf->Ln();
            $pdf->Cell(40,8,'Hakko Bio Richard, A.Md Kom',0,0,'L',1);
            $pdf->Ln();

            $pdf->Cell(30,10,'PT. BBG',0,0,'C');
            $pdf->Cell(105);
            $pdf->Cell(30,10,'PT. BBRI',0,0,'C');
            $pdf->Ln(20);
            $pdf->Cell(30,10,'( ............................................................)',0,0,'C');
            $pdf->Cell(107);
            $pdf->Cell(30,10,'( ............................................................)',0,0,'C');

            // Output PDF to browser and force download
            ob_end_clean(); // Clean output buffer before generating PDF
            //header('Content-type: application/pdf');
            //header('Content-Disposition: attachment; filename="struk_belanja.pdf"');
            $pdf->Output();
            exit(); // Make sure to exit after outputting the PDF
        } else {
            echo "Tidak ada data yang ditemukan";
        }
    } else {
        echo "Parameter 'kd' tidak ditemukan";
    }

}
?>
