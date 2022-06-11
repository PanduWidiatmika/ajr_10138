<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editTransaksi'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_customer = $_POST['id_customer'];
        $id_mobil = $_POST['id_mobil'];
        $id_driver = $_POST['id_driver'];
        $mulai = $_POST['mulai'];
        $selesai = $_POST['selesai'];
        $id_promo = $_POST['id_promo'];
        $id = $_GET['ID_TRANSAKSI'];

        // Melakukan insert ke databse dengan query dibawah ini
        if(empty($id_driver)){
            if(empty($id_promo)){//gapake promo gapake driver
                $query = mysqli_query($con,
                "UPDATE transaksi SET ID_CUSTOMER='$id_customer', ID_MOBIL='$id_mobil', TGL_WAKTU_MULAI_SEWA='$mulai', TGL_WAKTU_SELESAI_SEWA='$selesai', ID_PROMO=NULL WHERE ID_TRANSAKSI='$id' ")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>
                        alert("Edit Data Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Edit Data Transaksi Failed");
                        </script>';
                } 
            }else{//gapake driver pake promo
                $query = mysqli_query($con,
                "UPDATE transaksi SET ID_CUSTOMER='$id_customer', ID_MOBIL='$id_mobil', TGL_WAKTU_MULAI_SEWA='$mulai', TGL_WAKTU_SELESAI_SEWA='$selesai', ID_PROMO='$id_promo' WHERE ID_TRANSAKSI='$id' ")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>
                        alert("Edit Data Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Edit Data Transaksi Failed");
                        </script>';
                }
            }
        }elseif(empty($id_promo)){//pake driver gapake promo
            $query = mysqli_query($con,
            "UPDATE transaksi SET ID_CUSTOMER='$id_customer', ID_MOBIL='$id_mobil', ID_DRIVER='$id_driver', TGL_WAKTU_MULAI_SEWA='$mulai', TGL_WAKTU_SELESAI_SEWA='$selesai', ID_PROMO=NULL WHERE ID_TRANSAKSI='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            if($query){
                echo
                    '<script>
                    alert("Edit Data Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Data Transaksi Failed");
                    </script>';
            }
        }else{//pake promo pake driver
            $query = mysqli_query($con,
            "UPDATE transaksi SET ID_CUSTOMER='$id_customer', ID_MOBIL='$id_mobil', ID_DRIVER='$id_driver', TGL_WAKTU_MULAI_SEWA='$mulai', TGL_WAKTU_SELESAI_SEWA='$selesai', ID_PROMO='$id_promo' WHERE ID_TRANSAKSI='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            if($query){
                echo
                    '<script>
                    alert("Edit Data Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Edit Data Transaksi Failed");
                    </script>';
            }
        }
        
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
