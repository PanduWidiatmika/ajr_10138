<?php
    include '../component/sidebarAdministrasi.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >TAMBAH MOBIL</h4>
        <hr>
        <form action="../process/createMobilProcess.php" method="post">

        <input type="date" class="form-control visually-hidden" id="mulaikontraks" name="mulaikontrak" aria-describedby="emailHelp" value="0000-00-00"/>
        <input type="date" class="form-control visually-hidden" id="selesaikontraks" name="selesaikontrak" aria-describedby="emailHelp" value="0000-00-00"/>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor STNK</label>
                <input class="form-control" id="stnk" name="stnk" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                <select class="form-select" aria-label="Default select example" name="transmisi" id="transmisi">
                <option hidden></option>
                <option value="AT">AT</option>
                <option value="CVT">CVT</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                <select class="form-select" aria-label="Default select example" name="jenisbb" id="jenisbb">
                <option hidden></option>
                <option value="Pertamax">Pertamax</option>
                <option value="Pertalite">Pertalite</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                <input class="form-control" id="volbb" name="volbb" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kapasitas Penumpang</label>
                <input class="form-control" id="kapasitas" name="kapasitas" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna</label>
                <input class="form-control" id="warna" name="warna" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Plat Mobil</label>
                <input class="form-control" id="plat" name="plat" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kategori Aset</label>
                <select class="form-select" aria-label="Default select example" name="aset" id="aset" onchange="asetFunction()">
                <option hidden></option>
                <option value="Perusahaan">Perusahaan</option>
                <option value="Mitra">Mitra</option>
                
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID Mitra (diisi jika aset milik mitra)</label>
                <input class="form-control" id="id_mitra" name="id_mitra" aria-describedby="emailHelp">
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Mitra</label>
               
                <select class="form-select" aria-label="Default select example" name="id_pemilik" id="id_pemilik" disabled>
                    <?php
                        include('../db.php');

                        $query = mysqli_query($con, "SELECT ID_PEMILIK, NAMA_PEMILIK FROM mitra") or die(mysqli_error($con));

                        echo '<option value="" selected hidden>Pilih Mitra</option>';

                        while($query2 = mysqli_fetch_assoc($query)) {
                            echo '<option value="'.$query2['ID_PEMILIK'].'">'.$query2['ID_PEMILIK'].' - '.$query2['NAMA_PEMILIK'].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fasilitas Mobil</label>
                <input class="form-control" id="fasilitas" name="fasilitas" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option hidden></option>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Periode Kontrak Mulai</label>
                <input type="date" class="form-control" id="mulaikontrak" name="mulaikontrak" aria-describedby="emailHelp" disabled/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Periode Kontrak Berakhir</label>
                <input type="date" class="form-control" id="selesaikontrak" name="selesaikontrak" aria-describedby="emailHelp" disabled/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Servis</label>
                <input type="date" class="form-control" id="tglservis" name="tglservis" aria-describedby="emailHelp"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                <select class="form-select" aria-label="Default select example" name="tipe" id="tipe">
                <option hidden></option>
                <option value="SUV">SUV</option>
                <option value="Sedan">Sedan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                <input class="form-control" id="volbagasi" name="volbagasi" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input class="form-control" id="harga" name="harga" aria-describedby="emailHelp">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="tambahMobil">Tambah Mobil</button>
            </div>
            </form>
        </div>
        </aside>
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
        MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="../script.js"></script>
    </body>
</html>