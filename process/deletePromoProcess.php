<?php
    if(isset($_GET['ID_PROMO'])){
        include ('../db.php');
        $id = $_GET['ID_PROMO'];
        $queryDelete = mysqli_query($con, "DELETE FROM promo WHERE ID_PROMO='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Promo Success"); window.location = "../page/listPromoPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Promo Failed"); window.location = "../page/listPromoPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>