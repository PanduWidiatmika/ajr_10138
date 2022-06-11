<?php
include '../component/sidebarCS.php';


?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >TRANSAKSI CUSTOMER</h4>
        <hr>

            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">ID Transaksi</th>
                <th scope="col">Nama Driver</th>
                <th scope="col">Mobil</th>
                <th scope="col">Tanggal Mulai Sewa</th>
                <th scope="col">Tanggal Selesai Sewa</th>
                <th scope="col">Status Transaksi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <!-- <form action="./listJadwalPage.php" method="post">
                <input type="search" class="form-control" id="nama" name="nama" placeholder="Search by Nama Pegawai" aria-describedby="emailHelp">
                <button type="submit" hidden class="btn btn success" name="search">Search</button>
            </form> -->

            <tbody>
                <?php

                // if(isset($_POST['search'])){
                //     include('../db.php');

                //     $nama=$_POST['nama'];

                //     $query = mysqli_query($con, "SELECT * FROM detail_jadwal dj JOIN pegawai p ON (dj.ID_PEGAWAI=p.ID_PEGAWAI) JOIN role r ON (p.ID_ROLE=r.ID_ROLE) JOIN jadwal j ON(dj.ID_JADWAL=j.ID_JADWAL) WHERE p.NAMA_PEGAWAI LIKE '%$nama%'") or die(mysqli_error($con));
                // }else{
                //     $query = mysqli_query($con, "SELECT * FROM detail_jadwal dj JOIN pegawai p ON (dj.ID_PEGAWAI=p.ID_PEGAWAI) JOIN role r ON (p.ID_ROLE=r.ID_ROLE) JOIN jadwal j ON(dj.ID_JADWAL=j.ID_JADWAL)") or die(mysqli_error($con));
                // }

                $query = mysqli_query($con, "SELECT * FROM transaksi t LEFT JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER) JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL) WHERE STATUS_TRANSAKSI='Belum diverifikasi'") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data['TRANSAKSI_FORM'].''.$data['ID_TRANSAKSI'].'</td>
                            <td>'.$data['NAMA_DRIVER'].'</td>
                            <td>'.$data['NAMA_MOBIL'].'</td>
                            <td>'.$data['TGL_WAKTU_MULAI_SEWA'].'</td>
                            <td>'.$data['TGL_WAKTU_SELESAI_SEWA'].'</td>
                            <td>'.$data['STATUS_TRANSAKSI'].'</td>
                            <td>
                                <a href="./editTransaksiCSPage.php?ID_TRANSAKSI='.$data['ID_TRANSAKSI'].'"><i style="color: green" class="fa fa-check-square-o"></i></a>
                                <a href="../process/deleteTransaksiCSProcess.php?ID_TRANSAKSI='.$data['ID_TRANSAKSI'].'"
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