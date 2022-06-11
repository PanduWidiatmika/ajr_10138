<?php
    // untuk ngecek tombol yang namenya 'register' sudah di pencet atau belum
    // $_POST itu method di formnya
    if(isset($_POST['editJadwal'])){

        // untuk mengoneksikan dengan database dengan memanggil file db.php
        include('../db.php');

        // tampung nilai yang ada di from ke variabel
        // sesuaikan variabel name yang ada di registerPage.php disetiap input
        $id_pegawai = $_POST['id_pegawai'];
        $id_jadwal = $_POST['id_jadwal'];
        $old_id_jadwal = $_POST['old_id_jadwal'];

        $temp2 = mysqli_query($con,
        "SELECT * FROM detail_jadwal WHERE ID_PEGAWAI='$id_pegawai' AND ID_JADWAL='$id_jadwal' ")
        or die(mysqli_error($con));

        if($id_jadwal==$old_id_jadwal){
            echo
                '<script>
                alert("Edit Data Jadwal Pegawai Success"); window.location = "../page/listJadwalPage.php"
                </script>';
        }else{
            if(mysqli_num_rows($temp2)!=0){
                echo
                '<script>
                alert("Jadwal Sudah Diambil oleh Pegawai ini!"); window.location = "../page/EditJadwalPage.php?ID_PEGAWAI='.$id_pegawai.'&ID_JADWAL='.$old_id_jadwal.'"
                </script>';
            }else{
                $query = mysqli_query($con,
                "UPDATE detail_jadwal SET ID_JADWAL='$id_jadwal' WHERE ID_PEGAWAI='$id_pegawai' AND ID_JADWAL='$old_id_jadwal' ")
                or die(mysqli_error($con)); // perintah mysql yang gagal dijalankan di- tangani oleh perintah “or die”
    
                if($query){
                    echo
                    '<script>
                    alert("Edit Data Jadwal Pegawai Success"); window.location = "../page/listJadwalPage.php"
                    </script>';
                }else{
                    echo
                    '<script>
                    alert("Edit Data Jadwal Pegawai Failed");
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
