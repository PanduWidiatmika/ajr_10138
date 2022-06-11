<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editPromo'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $kode = $_POST['kode'];
        $jenis = $_POST['jenis'];
        $ket = $_POST['ket'];
        $status = $_POST['status'];
        $disc = $_POST['disc'];
        $id = $_GET['ID_PROMO'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE promo SET KODE_PROMO='$kode',JENIS_PROMO='$jenis', KETERANGAN_PROMO='$ket',
             STATUS_PROMO='$status', DISKON_PROMO='$disc' WHERE ID_PROMO='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Promo Success"); window.location = "../page/listPromoPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Promo Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
