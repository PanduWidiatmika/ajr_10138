<?php
    if(isset($_GET['ID_PEMILIK'])){
        include ('../db.php');
        $id = $_GET['ID_PEMILIK'];
        // $queryDelete = mysqli_query($con, "DELETE FROM mitra WHERE ID_PEMILIK='$id'") or die(mysqli_error($con));
        $queryCek = mysqli_query($con, "SELECT ID_MOBIL FROM mobil WHERE ID_PEMILIK='$id' AND STATUS_MOBIL!='hilang' ") or die(mysqli_error($con));

        if(empty($queryCek)){
            $queryDelete = mysqli_query($con, "DELETE FROM mitra WHERE ID_PEMILIK='$id'") or die(mysqli_error($con));
            if($queryDelete){
                echo
                '<script>
                alert("Delete Mitra Success"); window.location = "../page/listMitraPage.php"
                </script>';
            }else{
            echo
                '<script>
                alert("Delete Mitra Failed"); window.location = "../page/listMitraPage.php"
                </script>';
            }
        }else{
            echo
            '<script>
            alert("Tolong Hapus Mobil Mitra Terlebih Dahulu"); window.location = "../page/listMitraPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>