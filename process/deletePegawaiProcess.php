<?php
    if(isset($_GET['ID_PEGAWAI'])){
        include ('../db.php');
        $id = $_GET['ID_PEGAWAI'];
        $queryDelete = mysqli_query($con, "DELETE FROM pegawai WHERE ID_PEGAWAI='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Pegawai Success"); window.location = "../page/listPegawaiPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Pegawai Failed"); window.location = "../page/listPegawaiPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>