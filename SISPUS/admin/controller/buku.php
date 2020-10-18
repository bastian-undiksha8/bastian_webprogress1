<?php
$con->auth();
$conn = $con->koneksi();
switch (@$_GET['page']) {
    case 'add':
        include_once 'views/buku/tambah.php';
        break;
    case 'save':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //validasi
            if (empty($_POST['id_buku'])) {
                $err['id_buku'] = "Nama barang Wajib";
            }
            if (empty($_POST['judul_buku'])) {
                $err['judul_buku'] = "merek Wajib Terisi";
            }
            if (empty($_POST['kode_buku'])) {
                $err['kode_buku'] = "kode barang Wajib Angka";
            }
            if (empty($_POST['penulis_buku'])) {
                $err['penulis_buku'] = "harga Wajib Terisi";
            }
            if (empty($_POST['stok'])) {
                $err['stok'] = "jumlah Wajib Terisi";
            }
            if (!isset($err)) {
                $id_login = $_SESSION['login']['id'];
                if (!empty($_POST['id_buku'])) {
                    //update
                    $sql = "UPDATE tb_buku set nama_buku='$_POST[nama_buku]',kode_buku='$_POST[kode_buku]', judul_buku='$_POST[judul_buku]', penulis_buku='$_POST[penulis_buku]',
                    penerbit_buku='$_POST[penerbit_buku]',id_login=$id_login where kode_buku='$_POST[kode_buku]'";
                } else {
                    //save
                    $sql = "INSERT INTO tb_buku (judul_buku, kode_buku, stok) 
                    VALUES ('$_POST[judul_buku]','$_POST[kode_buku]','$_POST[stok]')";
                }
                if ($conn->query($sql) === TRUE) {
                    header('Location: ' . $con->site_url() . '/admin/index.php?mod=tambah.php');
                } else {
                    $err['msg'] = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            $err['msg'] = "tidak diijinkan";
        }
        if (isset($err)) {
            include_once 'views/buku/tambah.php';
        }
        break;
    case 'edit':
        $buku = "select * from tb_buku where id_buku ='$_GET[id]'";
        $buku = $conn->query($buku);
        $_POST = $buku->fetch_assoc();
        $_POST['nama_buku'] = $_POST['kode_buku'];
        //var_dump($barang);
        $pembeli = $conn->query($sql);
        $content = "views/buku/tambah.php";
        include_once 'views/template.php';
        break;
    case 'delete':
        $buku = "delete from tb_buku where id_buku ='$_GET[id]'";
        $buku = $conn->query($buku);
        header('Location: ' . $con->site_url() . '/admin/index.php?mod=buku');
        break;
    default;
        $sql = "select * from tb_buku";
        $buku = $conn->query($sql);
        $conn->close();
        $content = "views/buku/tampil.php";
        include_once 'views/template.php';
}
