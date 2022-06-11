<?php
    if(isset($_GET['ID_TRANSAKSI'])&&isset($_GET['ID_CUSTOMER'])){
        include ('../db.php');
        $id_transaksi = $_GET['ID_TRANSAKSI'];
        $id_customer = $_GET['ID_CUSTOMER'];
        $queryDelete = mysqli_query($con, "DELETE FROM transaksi WHERE ID_TRANSAKSI='$id_transaksi' AND ID_CUSTOMER='$id_customer'") or die(mysqli_error($con));
        if($queryDelete){
            echo
            '<script>
            alert("Delete Transaksi Success"); window.location = "../page/listTransaksiCustPage.php"
            </script>';
        }else{
        echo
            '<script>
            alert("Delete Transaksi Failed"); window.location = "../page/listTransaksiCustPage.php"
            </script>';
        }
    }else {
        echo
        '<script>
        window.history.back()
        </script>';
    }
?>