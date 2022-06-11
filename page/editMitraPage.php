<?php
    include '../component/sidebarAdministrasi.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_PEMILIK'];
    $query = mysqli_query($con, "SELECT * FROM mitra WHERE ID_PEMILIK = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT MITRA</h4>
        <hr>
        <form action="../process/editMitraProcess.php?ID_PEMILIK='.$data['ID_PEMILIK'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">No KTP</label>
                <input class="form-control" id="ktp" name="ktp" aria-describedby="emailHelp" value="'.$data['NO_KTP_PEMILIK'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="'.$data['NAMA_PEMILIK'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="notelp" name="notelp" aria-describedby="emailHelp" value="'.$data['NO_TELP_PEMILIK'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="'.$data['ALAMAT_PEMILIK'].'">
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editMitra" onClick="return confirm ( \'Yakin?\')">Submit Mitra</button>
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