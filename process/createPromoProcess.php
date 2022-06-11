<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahPromo'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $kode = $_POST['kode'];
        $jenis = $_POST['jenis'];
        $ket = $_POST['ket'];
        $status = $_POST['status'];
        $disc = $_POST['disc'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO promo(KODE_PROMO, JENIS_PROMO, KETERANGAN_PROMO, STATUS_PROMO, DISKON_PROMO) VALUES
            ('$kode',  '$jenis', '$ket', '$status', '$disc')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Promo Success"); window.location = "../page/listPromoPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Create Data Promo Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
