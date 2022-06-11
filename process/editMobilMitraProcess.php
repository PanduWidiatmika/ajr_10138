<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editMobilMitra'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        // $mulaikontrak = $_POST['mulaikontrak'];
        $selesaikontrak = $_POST['selesaikontrak'];
        // $tglservis = $_POST['tglservis'];
        $id = $_GET['ID_MOBIL'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE mobil SET PERIODE_KONTRAK_BERAKHIR='$selesaikontrak' WHERE ID_MOBIL='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Mobil Mitra Success"); window.location = "../page/listMobilMitraPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Mobil Mitra Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
