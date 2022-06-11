<?php
include '../component/sidebarAdministrasi.php'



?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >DAFTAR DRIVER</h4>
        <hr>

            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Bahasa</th>
                <th scope="col">Status</th>
                <th scope="col">Tarif</th>
                <th scope="col">Rerata Rating</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <form action="./listDriverPage.php" method="post">
                <input type="search" class="form-control" id="nama" name="nama" placeholder="Search by Nama Driver" aria-describedby="emailHelp">
                <button type="submit" hidden class="btn btn success" name="search">Search</button>
            </form>

            <tbody>
                <?php

                if(isset($_POST['search'])){
                    include('../db.php');

                    $nama=$_POST['nama'];

                    $query = mysqli_query($con, "SELECT * FROM driver WHERE NAMA_DRIVER LIKE '%$nama%'") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT * FROM driver") or die(mysqli_error($con));
                }

                //$query = mysqli_query($con, "SELECT * FROM pegawai") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data['NAMA_DRIVER'].'</td>
                            <td>'.$data['EMAIL_DRIVER'].'</td>
                            <td>'.$data['ALAMAT_LENGKAP_DRIVER'].'</td>
                            <td>'.$data['TANGGAL_LAHIR_DRIVER'].'</td>
                            <td>'.$data['JENIS_KELAMIN_DRIVER'].'</td>
                            <td>'.$data['NO_TELP_DRIVER'].'</td>';
                            if($data['BAHASA_DRIVER']==1){
                                echo '<td>Indonesia</td>';
                            }else{
                                echo '<td>Inggris</td>';
                            }
                            echo'
                            <td>'.$data['STATUS_DRIVER'].'</td>
                            <td>'.$data['TARIF_DRIVER'].'</td>
                            <td>'.$data['RERATA_RATING_DRIVER'].'</td>
                            <td>
                                <a href="./editDriverPage.php?ID_DRIVER='.$data['ID_DRIVER'].'"><i style="color: green" class="fa fa-edit"></i></a>
                                <a href="../process/deleteDriverProcess.php?ID_DRIVER='.$data['ID_DRIVER'].'"
                                    onClick="return confirm ( \'Yakin?\')">
                                    <i style="color: red" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>';
                        $no++;
                        }
                    }
                ?>
            </tbody>
            </table>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>