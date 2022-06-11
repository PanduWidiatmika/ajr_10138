<?php
include '../component/sidebarAdministrasi.php'



?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >DAFTAR MOBIL MITRA</h4>
        <hr>

            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">ID Mitra</th>
                <th scope="col">Nama</th>
                <th scope="col">Plat Nomor</th>
                <th scope="col">Periode Kontrak Mulai</th>
                <th scope="col">Periode Kontrak Berakhir</th>
                <th scope="col">Durasi Kontrak</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <form action="./listMobilMitraPage.php" method="post">
                <input type="search" class="form-control" id="nama" name="nama" placeholder="Search by Nama Mobil" aria-describedby="emailHelp">
                <button type="submit" hidden class="btn btn success" name="search">Search</button>
            </form>

            <tbody>
                <?php

                if(isset($_POST['search'])){
                    include('../db.php');

                    $nama=$_POST['nama'];

                    $query = mysqli_query($con, "SELECT *, DATEDIFF(PERIODE_KONTRAK_BERAKHIR,CURDATE()) AS DURASI FROM mobil WHERE NAMA_MOBIL LIKE '%$nama%' AND KATEGORI_ASET='Mitra' ORDER BY DURASI ASC") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT *, DATEDIFF(PERIODE_KONTRAK_BERAKHIR,CURDATE()) AS DURASI FROM mobil WHERE KATEGORI_ASET='Mitra' ORDER BY DURASI ASC") or die(mysqli_error($con));
                }

                //$query = mysqli_query($con, "SELECT * FROM mobil") or die(mysqli_error($con));

                if (mysqli_num_rows($query) == 0) {
                    echo '<tr> <td colspan="7"> Tidak ada data </td> </tr>';
                }else{
                    $no = 1;
                    while($data = mysqli_fetch_assoc($query)){
                    echo'
                        <tr>
                            <th scope="row">'.$no.'</th>
                            <td>'.$data['ID_PEMILIK'].'</td>
                            <td>'.$data['NAMA_MOBIL'].'</td>
                            <td>'.$data['PLAT_NOMOR_MOBIL'].'</td>
                            <td>'.$data['PERIODE_KONTRAK_MULAI'].'</td>
                            <td>'.$data['PERIODE_KONTRAK_BERAKHIR'].'</td>';
                            if($data['DURASI']<=30){
                                echo '<td style="color:red"><b>'.$data['DURASI'].' Hari</b></td>';
                            }else{
                                echo '<td>'.$data['DURASI'].' Hari</td>';
                            }
                            echo'
                            <td>
                                <a href="./editMobilMitraPage.php?ID_MOBIL='.$data['ID_MOBIL'].'"><i style="color: green" class="fa fa-calendar-plus-o"></i></a>
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