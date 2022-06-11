<?php
    if(isset($_POST['edit'])) {
        include('../db.php');

        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nama = $_POST['nama'];
        $alamat  =  $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $notelp = $_POST['notelp'];
        $tanda_pengenal = $_POST['tanda_pengenal'];
        $sim = $_POST['sim'];
        $id = $_GET['ID_CUSTOMER'];

        $queryupdate = mysqli_query($con,
            "UPDATE customer SET email_customer = '$email',password_customer = '$password', nama_customer = '$nama', alamat_lengkap_customer='$alamat', tanggal_lahir_customer='$tanggal_lahir', jenis_kelamin_customer='$jenis_kelamin', no_telp_customer='$notelp',tanda_pengenal_customer='$tanda_pengenal', no_sim_customer='$sim' WHERE ID_CUSTOMER = '$id' ")
        or die(mysqli_error($con));

        if($queryupdate){
            echo
                '<script>
                alert("Update Success"); window.location = "../page/profilePage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Update Failed");
                </script>';
        }

    }else{
        echo
            '<script>
            window.history.back()
            </script>';
    }
?>

