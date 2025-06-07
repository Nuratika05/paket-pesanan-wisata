<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Daftar Pesanan Wisata</title>

</head>
<body>
    <header class=" text-center">
          <h1 class="heading">Daftar Paket Pesanan Wisata</h1>
            <a href="form-pemesanan-tiket.php" class="btn btn-primary my-2">Tambah Pesanan</a>
          </p>
    </header> 
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No Telepon</th>
                    <th>Jumlah Peserta</th>
                    <th>Jumlah Hari</th>
                    <th>Akomodasi</th>
                    <th>Transportasi</th>
                    <th>Service/Makanan</th>
                    <th>Harga Paket</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("koneksi.php");

                // Ambil data dari tabel pemesanan_tiket
                $wisata = mysqli_query($db, "SELECT * FROM pemesanan_tiket");
                $no=1;
                foreach ($wisata as $row) {
                    echo "<tr>
                            <td>$no</td>
                            <td>" . $row['nama_pemesan'] . "</td>
                            <td>" . $row['no_telpon'] . "</td>
                            <td>" . $row['jumlah_peserta'] . "</td>
                            <td>" . $row['waktu_perjalanan'] . "</td>
                            <td>" . $row['penginapan'] . "</td>
                            <td>" . $row['transportasi'] . "</td>
                            <td>" . $row['makan'] . "</td>
                            <td>" . $row['harga_paket_perjalanan'] . "</td>
                            <td>" . $row['jumlah_tagihan'] . "</td>
                            <td><a href='edit-wisata.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> 
                            <a href='hapus-wisata.php?id=" . $row['id'] . "'class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");' >Hapus</a></td>
                        </tr>";
                        $no++;
                    }
                ?>
            </tbody>
        </table>
</body>
</html>
