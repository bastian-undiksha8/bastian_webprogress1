<div class="row">
    <div class="pull-left">
        <h4>Daftar Buku</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=buku&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>JUDUL</td>
                <td>KODE</td>
                <th>PENGARANG</th>
                <th>TAHUN TERBIT</th>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if ($buku != NULL) {
                $no = 1;
                foreach ($buku as $row) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['kode_buku'] ?></td>
                        <td><?= $row['judul_buku']; ?></td>
                        <td><?= $row['penulis_buku'] ?></td>
                        <td><?= $row['stok'] ?></td>
                        <td>
                            <a href="index.php?mod=buku&page=edit&id=<?= $row['id_buku'] ?>"><i class="fa fa-pencil"></i> </a> -->
                            <a href="index.php?mod=buku&page=delete&id=<?= $row['id_buku'] ?>"><i class="fa fa-trash"></i> </a> -->
                        </td>
                    </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>