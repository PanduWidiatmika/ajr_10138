<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['pembayaran'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        // $id_customer = $_POST['id_customer'];
        // $id_mobil = $_POST['id_mobil'];
        // $id_driver = $_POST['id_driver'];
        // $mulai = $_POST['mulai'];
        // $selesai = $_POST['selesai'];
        // $id_promo = $_POST['id_promo'];
        $metode = $_POST['metode'];
        $jumlah = $_POST['jumlah'];
        $rating_driver = $_POST['rating_driver'];
        $penilaian_driver = $_POST['penilaian_driver'];
        $rating_rental = $_POST['rating_rental'];
        $penilaian_rental = $_POST['penilaian_rental'];
        $id = $_GET['ID_TRANSAKSI'];

        $querytot = mysqli_query($con, "SELECT (SUBTOTAL_PEMBAYARAN-DISKON_PEMBAYARAN+BIAYA_EKSTENSI_PEMBAYARAN) AS TOTAL_PEMBAYARAN, ID_DRIVER FROM transaksi WHERE ID_TRANSAKSI='$id' ") or die(mysqli_error($con));
        $data= mysqli_fetch_assoc($querytot);

        // Melakukan insert ke databse dengan query dibawah ini
        if($data['TOTAL_PEMBAYARAN']>$jumlah){
            echo
                '<script>
                alert("Jumlah Pembayaran Kurang");
                window.history.back();
                window.location = "../page/pembayaranCustPage.php"
                </script>';
        }else{
            if(empty($data['ID_DRIVER'])){
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Sudah membayar', METODE_PEMBAYARAN='$metode', JUMLAH_PEMBAYARAN='$jumlah', RATING_DRIVER=NULL, PENILAIAN_DRIVER=NULL, RATING_RENTAL='$rating_rental', PENILAIAN_RENTAL='$penilaian_rental' WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pembayaran Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pembayaran Failed");
                        </script>';
                }
            }else{
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Sudah membayar', METODE_PEMBAYARAN='$metode', JUMLAH_PEMBAYARAN='$jumlah', RATING_DRIVER='$rating_driver', PENILAIAN_DRIVER='$penilaian_driver', RATING_RENTAL='$rating_rental', PENILAIAN_RENTAL='$penilaian_rental' WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));

                $queryDriver = mysqli_query($con, "UPDATE driver SET RERATA_RATING_DRIVER=(SELECT AVG(RATING_DRIVER) FROM transaksi WHERE ID_DRIVER='$data[ID_DRIVER]') WHERE ID_DRIVER='$data[ID_DRIVER]'") or die(mysqli_error($con));
    
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pembayaran Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pembayaran Failed");
                        </script>';
                }
            }
        }
    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
