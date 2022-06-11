<?php
    include ('../db.php');
    include '../component/sidebarCustomer.php';
?>

    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4>MY PROFILE</h4>
        <hr>
            <?php
                $userTemp = $_SESSION['user']['ID_CUSTOMER'];
                $query = mysqli_query($con, "SELECT * FROM customer WHERE ID_CUSTOMER = '$userTemp'") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <h3 style="text-align:center"> ID : '.$data['CUSTOMER_FORM'].''.$data['ID_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> NAMA : '.$data['NAMA_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> EMAIL : '.$data['EMAIL_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> ALAMAT : '.$data['ALAMAT_LENGKAP_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> TANGGAL LAHIR : '.$data['TANGGAL_LAHIR_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> JENIS KELAMIN : '.$data['JENIS_KELAMIN_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> NOMOR TELEPON : '.$data['NO_TELP_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> TANDA PENGENAL : '.$data['TANDA_PENGENAL_CUSTOMER'].'</h3>
                        <h3 style="text-align:center"> NO SIM : '.$data['NO_SIM_CUSTOMER'].'</h3>
                        <br>
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary btn-sm" href="./profilePageEdit.php?ID_CUSTOMER='.$data['ID_CUSTOMER'].'">EDIT PROFILE</a>
                        </div>';
                    }
                } 

            ?>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>