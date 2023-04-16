<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $input = (object) $_POST;

    $nama = ucwords(strtolower($input->nama));
    $kategori = ucwords(strtolower($input->kategori));
    $harga_beli = $input->harga_beli;
    $harga_jual = $input->harga_jual;
    $stok = $input->stok;
    $file_gambar = $_FILES['file_gambar'];
    $gambar = NULL;

    if ($file_gambar['error'] == 0) {
        $nama_gambar = str_replace(' ', '_', $file_gambar['name']);
        $path = dirname(__FILE__) . '/gambar/' . $nama_gambar;

        if (move_uploaded_file($file_gambar['tmp_name'], $path)) {
            $gambar = $nama_gambar;
        }
    }

    $sql = 'INSERT INTO data_barang (nama, kategori,harga_jual, harga_beli,
stok, gambar) ';
    $sql .= "VALUE ('{$nama}', '{$kategori}','{$harga_jual}',
'{$harga_beli}', '{$stok}', '{$gambar}')";
    $result = mysqli_query($conn, $sql);
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row m-0">
            <div class="col-md-5 mx-auto">
                <div class="card mt-3">
                    <div class="card-header text-center">
                        <h1>Tambah Barang</h1>
                    </div>
                    <div class="card-body">
                        <form method="post" action="tambah.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Nama Barang</label>
                                <input type="text" name="nama" />
                            </div>
                            <div class="mb-3">
                                <label>Kategori</label>
                                <select name="kategori">
                                    <option value="Komputer">Komputer</option>
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Hand Phone">Hand Phone</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Harga Jual</label>
                                <input type="text" name="harga_jual" />
                            </div>
                            <div class="mb-3">
                                <label>Harga Beli</label>
                                <input type="text" name="harga_beli" />
                            </div>
                            <div class="mb-3">
                                <label>Stok</label>
                                <input type="text" name="stok" />
                            </div>
                            <div class="mb-3">
                                <label>File Gambar</label>
                                <input type="file" name="file_gambar" />
                            </div>
                            <a href="index.php" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-success" name="submit" type="submit">
                                Tambah
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>