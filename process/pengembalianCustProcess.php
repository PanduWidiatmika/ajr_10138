<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['pengembalian'])){

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

        $queryCek = mysqli_query($con, "SELECT ID_DRIVER, ID_MOBIL FROM transaksi WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
        $data = mysqli_fetch_assoc($queryCek);

        $queryCekEkstensi = mysqli_query($con, "SELECT TIMESTAMPDIFF(HOUR, NOW(), TGL_WAKTU_SELESAI_SEWA) AS EKSTENSI FROM transaksi WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
        $dataCekEkstensi = mysqli_fetch_assoc($queryCekEkstensi);
        $dataCekEkstensi['EKSTENSI']+=3;

        $queryEkstensi = mysqli_query($con, "SELECT TIMESTAMPDIFF(HOUR, TGL_WAKTU_SELESAI_SEWA, NOW()) AS EKSTENSI FROM transaksi WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
        $dataEkstensi = mysqli_fetch_assoc($queryEkstensi);

        // Melakukan insert ke databse dengan query dibawah ini
        if($dataCekEkstensi['EKSTENSI']<0){//pake ekstensi
            $tempEkstensi = 1; //hari

            while($dataEkstensi['EKSTENSI']>=27){
                $tempEkstensi++;
                $dataEkstensi['EKSTENSI']-=24;
            }

            // (harga mobil+harga driver)*temp

            if(empty($id_driver)){
                if(empty($id_promo)){//gapake driver n promo
                    $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=0, BIAYA_EKSTENSI_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*$tempEkstensi) WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                    $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]' ") or die(mysqli_error($con));
    
                    
                    if($queryTransaksi){
                        echo
                            '<script>
                            alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                            </script>';
                    }else{
                        echo
                            '<script>
                            alert("Pengembalian Mobil Failed");
                            </script>';
                    }
                }else{//gapake driver pake promo
                    $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=(SELECT DISKON_PROMO/100 FROM promo WHERE ID_PROMO='$id_promo')*SUBTOTAL_PEMBAYARAN, BIAYA_EKSTENSI_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*$tempEkstensi) WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                    $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]' ") or die(mysqli_error($con));
    
                    if($queryTransaksi){
                        echo
                            '<script>
                            alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                            </script>';
                    }else{
                        echo
                            '<script>
                            alert("Pengembalian Mobil Failed");
                            </script>';
                    }
                }
                
                
            }else if(empty($id_promo)){//pake driver gapake promo
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER FROM driver WHERE ID_DRIVER='$id_driver'))*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=0, BIAYA_EKSTENSI_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER from driver WHERE ID_DRIVER='$id_driver'))*$tempEkstensi) WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                $queryDriver = mysqli_query($con, "UPDATE driver SET STATUS_DRIVER='Aktif' WHERE ID_DRIVER='$data[ID_DRIVER]' ") or die(mysqli_error($con));
    
                $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]'") or die(mysqli_error($con));
    
                    
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pengembalian Mobil Failed");
                        </script>';
                }
            }else{
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER FROM driver WHERE ID_DRIVER='$id_driver'))*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=(SELECT DISKON_PROMO/100 FROM promo WHERE ID_PROMO='$id_promo')*SUBTOTAL_PEMBAYARAN, BIAYA_EKSTENSI_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER from driver WHERE ID_DRIVER='$id_driver'))*$tempEkstensi) WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                $queryDriver = mysqli_query($con, "UPDATE driver SET STATUS_DRIVER='Aktif' WHERE ID_DRIVER='$data[ID_DRIVER]' ") or die(mysqli_error($con));
    
                $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]'") or die(mysqli_error($con));
     
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pengembalian Mobil Failed");
                        </script>';
                }
            }
        }else{//nda pake
            if(empty($id_driver)){
                if(empty($id_promo)){//gapake driver n promo
                    $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=0, BIAYA_EKSTENSI_PEMBAYARAN=0 WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                    $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]' ") or die(mysqli_error($con));
    
                    
                    if($queryTransaksi){
                        echo
                            '<script>
                            alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                            </script>';
                    }else{
                        echo
                            '<script>
                            alert("Pengembalian Mobil Failed");
                            </script>';
                    }
                }else{//gapake driver pake promo
                    $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=(SELECT DISKON_PROMO/100 FROM promo WHERE ID_PROMO='$id_promo')*SUBTOTAL_PEMBAYARAN, BIAYA_EKSTENSI_PEMBAYARAN=0 WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                    $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]' ") or die(mysqli_error($con));
    
                    if($queryTransaksi){
                        echo
                            '<script>
                            alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                            </script>';
                    }else{
                        echo
                            '<script>
                            alert("Pengembalian Mobil Failed");
                            </script>';
                    }
                }
                
                
            }else if(empty($id_promo)){//pake driver gapake promo
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER FROM driver WHERE ID_DRIVER='$id_driver'))*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=0, BIAYA_EKSTENSI_PEMBAYARAN=0 WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                $queryDriver = mysqli_query($con, "UPDATE driver SET STATUS_DRIVER='Aktif' WHERE ID_DRIVER='$data[ID_DRIVER]' ") or die(mysqli_error($con));
    
                $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]'") or die(mysqli_error($con));
    
                    
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pengembalian Mobil Failed");
                        </script>';
                }
            }else{
                $queryTransaksi = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='Belum membayar', TGL_WAKTU_PENGEMBALIAN=NOW(), SUBTOTAL_PEMBAYARAN=(((SELECT HARGA_SEWA FROM mobil WHERE ID_MOBIL='$id_mobil')+(SELECT TARIF_DRIVER FROM driver WHERE ID_DRIVER='$id_driver'))*(TIMESTAMPDIFF(DAY,TGL_WAKTU_MULAI_SEWA,TGL_WAKTU_SELESAI_SEWA))), DISKON_PEMBAYARAN=(SELECT DISKON_PROMO/100 FROM promo WHERE ID_PROMO='$id_promo')*SUBTOTAL_PEMBAYARAN, BIAYA_EKSTENSI_PEMBAYARAN=0 WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
    
                $queryDriver = mysqli_query($con, "UPDATE driver SET STATUS_DRIVER='Aktif' WHERE ID_DRIVER='$data[ID_DRIVER]' ") or die(mysqli_error($con));
    
                $queryMobil = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Tersedia' WHERE ID_MOBIL='$data[ID_MOBIL]'") or die(mysqli_error($con));
     
                if($queryTransaksi){
                    echo
                        '<script>
                        alert("Pengembalian Mobil Success"); window.location = "../page/listTransaksiCustPage.php"
                        </script>';
                }else{
                    echo
                        '<script>
                        alert("Pengembalian Mobil Failed");
                        </script>';
                }
            }
        }

        
        
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
