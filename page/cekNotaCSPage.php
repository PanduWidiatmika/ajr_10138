<?php
    include '../db.php';
    $id = $_GET['ID_TRANSAKSI'];
    $query = mysqli_query($con, "SELECT *, (t.SUBTOTAL_PEMBAYARAN-t.DISKON_PEMBAYARAN+t.BIAYA_EKSTENSI_PEMBAYARAN) AS TOTAL_PEMBAYARAN FROM transaksi t LEFT JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER) JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL) JOIN customer c ON(t.ID_CUSTOMER=c.ID_CUSTOMER) LEFT JOIN promo p ON(t.ID_PROMO=p.ID_PROMO) WHERE ID_TRANSAKSI = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    $queryDurasi = mysqli_query($con, "SELECT *, DATEDIFF(TGL_WAKTU_SELESAI_SEWA,TGL_WAKTU_MULAI_SEWA) AS DURASI FROM transaksi WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    $data1 = mysqli_fetch_assoc($queryDurasi);

    $queryMobil = mysqli_query($con, "SELECT m.HARGA_SEWA * DATEDIFF(t.TGL_WAKTU_SELESAI_SEWA,t.TGL_WAKTU_MULAI_SEWA) AS TOTAL1 FROM transaksi t JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL)WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    $data2 = mysqli_fetch_assoc($queryMobil);

    $queryDriver = mysqli_query($con, "SELECT d.TARIF_DRIVER * DATEDIFF(t.TGL_WAKTU_SELESAI_SEWA,t.TGL_WAKTU_MULAI_SEWA) AS TOTAL1 FROM transaksi t JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER)WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    $data3 = mysqli_fetch_assoc($queryDriver);

    $queryPegawai = mysqli_query($con, "SELECT t.ID_PEGAWAI, p.NAMA_PEGAWAI FROM transaksi t JOIN pegawai p ON(t.ID_PEGAWAI=p.ID_PEGAWAI)WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    $data4 = mysqli_fetch_assoc($queryPegawai);
    
?>

<head>
    <style>
        @media print{
            .btnP { 
                display: none;
            }
        }
    </style>
</head>

<center>
<div class="container p-3 m-4 h-100"
    style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); width:fit-content; padding-bottom:10px;">
    <div style="margin-left:10px; margin-right:10px">
    <center>
        <table style='width:550px; font-size:10pt; font-family:calibri; border-collapse: collapse;' border = '0'>
            <tr>
                <td width='60%' align='left' style='padding-right:80px; vertical-align:top'><span style='font-size:12pt'><b>ATMA JOGJA RENTAL</b></span></br>
                Jalan Babarsari 44 Yogyakarta 55281 </br>
                Telp : (0274) 487711</h2></td>
                <td style='vertical-align:top' width='40%' align='left'>
                <b><span style='font-size:12pt'>Nota Customer</span></b></br>
                ID Transaksi : <?php echo' '.$data['TRANSAKSI_FORM'].''.$data['ID_TRANSAKSI'].' '?></br>
                Tanggal : <?php echo' '.$data['TGL_TRANSAKSI'].' '?></br>
                </td>
            </tr>
        </table>
        <table style='width:550px; font-size:10pt; font-family:calibri; border-collapse: collapse;' border = '0'>
            <td width='60%' align='left' style='padding-right:80px; vertical-align:top'>
                Cust : <?php echo' '.$data['NAMA_CUSTOMER'].' '?></br>
                CS : <?php echo' '.$data4['NAMA_PEGAWAI'].' '?>
            </td>
            <td style='vertical-align:top' width='40%' align='left'>
                DRV : <?php echo' '.$data['NAMA_DRIVER'].' '?><br>
                PRO : <?php echo' '.$data['KODE_PROMO'].' '?>
            </td>
        </table>

        <table cellspacing='0' style='width:550px; font-size:10pt; font-family:calibri;  border-collapse: collapse;' border='0'>
        <hr>

        <tr align='left'>
            <td>Tgl Mulai</td>
            <td><?php echo' '.$data['TGL_WAKTU_MULAI_SEWA'].' '?></td>
        </tr>
        <tr align='left'>
            <td>Tgl Selesai</td>
            <td><?php echo' '.$data['TGL_WAKTU_SELESAI_SEWA'].' '?></td>
        </tr>
        <tr align='left'>
            <td>Tgl Pengembalian</td>
            <td><?php echo' '.$data['TGL_WAKTU_PENGEMBALIAN'].' '?></td>
        </tr>
        <tr align='left'>
            <td><b>Item</b></td>
            <td><b>Satuan</b></td>
            <td><b>Durasi</b></td>
            <td><b>Sub Total</b></td>
        </tr>
        <tr align='left'>
            <td><?php echo' '.$data['NAMA_MOBIL'].' '?></td>
            <td><?php echo' '.$data['HARGA_SEWA'].' '?></td>
            <td><?php echo' '.$data1['DURASI'].' hari '?></td>
            <td><?php echo' '.$data2['TOTAL1'].' '?></td>
        </tr>
        <tr align='left'>
            <td><?php echo'Driver '.$data['NAMA_DRIVER'].' '?></td>
            <td><?php echo' '.$data['TARIF_DRIVER'].' '?></td>
            <td><?php echo' '.$data1['DURASI'].' hari '?></td>
            <td><?php echo' '.$data3['TOTAL1'].' '?></td>
        </tr>
        <tr align='left'>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo' '.$data['SUBTOTAL_PEMBAYARAN'].' '?></td>
        </tr>
        <tr align='left' style="border-top:1px solid;">
            <td>Cust</td>
            <td>CS</td>
            <td>Disc</td>
            <td><?php echo' '.$data['DISKON_PEMBAYARAN'].' '?></td>
        </tr>
        <tr align='left'>
            <td></td>
            <td></td>
            <td style="border-top:1px solid;">Denda</td>
            <td style="border-top:1px solid;"><?php echo' '.$data['BIAYA_EKSTENSI_PEMBAYARAN'].' '?></td>
        </tr>
        <tr align='left'>
            <td></td>
            <td></td>
            <td style="border-top:1px solid;">Total</td>
            <td style="border-top:1px solid;"><?php echo' '.$data['TOTAL_PEMBAYARAN'].' '?></td>
        </tr>
        <tr align='left'>
            <td><?php echo' '.$data['NAMA_CUSTOMER'].' '?></td>
            <td><?php echo' '.$data4['NAMA_PEGAWAI'].' '?></td>
            <td></td>
            <td></td>
        </tr>
        </table>
        
    </center>
    </div>
</div>
<br>

<!-- <script>
    window.print();
</script> -->

<button class="btnP" onClick="window.print()">Cetak Nota</button>
</center>