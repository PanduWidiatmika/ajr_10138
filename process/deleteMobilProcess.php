<?php
    if(isset($_GET['ID_MOBIL'])){
        include ('../db.php');
        $id = $_GET['ID_MOBIL'];
        $queryDelete = mysqli_query($con, "UPDATE mobil SET STATUS_MOBIL='Hilang' WHERE ID_MOBIL='$id' AND STATUS_MOBIL!='Disewa'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Mobil Success"); window.location = "../page/listMobilPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Mobil Failed"); window.location = "../page/listMobilPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>