<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editMitra'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        $ktp = $_POST['ktp'];
        $id = $_GET['ID_PEMILIK'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE mitra SET NO_KTP_PEMILIK='$ktp',NAMA_PEMILIK='$nama', NO_TELP_PEMILIK='$notelp', ALAMAT_PEMILIK='$alamat' WHERE ID_PEMILIK='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Mitra Success"); window.location = "../page/listMitraPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Mitra Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
