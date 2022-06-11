<?php
    include '../component/sidebarAdministrasi.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >TAMBAH DRIVER</h4>
        <hr>
        <form action="../process/createDriverProcess.php" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgllahir" name="tgllahir" aria-describedby="emailHelp" required/>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select class="form-select" aria-label="Default select example" name="jeniskel" id="jeniskel" required>
                <option hidden></option>
                <option value="Laki-Laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
                <input class="form-control" id="notelp" name="notelp" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Bahasa</label>
                <select class="form-select" aria-label="Default select example" name="bahasa" id="bahasa" required>
                <option hidden></option>
                <option value="1">Indonesia</option>
                <option value="2">Inggris</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status" required>
                <option hidden></option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tarif</label>
                <input class="form-control" id="tarif" name="tarif" aria-describedby="emailHelp" required>
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rerata Rating</label>
                <input class="form-control" id="rating" name="rating" aria-describedby="emailHelp">
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SIM</label>
                <input class="form-control" id="sim" name="sim" aria-describedby="emailHelp" required placeholder="Dalam bentuk url">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">NAPZA</label>
                <input class="form-control" id="napza" name="napza" aria-describedby="emailHelp" required placeholder="Dalam bentuk url">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jiwa</label>
                <input class="form-control" id="surat_jiwa" name="surat_jiwa" aria-describedby="emailHelp" required placeholder="Dalam bentuk url">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Surat Jasmani</label>
                <input class="form-control" id="surat_jasmani" name="surat_jasmani" aria-describedby="emailHelp" required placeholder="Dalam bentuk url">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SKCK</label>
                <input class="form-control" id="skck" name="skck" aria-describedby="emailHelp" required placeholder="Dalam bentuk url">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="tambahDriver">Tambah Driver</button>
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