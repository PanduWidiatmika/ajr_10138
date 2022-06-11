<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahDriver'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $nama = $_POST['nama'];
        $email  =  $_POST['email'];
        $tgllahir = $_POST['tgllahir'];
        $jeniskel = $_POST['jeniskel'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        // $password = password_hash($_POST['tgllahir'], PASSWORD_DEFAULT);
        $bahasa = $_POST['bahasa'];
        $status = $_POST['status'];
        $tarif = $_POST['tarif'];
        // $rating = $_POST['rating'];
        $sim = $_POST['sim'];
        $napza = $_POST['napza'];
        $surat_jiwa = $_POST['surat_jiwa'];
        $surat_jasmani = $_POST['surat_jasmani'];
        $skck = $_POST['skck'];
        

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO driver(EMAIL_DRIVER, NAMA_DRIVER, ALAMAT_LENGKAP_DRIVER, TANGGAL_LAHIR_DRIVER, JENIS_KELAMIN_DRIVER,
            NO_TELP_DRIVER, BAHASA_DRIVER, STATUS_DRIVER, TARIF_DRIVER, SIM_DRIVER, NAPZA_DRIVER, SURAT_JIWA_DRIVER, SURAT_JASMANI_DRIVER, SKCK_DRIVER, DRIVER_FORM) VALUES
            ('$email',  '$nama', '$alamat',  '$tgllahir',  '$jeniskel',  '$notelp',  '$bahasa',  '$status',  '$tarif', '$sim', '$napza', '$surat_jiwa', '$surat_jasmani', '$skck', CONCAT('DRV-', DATE_FORMAT(CURRENT_DATE, '%d%m%y')))")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Driver Success"); window.location = "../page/listDriverPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Create Data Driver Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
