<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahMitra'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama = $_POST['nama'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        $ktp = $_POST['ktp'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO mitra(NO_KTP_PEMILIK, NAMA_PEMILIK, ALAMAT_PEMILIK, NO_TELP_PEMILIK) VALUES
            ('$ktp',  '$nama', '$alamat', '$notelp')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Mitra Success"); window.location = "../page/listMitraPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Create Data Mitra Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
