<?php
    include '../component/sidebarAdministrasi.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_DRIVER'];
    $query = mysqli_query($con, "SELECT * FROM driver WHERE ID_DRIVER = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT DRIVER</h4>
        <hr>
        <form action="../process/editDriverProcess.php?ID_DRIVER='.$data['ID_DRIVER'].'" method="post">
            
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="'.$data['EMAIL_DRIVER'].'">
            </div><div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="'.$data['NAMA_DRIVER'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="'.$data['ALAMAT_LENGKAP_DRIVER'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" aria-describedby="emailHelp" value="'.$data['TANGGAL_LAHIR_DRIVER'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jeniskel" id="jeniskel">
                <option value="Laki-laki" ';
                if($data['JENIS_KELAMIN_DRIVER'] == 'Laki-laki'){
                     echo 'selected';}echo'>Laki-Laki</option>
                <option value="Perempuan"'; if($data['JENIS_KELAMIN_DRIVER'] == 'Perempuan'){
                    echo 'selected';}echo'>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="notelp" name="notelp" aria-describedby="emailHelp" value="'.$data['NO_TELP_DRIVER'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                <select class="form-select" aria-label="Default select example" name="bahasa" id="bahasa">
                <option value="1" ';
                if($data['BAHASA_DRIVER'] == '1'){
                     echo 'selected';}echo'>Indonesia</option>
                <option value="2"'; if($data['BAHASA_DRIVER'] == '2'){
                    echo 'selected';}echo'>Inggris</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option value="Aktif" ';
                if($data['STATUS_DRIVER'] == 'Aktif'){
                     echo 'selected';}echo'>Aktif</option>
                <option value="Tidak Aktif"'; if($data['STATUS_DRIVER'] == 'Tidak Aktif'){
                    echo 'selected';}echo'>Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tarif</label>
                <input class="form-control" id="tarif" name="tarif" aria-describedby="emailHelp" value="'.$data['TARIF_DRIVER'].'">
            </div>';
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Rerata Rating</label>
            //     <input class="form-control" id="rating" name="rating" aria-describedby="emailHelp" value="'.$data['RERATA_RATING_DRIVER'].'">
            // </div>
            echo'

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM</label>
                <input class="form-control" id="sim" name="sim" aria-describedby="emailHelp" required placeholder="Dalam bentuk url" value="'.$data['SIM_DRIVER'].'">
                <div class="col-md-12" style="margin-top:10px">
                    <img src="'.$data['SIM_DRIVER'].'" style="width: 200px">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NAPZA</label>
                <input class="form-control" id="napza" name="napza" aria-describedby="emailHelp" required placeholder="Dalam bentuk url" value="'.$data['NAPZA_DRIVER'].'">
                <div class="col-md-12" style="margin-top:10px">
                    <img src="'.$data['NAPZA_DRIVER'].'" style="width: 200px">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jiwa</label>
                <input class="form-control" id="surat_jiwa" name="surat_jiwa" aria-describedby="emailHelp" required placeholder="Dalam bentuk url" value="'.$data['SURAT_JIWA_DRIVER'].'">
                <div class="col-md-12" style="margin-top:10px">
                    <img src="'.$data['SURAT_JIWA_DRIVER'].'" style="width: 200px">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jasmani</label>
                <input class="form-control" id="surat_jasmani" name="surat_jasmani" aria-describedby="emailHelp" required placeholder="Dalam bentuk url" value="'.$data['SURAT_JASMANI_DRIVER'].'">
                <div class="col-md-12" style="margin-top:10px">
                    <img src="'.$data['SURAT_JASMANI_DRIVER'].'" style="width: 200px">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SKCK</label>
                <input class="form-control" id="skck" name="skck" aria-describedby="emailHelp" required placeholder="Dalam bentuk url" value="'.$data['SKCK_DRIVER'].'">
                <div class="col-md-12" style="margin-top:10px">
                    <img src="'.$data['SKCK_DRIVER'].'" style="width: 200px">
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editDriver" onClick="return confirm ( \'Yakin?\')">Submit Driver</button>
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