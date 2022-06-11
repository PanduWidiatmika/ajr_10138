<?php
include '../component/sidebarAdministrasi.php'



?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >DAFTAR MOBIL</h4>
        <hr>
        <!-- <form action="listMobilPage.php" method="get">
	        <label>Cari :</label>
	        <input type="text" name="cari">
	        <input type="submit" value="Cari">
        </form>
 
        <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
            }
        ?> -->

            <table class="table ">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor STNK</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Transmisi</th>
                <th scope="col">Jenis Bahan Bakar</th>
                <th scope="col">Volume Bahan Bakar</th>
                <th scope="col">Kapasitas Penumpang</th>
                <th scope="col">Warna</th>
                <th scope="col">Plat Nomor</th>
                <th scope="col">Kategori Aset</th>
                <th scope="col">Fasilitas Mobil</th>
                <th scope="col">Status Mobil</th>
                <!-- <th scope="col">Periode Kontrak Mulai</th>
                <th scope="col">Periode Kontrak Berakhir</th> -->
                <th scope="col">Tanggal Terakhir Servis</th>
                <th scope="col">Tipe Mobil</th>
                <th scope="col">Volume Bagasi</th>
                <th scope="col">Harga sewa</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>

            <form action="./listMobilPage.php" method="post">
                <input type="search" class="form-control" id="nama" name="nama" placeholder="Search by Nama Mobil" aria-describedby="emailHelp">
                <button type="submit" hidden class="btn btn success" name="search">Search</button>
            </form>

            <tbody>
                <?php

                if(isset($_POST['search'])){
                    include('../db.php');

                    $nama=$_POST['nama'];

                    $query = mysqli_query($con, "SELECT * FROM mobil WHERE NAMA_MOBIL LIKE '%$nama%' AND STATUS_MOBIL!='Hilang'") or die(mysqli_error($con));
                }else{
                    $query = mysqli_query($con, "SELECT * FROM mobil WHERE STATUS_MOBIL!='Hilang'") or die(mysqli_error($con));
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
                            <td>'.$data['NOMOR_STNK_MOBIL'].'</td>
                            <td>'.$data['NAMA_MOBIL'].'</td>
                            <td>'.$data['JENIS_TRANSMISI_MOBIL'].'</td>
                            <td>'.$data['JENIS_BAHAN_BAKAR_MOBIL'].'</td>
                            <td>'.$data['VOLUME_BAHAN_BAKAR_MOBIIL'].'</td>
                            <td>'.$data['KAPASITAS_PENUMPANG_MOBIL'].'</td>
                            <td>'.$data['WARNA_MOBIL'].'</td>
                            <td>'.$data['PLAT_NOMOR_MOBIL'].'</td>
                            <td>'.$data['KATEGORI_ASET'].'</td>
                            <td>'.$data['FASILITAS_MOBIL'].'</td>
                            <td>'.$data['STATUS_MOBIL'].'</td>
                            <td>'.$data['TGL_TERAKHIR_SERVIS'].'</td>
                            <td>'.$data['TIPE_MOBIL'].'</td>
                            <td>'.$data['VOLUME_BAGASI_MOBIL'].'</td>
                            <td>'.$data['HARGA_SEWA'].'</td>
                            <td>
                                <a href="./editMobilPage.php?ID_MOBIL='.$data['ID_MOBIL'].'"><i style="color: green" class="fa fa-edit"></i></a>
                                <a href="../process/deleteMobilProcess.php?ID_MOBIL='.$data['ID_MOBIL'].'"
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