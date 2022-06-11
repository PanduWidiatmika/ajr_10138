<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_TRANSAKSI'];
    $query = mysqli_query($con, "SELECT * FROM transaksi t LEFT JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER) JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL) JOIN customer c ON(t.ID_CUSTOMER=c.ID_CUSTOMER) LEFT JOIN promo p ON(t.ID_PROMO=p.ID_PROMO) WHERE ID_TRANSAKSI = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);
    $tgl_waktu_mulai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_MULAI_SEWA']));
    $tgl_waktu_selesai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_SELESAI_SEWA']));

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >EDIT TRANSAKSI</h4>
        <hr>
        <form action="../process/editTransaksiCustProcess.php?ID_TRANSAKSI='.$data['ID_TRANSAKSI'].'" method="post">
        <input type="hidden" name="id_customer" value="'.$data['ID_CUSTOMER'].'">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Customer</label>
                <input class="form-control" aria-describedby="emailHelp" disabled value="'.$data['ID_CUSTOMER'].' - '.$data['NAMA_CUSTOMER'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Mobil</label>
               
                <select class="form-select" aria-label="Default select example" name="id_mobil" id="id_mobil" required>';

                    $querymobil = mysqli_query($con, "SELECT ID_MOBIL, NAMA_MOBIL, HARGA_SEWA FROM mobil WHERE STATUS_MOBIL='Tersedia' ") or die(mysqli_error($con));

                    while($querymobil2 = mysqli_fetch_array($querymobil)) {
                        if($querymobil2[0]==$data['ID_MOBIL']){
                            echo '<option value="'.$querymobil2[0].'" selected >'.$querymobil2[1].' - Rp. '.$querymobil2[2].'</option>';
                        }else{
                            echo '<option value="'.$querymobil2[0].'">'.$querymobil2[1].' - Rp. '.$querymobil2[2].'</option>';
                        }
                        
                    }
                    echo'
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Driver</label>
               
                <select class="form-select" aria-label="Default select example" name="id_driver" id="id_driver" required>';

                    $querydriver = mysqli_query($con, "SELECT ID_DRIVER, NAMA_DRIVER, TARIF_DRIVER FROM driver WHERE STATUS_DRIVER='Aktif' ") or die(mysqli_error($con));

                    while($querydriver2 = mysqli_fetch_array($querydriver)) {
                        if($querydriver2[0]==$data['ID_DRIVER']){
                            echo '<option value="'.$querydriver2[0].'" selected >'.$querydriver2[1].' - Rp. '.$querydriver2[2].'</option>';
                        }else{
                            echo '
                            <option value="" hidden>Pilih Promo</option>
                            <option value="'.$querydriver2[0].'">'.$querydriver2[1].' - Rp. '.$querydriver2[2].'</option>';
                        }
                        
                    }
                    echo'
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Sewa</label>
                <input type="datetime-local" class="form-control" id="mulai" name="mulai" aria-describedby="emailHelp" required value="'.$tgl_waktu_mulai.'" min="'.date("Y-m-d\TH:i").'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Sewa</label>
                <input type="datetime-local" class="form-control" id="selesai" name="selesai" aria-describedby="emailHelp" required value="'.$tgl_waktu_selesai.'" min="'.date("Y-m-d\TH:i").'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Promo</label>
               
                <select class="form-select" aria-label="Default select example" name="id_promo" id="id_promo" >';

                    $querypromo = mysqli_query($con, "SELECT ID_PROMO, KODE_PROMO, DISKON_PROMO FROM promo WHERE STATUS_PROMO='Aktif' ") or die(mysqli_error($con));

                    while($querypromo2 = mysqli_fetch_array($querypromo)) {
                        if($querypromo2[0]==$data['ID_PROMO']){
                            echo '<option value="'.$querypromo2[0].'" selected >'.$querypromo2[1].' - '.$querypromo2[2].'%</option>';
                        }else{
                            
                            echo '
                            <option value="" hidden>Pilih Promo</option>
                            <option value="'.$querypromo2[0].'">'.$querypromo2[1].' - '.$querypromo2[2].'%</option>';
                        }
                        
                    }
                    echo'
                </select>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="editTransaksi" onClick="return confirm ( \'Yakin?\')">Submit Transaksi</button>
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