<?php
// ini buat ngecek tombol yang namenya 'register' sudah di pencet atau belum
// $_POST itu method di formnya
if (isset($_POST['login'])) {

    include('../db.php'); // untuk mengoneksikan dengan databas dengan memanggil file db.php

    //tampung nilai yang ada di from ke variable
    // sesuaikan variabel name yang ada di registerPage.php disetiap input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Melakukan insert ke databse dengan query dibawah ini
    $query = mysqli_query($con, "SELECT * FROM customer WHERE email_customer = '$email'") or die(mysqli_error($con));
    $query1 = mysqli_query($con, "SELECT * FROM pegawai WHERE email_pegawai = '$email'") or die(mysqli_error($con));
    $query2 = mysqli_query($con, "SELECT * FROM driver WHERE email_driver = '$email'") or die(mysqli_error($con));
    // ini buat ngecek kalo misalnya hasil dari querynya == 0 ato ga ketemu -> usernamenya tdk ditemukan
    if (mysqli_num_rows($query) == 0 && mysqli_num_rows($query1) == 0 && mysqli_num_rows($query2) == 0) {
        echo
        '<script>
                alert("Email not found!"); window.location = "../page/loginPage.php"
                </script>';
    } else if(mysqli_num_rows($query)!=0){
        $user = mysqli_fetch_array($query);
        if (password_verify($password, $user[10])) {
            // session adalah variabel global sementara yang disimpen di server
            // buat mulai sessionnya pake session_start()
            session_start();
            //isLogin ini temp variable yang gunanya buat ngecek nanti apakah sdh login ato belum
            $_SESSION['isLoginCustomer'] = true;
            $_SESSION['user'] = $user;
            echo
            '<script>
                    alert("Login Success sebagai Customer"); window.location = "../page/dashboardPage.php"
                    </script>';
        } else {
            echo
                '<script>
                alert("Email or Password Invalid");
                window.location = "../page/loginPage.php"
                </script>';
        }
    } else if(mysqli_num_rows($query1)!=0) {
        $user = mysqli_fetch_array($query1);
        if(password_verify($password, $user[8])){
            $getRole = mysqli_query($con,"SELECT id_role FROM pegawai WHERE email_pegawai='$email'") or die(mysqli_error($con));
            $fetchgetRole = mysqli_fetch_array($getRole);

            if($fetchgetRole[0]==1){
                session_start();
                $_SESSION['isLoginManager'] = true;
                $_SESSION['user'] = $user;
                echo
                '<script>alert("Login Success sebagai Manager"); window.location = "../page/dashboardPageMGR.php"</script>';
            }else if($fetchgetRole[0]==2){
                session_start();
                $_SESSION['isLoginAdministrasi'] = true;
                $_SESSION['user'] = $user;
                echo
                '<script>alert("Login Success sebagai Administrasi"); window.location = "../page/dashboardPageAdmin.php"</script>';
            }else{
                session_start();
                $_SESSION['isLoginCustomerService'] = true;
                $_SESSION['user'] = $user;
                echo
                '<script>alert("Login Success sebagai Customer Service"); window.location = "../page/dashboardPageCS.php"</script>';
            }
        }else{
            echo
            '<script>
            alert("Email or Password Invalid");
            window.location = "../page/loginPage.php"
            </script>';
        }
    }else{
        echo
            '<script>
            alert("Email or Password Invalid");
            window.location = "../page/loginPage.php"
            </script>';
    }
} else {
    echo
        '<script>
        window.history.back()
        </script>';
}