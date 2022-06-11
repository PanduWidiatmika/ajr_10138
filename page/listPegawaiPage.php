<?php
include '../component/sidebarAdministrasi.php'



?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >DAFTAR PEGAWAI</h4>
        <hr>

            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Role</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <form action="./listPegawaiPage.php" method="post">
                <input type="search" class="form-control" id="NAMA_PEGAWAI" name="NAMA_PEGAWAI" placeholder="Search by Nama Pegawai" aria-describedby="emailHelp">
                <button type="submit" hidden class="btn btn success" name="search">Search</button>
            </form>

            <tbody>
                <?php

                if(isset($_POST['search'])){
                    include('../db.php');

                    $NAMA_PEGAWAI=$_POST['NAMA_PEGAWAI'];

                    $query = mysqli_query($con, "SELECT * FROM pegawai pgw JOIN role r ON (pgw.ID_ROLE=r.ID_ROLE) WHERE NAMA_PEGAWAI LIKE '%$NAMA_PEGAWAI%'") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT * FROM pegawai pgw JOIN role r ON (pgw.ID_ROLE=r.ID_ROLE)") or die(mysqli_error($con));
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
                            <td>'.$data['NAMA_ROLE'].'</td>
                            <td>'.$data['NAMA_PEGAWAI'].'</td>
                            <td>'.$data['TGL_LAHIR_PEGAWAI'].'</td>
                            <td>'.$data['EMAIL_PEGAWAI'].'</td>
                            <td>'.$data['JENIS_KELAMIN_PEGAWAI'].'</td>
                            <td>'.$data['NO_TELP_PEGAWAI'].'</td>
                            <td>'.$data['ALAMAT_PEGAWAI'].'</td>
                            <td>
                                <a href="./editPegawaiPage.php?ID_PEGAWAI='.$data['ID_PEGAWAI'].'"><i style="color: green" class="fa fa-edit"></i></a>
                                <a href="../process/deletePegawaiProcess.php?ID_PEGAWAI='.$data['ID_PEGAWAI'].'"
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