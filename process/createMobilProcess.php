<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahMobil'])){

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
        $aset = $_POST['aset'];
        $tglservis = $_POST['tglservis'];
        $tipe = $_POST['tipe'];
        $volbagasi = $_POST['volbagasi'];
        $harga = $_POST['harga'];
        $fasilitas = $_POST['fasilitas'];
        $status = $_POST['status'];
        $mulaikontrak = $_POST['mulaikontrak'];
        $selesaikontrak = $_POST['selesaikontrak'];
        $id_pemilik = $_POST['id_pemilik'];

        // Melakukan insert ke databse dengan query dibawah ini
        $query = mysqli_query($con,
            "INSERT INTO mobil(nomor_stnk_mobil, nama_mobil, jenis_transmisi_mobil, jenis_bahan_bakar_mobil, volume_bahan_bakar_mobiil, kapasitas_penumpang_mobil, warna_mobil, plat_nomor_mobil, kategori_aset, fasilitas_mobil, status_mobil, periode_kontrak_mulai, periode_kontrak_berakhir, tgl_terakhir_servis, tipe_mobil, volume_bagasi_mobil, harga_sewa, id_pemilik) VALUES
            ('$stnk',  '$nama',  '$transmisi',  '$jenisbb',  '$volbb', '$kapasitas',  '$warna',  '$plat',  '$aset', '$fasilitas', '$status', '$mulaikontrak',  '$selesaikontrak',  '$tglservis',  '$tipe', '$volbagasi',  '$harga', '$id_pemilik')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

        if($query){
            echo
                '<script>
                alert("Create Data Success"); window.location = "../page/listMobilPage.php"
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
