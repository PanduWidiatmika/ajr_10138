<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editTransaksiCS'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        // $id_customer = $_POST['id_customer'];
        // $id_mobil = $_POST['id_mobil'];
        // $id_driver = $_POST['id_driver'];
        // $mulai = $_POST['mulai'];
        // $selesai = $_POST['selesai'];
        session_start();
        $id_pegawai = $_SESSION['user']['ID_PEGAWAI'];
        $id = $_GET['ID_TRANSAKSI'];

        $queryCek = mysqli_query($con, "SELECT ID_DRIVER, ID_MOBIL FROM transaksi WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($queryCek);

        // Melakukan insert ke databse dengan query dibawah ini
        if(empty($data['ID_DRIVER'])){
            $query = mysqli_query($con,
            "UPDATE transaksi SET STATUS_TRANSAKSI='Diverifikasi', ID_PEGAWAI='$id_pegawai' WHERE ID_TRANSAKSI='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Disewa' WHERE ID_MOBIL='$data[ID_MOBIL]' ") or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("Verifikasi Data Transaksi Success"); window.location = "../page/listTransaksiCSPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Verifikasi Data Transaksi Failed");
                    </script>';
            }
        }else{
            $query = mysqli_query($con,
            "UPDATE transaksi SET STATUS_TRANSAKSI='Diverifikasi', ID_PEGAWAI='$id_pegawai' WHERE ID_TRANSAKSI='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            $queryDriver = mysqli_query($con, "UPDATE driver SET STATUS_DRIVER='Disewa' WHERE ID_DRIVER='$data[ID_DRIVER]'") or die(mysqli_error($con));

            $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Disewa' WHERE ID_MOBIL='$data[ID_MOBIL]'") or die(mysqli_error($con));

            if($query){
                echo
                    '<script>
                    alert("Verifikasi Data Transaksi Success"); window.location = "../page/listTransaksiCSPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Verifikasi Data Transaksi Failed");
                    </script>';
            }
        }
        
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
