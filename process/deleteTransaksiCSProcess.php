<?php
    if(isset($_GET['ID_TRANSAKSI'])){
        include ('../db.php');
        $id = $_GET['ID_TRANSAKSI'];
        $queryDelete = mysqli_query($con, "UPDATE transaksi SET STATUS_TRANSAKSI='ditolak' WHERE ID_TRANSAKSI='$id'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Cancel Transaksi Success"); window.location = "../page/listTransaksiCSPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Cancel Transaksi Failed"); window.location = "../page/listTransaksiCSPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>