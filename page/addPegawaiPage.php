<?php
    include '../component/sidebarAdministrasi.php'
?>
    <div class="container p-3 m-4 h-100" style="background-color: #FFFFFF; border-top: 5px solid #17337A; box-shadow: 2px 3px 10px #888888;" >
        <h4 >TAMBAH PEGAWAI</h4>
        <hr>
        <form action="../process/createPegawaiProcess.php" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Role / Jabatan</label>
                <select class="form-select" aria-label="Default select example" name="role" id="role" required>
                <option hidden></option>
                <option value="1">Manager</option>
                <option value="2">Administrasi</option>
                <option value="3">Customer Service</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="nama" name="nama" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
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
                <label for="exampleInputEmail1" class="form-label">Foto (dalam url)</label>
                <input class="form-control" id="foto" name="foto" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Alamat</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="tambahPegawai">Tambah Pegawai</button>
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