<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editPegawai'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $role = $_POST['role'];
        $nama = $_POST['nama'];
        $email  =  $_POST['email'];
        $tgllahir = $_POST['tgllahir'];
        $jeniskel = $_POST['jeniskel'];
        $notelp = $_POST['notelp'];
        $alamat = $_POST['alamat'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $foto = $_POST['foto'];
        $id = $_GET['ID_PEGAWAI'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE pegawai SET ID_ROLE='$role', NAMA_PEGAWAI='$nama', EMAIL_PEGAWAI='$email', TGL_LAHIR_PEGAWAI='$tgllahir',
            JENIS_KELAMIN_PEGAWAI='$jeniskel', NO_TELP_PEGAWAI='$notelp', PASSWORD_PEGAWAI='$password', ALAMAT_PEGAWAI='$alamat', FOTO_PEGAWAI='$foto' WHERE ID_PEGAWAI='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Pegawai Success"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Pegawai Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
