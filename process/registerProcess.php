<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['register'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $email = $_POST['email'];
        $password = password_hash($_POST['tanggal_lahir'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $alamat  =  $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $notelp = $_POST['notelp'];
        $tanda_pengenal = $_POST['tanda_pengenal'];
        $sim = $_POST['sim'];
        

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO customer(email_customer, nama_customer, alamat_lengkap_customer, tanggal_lahir_customer, jenis_kelamin_customer, no_telp_customer, tanda_pengenal_customer,no_sim_customer, password_customer, customer_form) VALUES
            ('$email',  '$nama',  '$alamat',  '$tanggal_lahir',  '$jenis_kelamin',  '$notelp',  '$tanda_pengenal',  '$sim',  '$password', CONCAT('CUS', DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '-'))")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){ echo
            '<script>
            alert("Register Success"); window.location = "../index.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Register Failed");
            </script>';
        }

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
