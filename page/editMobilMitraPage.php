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
        <h4 >EDIT MITRA</h4>
        <hr>
        <form action="../process/editMobilMitraProcess.php?ID_MOBIL='.$data['ID_MOBIL'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Periode Kontrak Mulai</label>
                <input type="date" class="form-control" id="mulaikontrak" name="mulaikontrak" aria-describedby="emailHelp" value="'.$data['PERIODE_KONTRAK_MULAI'].'" disabled/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Periode Kontrak Berakhir</label>
                <input type="date" class="form-control" id="selesaikontrak" name="selesaikontrak" aria-describedby="emailHelp" value="'.$data['PERIODE_KONTRAK_BERAKHIR'].'"/>
            </div>';
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Tanggal Terakhir Servis</label>
            //     <input type="date" class="form-control" id="tglservis" name="tglservis" aria-describedby="emailHelp" value="'.$data['TGL_TERAKHIR_SERVIS'].'"/>
            // </div>
            echo'
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editMobilMitra">Submit Mobil Mitra</button>
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