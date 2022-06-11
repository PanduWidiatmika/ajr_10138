<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editMobil'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $stnk = $_POST['stnk'];
        $nama = $_POST['nama'];
        $transmisi  =  $_POST['transmisi'];
        $jenisbb = $_POST['jenisbb'];
        $volbb = $_POST['volbb'];
        $kapasitas = $_POST['kapasitas'];
        $warna = $_POST['warna'];
        $plat = $_POST['plat'];
        // $aset = $_POST['aset'];
        $tglservis = $_POST['tglservis'];
        $tipe = $_POST['tipe'];
        $volbagasi = $_POST['volbagasi'];
        $harga = $_POST['harga'];
        $fasilitas = $_POST['fasilitas'];
        $status = $_POST['status'];
        $id = $_GET['ID_MOBIL'];
        // $id_mitra = $_POST['id_mitra'];
        

        // if($aset=='Perusahaan'){ //kalo kategori aset perusaahaan akan ngeset value kontrak mulai dan berakhir menjadi 0000-00-00
        //     $mulaikontrak = 0000-00-00;
        //     $selesaikontrak = 0000-00-00;
        // }else{
        //     $mulaikontrak = $_POST['mulaikontrak'];
        //     $selesaikontrak = $_POST['selesaikontrak'];
        // }

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "UPDATE mobil SET NOMOR_STNK_MOBIL='$stnk', NAMA_MOBIL='$nama', JENIS_TRANSMISI_MOBIL='$transmisi', JENIS_BAHAN_BAKAR_MOBIL='$jenisbb', VOLUME_BAHAN_BAKAR_MOBIIL='$volbb', 
            KAPASITAS_PENUMPANG_MOBIL='$kapasitas', WARNA_MOBIL='$warna', PLAT_NOMOR_MOBIL='$plat',  FASILITAS_MOBIL='$fasilitas', STATUS_MOBIL='$status',  TGL_TERAKHIR_SERVIS='$tglservis', VOLUME_BAGASI_MOBIL='$volbagasi', HARGA_SEWA='$harga', TIPE_MOBIL='$tipe' WHERE ID_MOBIL='$id' ")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Edit Data Mobil Success"); window.location = "../page/listMobilPage.php"
                </script>';
        }else{
            echo
                '<script>
                alert("Edit Data Mobil Failed");
                </script>';
        }
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
