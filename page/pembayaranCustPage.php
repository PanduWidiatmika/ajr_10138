<?php
    include '../component/sidebarCustomer.php'
?>
<?php
    include '../db.php';
    $id = $_GET['ID_TRANSAKSI'];
    $query = mysqli_query($con, "SELECT *, (t.SUBTOTAL_PEMBAYARAN-t.DISKON_PEMBAYARAN+t.BIAYA_EKSTENSI_PEMBAYARAN) AS TOTAL_PEMBAYARAN FROM transaksi t LEFT JOIN driver d ON(t.ID_DRIVER=d.ID_DRIVER) JOIN mobil m ON(t.ID_MOBIL=m.ID_MOBIL) JOIN customer c ON(t.ID_CUSTOMER=c.ID_CUSTOMER) LEFT JOIN promo p ON(t.ID_PROMO=p.ID_PROMO) WHERE ID_TRANSAKSI = $id") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);
    // $tgl_waktu_mulai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_MULAI_SEWA']));
    // $tgl_waktu_selesai=date('Y-m-d\TH:i:s', strtotime($data['TGL_WAKTU_SELESAI_SEWA']));

    echo '
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >PEMBAYARAN</h4>
        <hr>
        <form action="../process/pembayaranCustProcess.php?ID_TRANSAKSI='.$data['ID_TRANSAKSI'].'" method="post">
            <table>
                <tr>
                    <td>
                        <h5>Nama customer</h5>
                    </td>
                    <td>
                        <h5>: '.$data['NAMA_CUSTOMER'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Mobil</h5>
                    </td>
                    <td>
                        <h5>: '.$data['NAMA_MOBIL'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Driver</h5>
                    </td>
                    <td>
                        <h5>: '.$data['NAMA_DRIVER'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Promo</h5>
                    </td>
                    <td>
                        <h5>: '.$data['KODE_PROMO'].' - '.$data['DISKON_PROMO'].'%</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Tanggal Mulai Sewa</h5>
                    </td>
                    <td>
                        <h5>: '.$data['TGL_WAKTU_MULAI_SEWA'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Tanggal Selesai Sewa</h5>
                    </td>
                    <td>
                        <h5>: '.$data['TGL_WAKTU_SELESAI_SEWA'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Tanggal Pengembalian</h5>
                    </td>
                    <td>
                        <h5>: '.$data['TGL_WAKTU_PENGEMBALIAN'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Biaya Ekstensi</h5>
                    </td>
                    <td>
                        <h5>: Rp. '.$data['BIAYA_EKSTENSI_PEMBAYARAN'].'</h5>
                    </td>
                    <td>
                        <small style="color:red">*jika keterlambatan pengembalian mobil lebih dari 3 jam</small>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Subtotal Pembayaran</h5>
                    </td>
                    <td>
                        <h5>: Rp. '.$data['SUBTOTAL_PEMBAYARAN'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Diskon Pembayaran</h5>
                    </td>
                    <td>
                        <h5>: Rp. '.$data['DISKON_PEMBAYARAN'].'</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Total Pembayaran</h5>
                    </td>
                    <td>
                        <h5>: Rp. '.$data['TOTAL_PEMBAYARAN'].'</h5>
                    </td>
                </tr>
            </table>
            ';
            
            // <div class="mb-3">
            //     <label for="exampleInputEmail1" class="form-label">Promo</label>
            //     <input class="form-control" aria-describedby="emailHelp" disabled value="'.$data['ID_PROMO'].' - '.$data['KODE_PROMO'].' - '.$data['DISKON_PROMO'].'%"/>
            // </div>
?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Metode Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="metode" id="metode" required>
                <option hidden></option>
                <option value="Tunai">Tunai</option>
                <option value="Non-Tunai">Non-Tunai</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jumlah Pembayaran</label>
                <input class="form-control" id="jumlah" name="jumlah" aria-describedby="emailHelp">
            </div>
            <?php if(empty($data['ID_DRIVER'])){

            }else{
                echo'
                <p>Rating Driver:</p>
                <input type="radio" id="rating_driver" name="rating_driver" value="1" required>
                <label for="1">⭐</label>&nbsp
                <input type="radio" id="rating_driver" name="rating_driver" value="2">
                <label for="2">⭐⭐</label>&nbsp
                <input type="radio" id="rating_driver" name="rating_driver" value="3">
                <label for="3">⭐⭐⭐</label>&nbsp
                <input type="radio" id="rating_driver" name="rating_driver" value="4">
                <label for="4">⭐⭐⭐⭐</label>&nbsp
                <input type="radio" id="rating_driver" name="rating_driver" value="5">
                <label for="5">⭐⭐⭐⭐⭐</label>&nbsp
                
                <br><br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Penilaian Driver</label>
                    <input class="form-control" id="penilaian_driver" name="penilaian_driver" aria-describedby="emailHelp" required>
                </div>
                ';
            } ?>
            
            <p>Rating Rental:</p>
            <input type="radio" id="rating_rental" name="rating_rental" value="1" required>
            <label for="1">⭐</label>&nbsp
            <input type="radio" id="rating_rental" name="rating_rental" value="2">
            <label for="2">⭐⭐</label>&nbsp
            <input type="radio" id="rating_rental" name="rating_rental" value="3">
            <label for="3">⭐⭐⭐</label>&nbsp
            <input type="radio" id="rating_rental" name="rating_rental" value="4">
            <label for="4">⭐⭐⭐⭐</label>&nbsp
            <input type="radio" id="rating_rental" name="rating_rental" value="5">
            <label for="5">⭐⭐⭐⭐⭐</label>&nbsp
            <br><br>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Penilaian Rental</label>
                <input class="form-control" id="penilaian_rental" name="penilaian_rental" aria-describedby="emailHelp" required>
            </div>
<?php
            echo'
            
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success" name="pembayaran">Lakukan Pembayaran</button>
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