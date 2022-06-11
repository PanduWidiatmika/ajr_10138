<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahPegawai'])){

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
        $password = password_hash($_POST['tgllahir'], PASSWORD_DEFAULT);
        $foto = $_POST['foto'];
        

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO pegawai(ID_ROLE, NAMA_PEGAWAI, EMAIL_PEGAWAI, TGL_LAHIR_PEGAWAI, JENIS_KELAMIN_PEGAWAI, NO_TELP_PEGAWAI, ALAMAT_PEGAWAI, PASSWORD_PEGAWAI, FOTO_PEGAWAI) VALUES
            ('$role',  '$nama',  '$email',  '$tgllahir',  '$jeniskel', '$notelp',  '$alamat','$password', '$foto')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listPegawaiPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Create Data Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
