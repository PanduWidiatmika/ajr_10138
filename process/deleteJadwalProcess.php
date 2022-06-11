<?php
    if(isset($_GET['ID_PEGAWAI'])&&isset($_GET['ID_JADWAL'])){
        include ('../db.php');
        $id_pegawai = $_GET['ID_PEGAWAI'];
        $id_jadwal = $_GET['ID_JADWAL'];
        $queryDelete = mysqli_query($con, "DELETE FROM detail_jadwal WHERE ID_PEGAWAI='$id_pegawai' AND ID_JADWAL='$id_jadwal'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Jadwal Pegawai Success"); window.location = "../page/listJadwalPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Jadwal Pegawai Failed"); window.location = "../page/listJadwalPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>