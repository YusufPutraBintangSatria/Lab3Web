<?php
// memanggil koneksi database
require_once("koneksi.php");

// query untuk menampilkan data barang
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);

$no = 1;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" />
</head>

<body>
    <h1 class="py-2 px-3 text-center" style="background-color: #1E90FF; color: white;">Data Barang</h1>

    <div class="container">
        <div class="mt-4">
            <a href="tambah.php" class="btn btn-success btn-sm mb-4 float-end">Tambah Barang</a>
            <table class="table table-sm table-bordered">
                <tr class="text-center fw-bold text-uppercase">
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no;
                                                $no++ ?></td>
                        <td class="text-center"><img src="gambar/<?= $row['gambar'] ?>" alt="<?= $row['nama']; ?>" width="100px" /></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td>Rp. <?php echo $row['harga_beli']; ?></td>
                        <td>Rp. <?php echo $row['harga_jual']; ?></td>
                        <td><?php echo $row['stok']; ?></td>
                        <td class="text-center">
                            <a href="ubah.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-warning btn-sm mx-1">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id_barang']; ?>" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>