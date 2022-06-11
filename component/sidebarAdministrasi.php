<?php
session_start();
if (!$_SESSION['isLoginAdministrasi']) {
header("location: ../page/loginPage.php");
}else {
include('../db.php');
}
echo '
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <title>Administrasi AJR</title>
    <style>
    * {
        font-family: "Quicksand", sans-serif;
    }

    .side-bar {
        width: 260px;
        background-color: #16347A;
        min-height: 100vh;
    }

    a {
        padding-left: 10px;
        font-size: 13px;
        text-decoration: none;
        color: white;
    }

    .menu i {
        padding-left: 20px;
    }

    .menu .content-menu {
        padding: 9px 7px;
    }

    .isActive {
        background-color: #071853 !important;
        border-right: 8px solid #010E2F;
    }

    i {
        color: white;
    }
    </style>
</head>
<body>

    <aside>
        <div class="d-flex">
            <div class="side-bar">
                <h2 class="text-light text-center pt-2">AJR | Admin</h2>
                <hr>
                <div class="menu">
                    <div class="content-menu">
                        <i class="fa fa-columns"></i>
                        <a href="./dashboardPageAdmin.php" style="font-weight:600">Dashboard</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-taxi "></i>
                        <a href="./listMobilPage.php" style="font-weight:600">List Mobil</a>
                    </div>
                    <div class="content-menu position-relative">
                        <i class="fa fa-car"></i>
                        <a href="./listMobilMitraPage.php" style="font-weight:600" >List Mobil Mitra</a>
                        <span style="margin-left: 25px" class="position-absolute top-50 start-80 translate-middle badge  bg-danger ">';
                        $querymitra = mysqli_query($con, "SELECT COUNT(*) FROM mobil WHERE STATUS_MOBIL!='Hilang' AND DATEDIFF(PERIODE_KONTRAK_BERAKHIR,CURDATE())<=30") or die(mysqli_error($con));
                        $querymitra1 = mysqli_fetch_array($querymitra);
                        echo $querymitra1[0];
                        
                        echo'
                            <span class="visually-hidden">Contract about to end</span>
                        </span>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-plus-square"></i>
                        <a href="./addMobilPage.php" style="font-weight:600">Tambah Mobil</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-user-circle-o"></i>
                        <a href="./listPegawaiPage.php" style="font-weight:600">List Pegawai</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-plus-square"></i>
                        <a href="./addPegawaiPage.php" style="font-weight:600">Tambah Pegawai</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-id-card-o"></i>
                        <a href="./listDriverPage.php" style="font-weight:600">List Driver</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-plus-square"></i>
                        <a href="./addDriverPage.php" style="font-weight:600">Tambah Driver</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-user-o"></i>
                        <a href="./listMitraPage.php" style="font-weight:600">List Mitra</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-plus-square"></i>
                        <a href="./addMitraPage.php" style="font-weight:600">Tambah Mitra</a>
                    </div>
                    <div class="content-menu ">
                        <i class="fa fa-sign-out"></i>
                        <a href="../process/logoutProcess.php" style="font-weight:600">Logout</a>
                    </div>
                    <hr>
                </div>
            </div>
            '
?>