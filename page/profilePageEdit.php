<?php
    include '../component/sidebarCustomer.php';
    
    $id = $_GET['ID_CUSTOMER'];
    $query = mysqli_query($con, "SELECT * FROM customer WHERE ID_CUSTOMER = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);
?>

<div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
        <h4 >EDIT PROFILE</h4>
        <hr>
        <?php echo'
        <form action="../process/profileEditProcess.php?ID_CUSTOMER='.$data['ID_CUSTOMER'].'" method="post">'?>
        <input type="hidden" name="id" value="<?php echo $data['ID_CUSTOMER'];?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?=$data["NAMA_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?=$data["EMAIL_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" value="<?=$data["ALAMAT_LENGKAP_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input class="form-control" type="date" id="tanggal_lahir" name="tanggal_lahir" aria-describedby="emailHelp" value="<?=$data["TANGGAL_LAHIR_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default  select  example" name="jenis_kelamin" id="jenis_kelamin" >
                <?php
                echo'<option value="Laki-Laki" '; 
                if($data['JENIS_KELAMIN_CUSTOMER'] == 'Laki-Laki'){
                     echo 'selected';}echo'>Laki-Laki</option>
                <option value="Perempuan"'; if($data['JENIS_KELAMIN_CUSTOMER'] == 'Perempuan'){
                    echo 'selected';}echo'>Perempuan</option>'
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="notelp" name="notelp" aria-describedby="emailHelp" value="<?=$data["NO_TELP_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanda Pengenal</label>
                <select class="form-select" aria-label="Default  select  example" name="tanda_pengenal" id="tanda_pengenal" >
                <?php
                echo'<option value="KTP" '; 
                if($data['TANDA_PENGENAL_CUSTOMER'] == 'KTP'){
                     echo 'selected';}echo'>KTP</option>
                <option value="Kartu Pelajar"'; if($data['TANDA_PENGENAL_CUSTOMER'] == 'Kartu Pelajar'){
                    echo 'selected';}echo'>Kartu Pelajar</option>'
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor SIM</label>
                <input class="form-control" id="sim" name="sim" aria-describedby="emailHelp" value="<?=$data["NO_SIM_CUSTOMER"];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="edit">SUBMIT</button>
            </div>
            </form>
    </div>
    </aside>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<!-- <?php var_dump($data); ?> -->
