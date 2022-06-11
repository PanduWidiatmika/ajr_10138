<?php
    include '../component/sidebarAdministrasi.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_PEGAWAI'];
    $query = mysqli_query($con, "SELECT * FROM pegawai WHERE ID_PEGAWAI = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT PEGAWAI</h4>
        <hr>
        <form action="../process/editPegawaiProcess.php?ID_PEGAWAI='.$data['ID_PEGAWAI'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" name="role" id="role">
                <option value="1" ';
                if($data['ID_ROLE'] == '1'){
                     echo 'selected';}echo'>Manager</option>
                <option value="2"'; if($data['ID_ROLE'] == '2'){
                    echo 'selected';}echo'>Administrasi</option>
                <option value="3"'; if($data['ID_ROLE'] == '3'){
                    echo 'selected';}echo'>Customer Service</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="'.$data['NAMA_PEGAWAI'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="'.$data['EMAIL_PEGAWAI'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" aria-describedby="emailHelp" value="'.$data['TGL_LAHIR_PEGAWAI'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jeniskel" id="jeniskel">
                <option value="Laki-laki" ';
                if($data['JENIS_KELAMIN_PEGAWAI'] == 'Laki-laki'){
                     echo 'selected';}echo'>Laki-Laki</option>
                <option value="Perempuan"'; if($data['JENIS_KELAMIN_PEGAWAI'] == 'Perempuan'){
                    echo 'selected';}echo'>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="notelp" name="notelp" aria-describedby="emailHelp" value="'.$data['NO_TELP_PEGAWAI'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="'.$data['PASSWORD_PEGAWAI'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Foto (dalam url)</label>
                <input class="form-control" id="foto" name="foto" aria-describedby="emailHelp" value="'.$data['FOTO_PEGAWAI'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="'.$data['ALAMAT_PEGAWAI'].'">
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editPegawai" onClick="return confirm ( \'Yakin?\')">Submit Pegawai</button>
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