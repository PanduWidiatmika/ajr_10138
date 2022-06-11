<?php
    include('../db.php');
    
    $query = mysqli_query($con,
            "SELECT * FROM driver WHERE STATUS_DRIVER='Aktif' ")
            or die(mysqli_error($con));
    if(empty($query)){
        echo
                '<script>
                alert("Tidak ada driver yang tersedia");
                </script>';
    }else{
        $querySelect = mysqli_query($con,
            "SELECT * FROM driver WHERE STATUS_DRIVER='Aktif' LIMIT 1 ")
            or die(mysqli_error($con));
        $_SESSION['auto'] = mysqli_fetch_array($querySelect);
    }
?>
