<?php
    include '../component/sidebarCustomer.php';
    $user=$_SESSION['user'];
    $querycek= mysqli_query($con, "SELECT * FROM transaksi WHERE ID_CUSTOMER='$user[ID_CUSTOMER]' AND STATUS_TRANSAKSI!='Selesai' ") or die(mysqli_error($con));

    if(mysqli_num_rows($querycek)==0){

    }else{
        // $querycek1= mysqli_query($con, "SELECT * FROM transaksi WHERE ID_CUSTOMER='$user[ID_CUSTOMER]' AND STATUS_TRANSAKSI='Belum membayar' ") or die(mysqli_error($con));
        // $querycek2= mysqli_query($con, "SELECT * FROM transaksi WHERE ID_CUSTOMER='$user[ID_CUSTOMER]' AND STATUS_TRANSAKSI='Belum diverifikasi' ") or die(mysqli_error($con));
        // if(mysqli_num_rows($querycek1)!=0){
        //     //masuk ke menu pembayaran
        // }else if(mysqli_num_rows($querycek2)!=0){
        //     //masuk ke menu edit
        // }
        echo'<script>
        alert("Sedang ada transaksi yang berjalan"); window.location = "./listTransaksiCustPage.php"
        </script>';
    }
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >TAMBAH TRANSAKSI</h4>
        <hr>
        <form action="../process/createTransaksiProcess.php" method="post">
        <input type="hidden" name="id_customer" value="<?php echo $user['ID_CUSTOMER']; ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Customer</label>
                <input class="form-control" aria-describedby="emailHelp" disabled value="<?php echo $user['ID_CUSTOMER'] ?> - <?php echo $user['NAMA_CUSTOMER'] ?>"/>
                
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Mobil</label>
               
                <select class="form-select" aria-label="Default select example" name="id_mobil" id="id_mobil" required>
                    <?php
                        include('../db.php');

                        $query = mysqli_query($con, "SELECT ID_MOBIL, NAMA_MOBIL, HARGA_SEWA FROM mobil") or die(mysqli_error($con));

                        echo '<option value="" selected hidden>Pilih Mobil</option>';

                        while($query2 = mysqli_fetch_array($query)) {
                            echo '<option value="'.$query2[0].'">'.$query2[1].' - Rp. '.$query2[2].'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Driver</label>
               
                <select class="form-select" aria-label="Default select example" name="id_driver" id="id_driver">
                    <?php
                        include('../db.php');

                        $query = mysqli_query($con, "SELECT ID_DRIVER, NAMA_DRIVER, RERATA_RATING_DRIVER FROM driver") or die(mysqli_error($con));

                        echo '<option value="" selected hidden>Pilih Driver</option>';

                        while($query2 = mysqli_fetch_array($query)) {
                            echo '<option value="'.$query2[0].'">'.$query2[0].' - '.$query2[1].' - '.$query2[2].'*</option>';
                        }
                    ?>
                </select>
             <small style="color:red">Pilih jika ingin memakai driver</small>
            </div>
            <!-- <div class="d-grid gap-2">
                <button id="btnDriver" name="btnDriver" onclick="window.location.href = '../process/automaticDriverProcess.php'" type="button" class="btn btn-primary btn-sm mt-2">Automatic Driver</button>
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Sewa</label>
                <input type="datetime-local" class="form-control" id="mulai" name="mulai" aria-describedby="emailHelp" required min="<?php echo date("Y-m-d\TH:i"); ?>"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Sewa</label>
                <input type="datetime-local" class="form-control" id="selesai" name="selesai" aria-describedby="emailHelp" required min="<?php echo date("Y-m-d\TH:i"); ?>"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Pilih Promo</label>
               
                <select class="form-select" aria-label="Default select example" name="id_promo" id="id_promo" >
                    <?php
                        include('../db.php');

                        $query = mysqli_query($con, "SELECT ID_PROMO, KODE_PROMO, KETERANGAN_PROMO FROM promo WHERE STATUS_PROMO='Aktif' ") or die(mysqli_error($con));

                        echo '<option value="" selected hidden>Pilih Promo</option>';

                        while($query2 = mysqli_fetch_array($query)) {
                            echo '<option value="'.$query2[0].'">'.$query2[0].' - '.$query2[1].' - '.$query2[2].'</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="tambahTransaksi">Tambah Transaksi</button>
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