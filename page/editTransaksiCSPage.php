<?php
    include '../component/sidebarCS.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_TRANSAKSI'];
    $query = mysqli_query($con, "SELECT * FROM transaksi t JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER) JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL) JOIN customer c ON(t.ID_CUSTOMER=c.ID_CUSTOMER) WHERE ID_TRANSAKSI = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);
    $tgl_waktu_mulai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_MULAI_SEWA']));
    $tgl_waktu_selesai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_SELESAI_SEWA']));

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >VERIFIKASI TRANSAKSI</h4>
        <hr>
        <form action="../process/editTransaksiCSProcess.php?ID_TRANSAKSI='.$data['ID_TRANSAKSI'].'" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Customer</label>
                <input class="form-control" aria-describedby="emailHelp" disabled value="'.$data['ID_CUSTOMER'].' - '.$data['NAMA_CUSTOMER'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobil</label>
                <input class="form-control" aria-describedby="emailHelp" disabled value="'.$data['ID_MOBIL'].' - '.$data['NAMA_MOBIL'].' - Rp. '.$data['HARGA_SEWA'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Driver</label>
                <input class="form-control" aria-describedby="emailHelp" disabled value="'.$data['ID_DRIVER'].' - '.$data['NAMA_DRIVER'].' - Rp. '.$data['TARIF_DRIVER'].'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Mulai Sewa</label>
                <input type="datetime-local" class="form-control" aria-describedby="emailHelp" disabled value="'.$tgl_waktu_mulai.'"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Selesai Sewa</label>
                <input type="datetime-local" class="form-control" aria-describedby="emailHelp" disabled value="'.$tgl_waktu_selesai.'"/>
            </div>
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="editTransaksiCS">Verifikasi Transaksi</button>
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