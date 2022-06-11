<?php
    if(isset($_GET['ID_DRIVER'])){
        include ('../db.php');
        $id = $_GET['ID_DRIVER'];
        $queryDelete = mysqli_query($con, "DELETE FROM driver WHERE ID_DRIVER='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Driver Success"); window.location = "../page/listDriverPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Driver Failed"); window.location = "../page/listDriverPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>