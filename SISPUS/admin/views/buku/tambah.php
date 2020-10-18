<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=buku&page=save" method="POST">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">judul buku </label>
            <input type="text" name="judul_buku" required value="<?= (isset($_POST['judul_buku'])) ? $_POST['judul_buku'] : ''; ?>" class="form-control">
            <input type="hidden" name="id_buku" value="<?= (isset($_POST['id_buku'])) ? $_POST['id_buku'] : ''; ?>" class="form-control">
            <span class="text-danger"><?= (isset($err['judul_buku'])) ? $err['judul_buku'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">kode buku</label>
            <input type="number" name="kode_buku" value="<?= (isset($_POST['kode_buku'])) ? $_POST['kode_buku'] : ''; ?>" class="form-control">
            <span class="text-danger"><?= (isset($err['kode_buku'])) ? $err[''] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">PENGARANG</label>
            <input type="text" name="penulis_buku" required value="<?= (isset($_POST['penulis_buku'])) ? $_POST['penulis_buku'] : ''; ?>" class="form-control">
            <span class="text-danger"><?= (isset($err['penulis_buku'])) ? $err['penulis_buku'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">Stock</label>
            <input type="number" name="stok" value="<?= (isset($_POST['stok'])) ? $_POST['stok'] : ''; ?>" class="form-control">
            <span class="text-danger"><?= (isset($err['stok'])) ? $err[''] : ''; ?></span>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>