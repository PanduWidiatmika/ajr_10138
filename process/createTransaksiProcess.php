<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahTransaksi'])){

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

        // Melakukan insert ke databse dengan query dibawah ini
        if(empty($id_driver)){
            if(empty($id_promo)){//gapake driver n promo
                $query = mysqli_query($con,
                "INSERT INTO transaksi(ID_CUSTOMER, ID_MOBIL, TGL_WAKTU_MULAI_SEWA, TGL_WAKTU_SELESAI_SEWA, TRANSAKSI_FORM, STATUS_TRANSAKSI, TGL_TRANSAKSI) VALUES
                ('$id_customer',  '$id_mobil', '$mulai', '$selesai', CONCAT('TRN',DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '02','-'), 'Belum diverifikasi', NOW())")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>
                        alert("Create Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Create Transaksi Failed");
                        </script>';
                }
            }else{//gapake driver pake promo
                $query = mysqli_query($con,
                "INSERT INTO transaksi(ID_CUSTOMER, ID_MOBIL, TGL_WAKTU_MULAI_SEWA, TGL_WAKTU_SELESAI_SEWA, ID_PROMO, TRANSAKSI_FORM, STATUS_TRANSAKSI, TGL_TRANSAKSI) VALUES
                ('$id_customer',  '$id_mobil', '$mulai', '$selesai', '$id_promo', CONCAT('TRN',DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '02','-'), 'Belum diverifikasi', NOW() )")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”
    
                if($query){
                    echo
                        '<script>
                        alert("Create Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Create Transaksi Failed");
                        </script>';
                }
            }
        }else if(empty($id_promo)){//gapake promo
                $query = mysqli_query($con,
                "INSERT INTO transaksi(ID_CUSTOMER, ID_MOBIL, TGL_WAKTU_MULAI_SEWA, TGL_WAKTU_SELESAI_SEWA, ID_DRIVER, TRANSAKSI_FORM, STATUS_TRANSAKSI, TGL_TRANSAKSI) VALUES
                ('$id_customer',  '$id_mobil', '$mulai', '$selesai', '$id_driver', CONCAT('TRN',DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '01','-'), 'Belum diverifikasi', NOW() )")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

                if($query){
                    echo
                        '<script>
                        alert("Create Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Create Transaksi Failed");
                        </script>';
                }
            
        }else{//pake dua duanya
            $query = mysqli_query($con,
            "INSERT INTO transaksi(ID_CUSTOMER, ID_MOBIL, ID_DRIVER, TGL_WAKTU_MULAI_SEWA, TGL_WAKTU_SELESAI_SEWA, ID_PROMO, TRANSAKSI_FORM, STATUS_TRANSAKSI, TGL_TRANSAKSI) VALUES
            ('$id_customer',  '$id_mobil', '$id_driver', '$mulai', '$selesai', '$id_promo', CONCAT('TRN',DATE_FORMAT(CURRENT_DATE, '%y%m%d'), '01','-'), 'Belum diverifikasi', NOW())")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            if($query){
                echo
                    '<script>
                    alert("Create Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
                    </script>';
            }else{
                echo
                    '<script>
                    alert("Create Transaksi Failed");
                    </script>';
            }
        }
        
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
