<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['tambahJadwal'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];
        
        $temp1 = mysqli_query($con,
        "SELECT COUNT(ID_PEGAWAI) FROM detail_jadwal WHERE ID_PEGAWAI='$id_pegawai' ")
        or die(mysqli_error($con));
        $fetchtemp1 = mysqli_fetch_array($temp1);
        $fetchtemp1[0]++;

        $temp2 = mysqli_query($con,
        "SELECT ID_ROLE FROM pegawai WHERE ID_PEGAWAI='$id_pegawai' ")
        or die(mysqli_error($con));
        $fetchtemp2 = mysqli_fetch_array($temp2);

        $temp3 = mysqli_query($con,
        "SELECT * FROM detail_jadwal WHERE ID_PEGAWAI='$id_pegawai' AND ID_JADWAL='$id_jadwal' ")
        or die(mysqli_error($con));

        if($fetchtemp1[0]>6){
            echo
                '<script>
                alert("Tiap Pegawai Hanya Bisa Mengambil 6 Shift Saja"); window.location = "../page/addJadwalPage.php"
                </script>';
        }else if($fetchtemp2[0]==1){
            echo
                '<script>
                alert("Manager Tidak Bisa Memiliki Jadwal"); window.location = "../page/addJadwalPage.php"
                </script>';
        }else if(mysqli_num_rows($temp3)!=0){
            echo
                '<script>
                alert("Jadwal Sudah Diambil oleh Pegawai ini!"); window.location = "../page/addJadwalPage.php"
                </script>';
        }else{
            $query = mysqli_query($con,
            "INSERT INTO detail_jadwal(ID_JADWAL, ID_PEGAWAI) VALUES
            ('$id_jadwal',  '$id_pegawai')")
            or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”

            if($query){
                echo
                '<script>
                alert("Create Data Jadwal Pegawai Success"); window.location = "../page/listJadwalPage.php"
                </script>';
            }else{
                echo
                '<script>
                alert("Create Data Jadwal Pegawai Failed");
                </script>';
            }
        }
        // Melakukan insert ke databse dengan query dibawah ini
        
            

    }else{
    echo
    '<script> window.history.back()
    </script>';
    }
?>
