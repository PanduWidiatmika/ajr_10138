<?php
    include '../component/sidebarAdministrasi.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_MOBIL'];
    $query = mysqli_query($con, "SELECT * FROM mobil WHERE ID_MOBIL = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT MOBIL</h4>
        <hr>
        <form action="../process/editMobilProcess.php?ID_MOBIL='.$data['ID_MOBIL'].'" method="post">
        <input type="date" class="form-control visually-hidden" id="mulaikontraks" name="mulaikontrak" aria-describedby="emailHelp" value="0000-00-00"/>
        <input type="date" class="form-control visually-hidden" id="selesaikontraks" name="selesaikontrak" aria-describedby="emailHelp" value="0000-00-00"/>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor STNK</label>
                <input class="form-control" id="stnk" name="stnk" aria-describedby="emailHelp" value="'.$data['NOMOR_STNK_MOBIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="'.$data['NAMA_MOBIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Transmisi</label>
                <select class="form-select" aria-label="Default select example" name="transmisi" id="transmisi">
                <option value="CVT" ';
                if($data['JENIS_TRANSMISI_MOBIL'] == 'CVT'){
                     echo 'selected';}echo'>CVT</option>
                <option value="AT"'; if($data['JENIS_TRANSMISI_MOBIL'] == 'AT'){
                    echo 'selected';}echo'>AT</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Bahan Bakar</label>
                <select class="form-select" aria-label="Default select example" name="jenisbb" id="jenisbb">
                <option value="Pertamax" ';
                if($data['JENIS_BAHAN_BAKAR_MOBIL'] == 'Pertamax'){
                     echo 'selected';}echo'>Pertamax</option>
                <option value="Pertalite"'; if($data['JENIS_BAHAN_BAKAR_MOBIL'] == 'Pertalite'){
                    echo 'selected';}echo'>Pertalite</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bahan Bakar</label>
                <input class="form-control" id="volbb" name="volbb" aria-describedby="emailHelp" value="'.$data['VOLUME_BAHAN_BAKAR_MOBIIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kapasitas Penumpang</label>
                <input class="form-control" id="kapasitas" name="kapasitas" aria-describedby="emailHelp" value="'.$data['KAPASITAS_PENUMPANG_MOBIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Warna Mobil</label>
                <input class="form-control" id="warna" name="warna" aria-describedby="emailHelp" value="'.$data['WARNA_MOBIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Plat</label>
                <input class="form-control" id="plat" name="plat" value="'.$data['PLAT_NOMOR_MOBIL'].'">
            </div>';
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Kategori Aset</label>
            //     <select class="form-select" aria-label="Default select example" name="aset" id="aset">
            //     <option value="Perusahaan" ';
            //     if($data['KATEGORI_ASET'] == 'Perusahaan'){
            //          echo 'selected';}echo'>Perusahaan</option>
            //     <option value="Mitra"'; if($data['KATEGORI_ASET'] == 'Mitra'){
            //         echo 'selected';}echo'>Mitra</option>
            //     </select>
            // </div>
            
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">ID Mitra (diisi jika aset milik mitra)</label>
            //     <input class="form-control" id="id_mitra" name="id_mitra" value="'.$data['ID_PEMILIK'].'">
            // </div>
            echo'
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fasilitas</label>
                <input class="form-control" id="fasilitas" name="fasilitas" value="'.$data['FASILITAS_MOBIL'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Mobil</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option value="Tersedia" ';
                if($data['STATUS_MOBIL'] == 'Tersedia'){
                     echo 'selected';}echo'>Tersedia</option>
                <option value="Tidak Tersedia"'; if($data['STATUS_MOBIL'] == 'Tidak Tersedia'){
                    echo 'selected';}echo'>Tidak Tersedia</option>
                </select>
            </div>';
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Periode Kontrak Mulai</label>
            //     <input type="date" class="form-control" id="mulaikontrak" name="mulaikontrak" aria-describedby="emailHelp" value="'.$data['PERIODE_KONTRAK_MULAI'].'"/>
            // </div>
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Periode Kontrak Berakhir</label>
            //     <input type="date" class="form-control" id="selesaikontrak" name="selesaikontrak" aria-describedby="emailHelp" value="'.$data['PERIODE_KONTRAK_BERAKHIR'].'"/>
            // </div>
            echo'
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Servis</label>
                <input type="date" class="form-control" id="tglservis" name="tglservis" aria-describedby="emailHelp" value="'.$data['TGL_TERAKHIR_SERVIS'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipe Mobil</label>
                <select class="form-select" aria-label="Default select example" name="tipe" id="tipe">
                <option value="Sedan" ';
                if($data['TIPE_MOBIL'] == 'Sedan'){
                     echo 'selected';}echo'>Sedan</option>
                <option value="SUV"'; if($data['TIPE_MOBIL'] == 'SUV'){
                    echo 'selected';}echo'>SUV</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Volume Bagasi</label>
                <input type="form-control" class="form-control" id="volbagasi" name="volbagasi" aria-describedby="emailHelp" value="'.$data['VOLUME_BAGASI_MOBIL'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Sewa</label>
                <input type="form-control" class="form-control" id="harga" name="harga" aria-describedby="emailHelp" value="'.$data['HARGA_SEWA'].'"/>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editMobil" onClick="return confirm ( \'Yakin?\')">Submit Mobil</button>
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
';
//  var_dump($data);
?>