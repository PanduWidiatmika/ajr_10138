<?php
    include '../component/sidebarManager.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_PROMO'];
    $query = mysqli_query($con, "SELECT * FROM promo WHERE ID_PROMO = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT PROMO</h4>
        <hr>
        <form action="../process/editPromoProcess.php?ID_PROMO='.$data['ID_PROMO'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode Promo</label>
                <input class="form-control" id="kode" name="kode" aria-describedby="emailHelp" value="'.$data['KODE_PROMO'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Promo</label>
                <input class="form-control" id="jenis" name="jenis" aria-describedby="emailHelp" value="'.$data['JENIS_PROMO'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Keterangan Promo</label>
                <input class="form-control" id="ket" name="ket" aria-describedby="emailHelp" value="'.$data['KETERANGAN_PROMO'].'">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status Promo</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                <option value="Aktif" ';
                if($data['STATUS_PROMO'] == 'Aktif'){
                     echo 'selected';}echo'>Aktif</option>
                <option value="Aktif"'; if($data['STATUS_PROMO'] == 'Tidak Aktif'){
                    echo 'selected';}echo'>Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Diskon Promo (%)</label>
                <input class="form-control" id="disc" name="disc" aria-describedby="emailHelp" value="'.$data['DISKON_PROMO'].'">
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editPromo" onClick="return confirm ( \'Yakin?\')">Submit Promo</button>
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