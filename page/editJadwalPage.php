<?php
    include '../component/sidebarManager.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT JADWAL PEGAWAI</h4>
        <hr>
        <form action="../process/editJadwalProcess.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Pegawai</label>
               
                <select class="form-select" aria-label="Default select example" name="id_pegawai" id="id_pegawai" required>
                    <?php
                        include('../db.php');

                        $id_pegawai=$_GET['ID_PEGAWAI'];
                        $query = mysqli_query($con, "SELECT ID_PEGAWAI, NAMA_PEGAWAI, NAMA_ROLE FROM pegawai JOIN role using (ID_ROLE) WHERE ID_PEGAWAI='$id_pegawai' ") or die(mysqli_error($con));
                        
                        $fetchquery= mysqli_fetch_array($query);

                        echo '<option value="'.$fetchquery[0].'" selected>'.$fetchquery[0].' - '.$fetchquery[1].' - '.$fetchquery[2].'</option>';

                        
                    ?>
                </select>
            </div>

            <?php
                $old_id_jadwal = $_GET['ID_JADWAL'];
            ?>
            <input type="hidden" name="old_id_jadwal" value="<?php echo $old_id_jadwal; ?>" >

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Jadwal</label>

                <select class="form-select" aria-label="Default select example" name="id_jadwal" id="id_jadwal" required>
                    <?php
                        include('../db.php');

                        $id_jadwal=$_GET['ID_JADWAL'];
                        $query3 = mysqli_query($con, "SELECT * from jadwal") or die(mysqli_error($con));
                        $query3temp = mysqli_query($con, "SELECT * from jadwal WHERE ID_JADWAL = '$id_jadwal'") or die(mysqli_error($con));
                        $fetchquery3temp = mysqli_fetch_array($query3temp);

                        echo '<option value="'.$fetchquery3temp[0].'" selected hidden>'.$fetchquery3temp[0].' - '.$fetchquery3temp[1].' - Shift '.$fetchquery3temp[2].'</option>';

                        while($query4 = mysqli_fetch_array($query3)) {
                            echo '<option value="'.$query4[0].'">'.$query4[0].' - '.$query4[1].' - Shift '.$query4[2].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editJadwal" onClick="return confirm ( 'Yakin?')">Submit Jadwal Pegawai</button>
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