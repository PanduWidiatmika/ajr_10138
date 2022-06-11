<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editDriver'])){

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
        $id = $_GET['ID_DRIVER'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE driver SET NAMA_DRIVER='$nama', EMAIL_DRIVER='$email', TANGGAL_LAHIR_DRIVER='$tgllahir', JENIS_KELAMIN_DRIVER='$jeniskel',
             NO_TELP_DRIVER='$notelp', ALAMAT_LENGKAP_DRIVER='$alamat', BAHASA_DRIVER='$bahasa', STATUS_DRIVER='$status', TARIF_DRIVER='$tarif', SIM_DRIVER='$sim', NAPZA_DRIVER='$napza', SURAT_JIWA_DRIVER='$surat_jiwa', SURAT_JASMANI_DRIVER='$surat_jasmani', SKCK_DRIVER='$skck' WHERE ID_DRIVER='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Driver Success"); window.location = "../page/listDriverPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Driver Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
