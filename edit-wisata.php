<?php
    include 'koneksi.php';
    $id = $_GET['id'];
    $wisata = mysqli_query($db, "SELECT * FROM pemesanan_tiket where id=$id");
    $data = mysqli_fetch_array($wisata);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit Pemesanan Paket Wisata</title>
</head>
<body>
<header class=" text-center">
          <h2 class="heading">Edit Paket Pesanan Wisata</h2>
    </header> 
    <div class="container mt-4">
    <form action="proses-update.php" method="POST" onsubmit="return validateForm()">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <p>
                <label for="nama_pemesan">Nama Pemesan:</label>
                <input type="text" name="nama_pemesan" class="form-control" value="<?php echo htmlspecialchars($data['nama_pemesan']); ?>" autofocus required>
            </p>
            <p>
                <label for="no_telpon">No Hp/Telp:</label>
                <input type="tel" name="no_telpon" class="form-control" value="<?php echo htmlspecialchars($data['no_telpon']); ?>" required>
            </p>
            <p>
                <label for="tanggal_pesan">Tanggal Pesan:</label>
                <input type="date" name="tanggal_pesan" class="form-control" value="<?php echo htmlspecialchars($data['tanggal_pesan']); ?>" required>
            </p>
            <p>
                <label for="waktu_perjalanan">Waktu Pelaksanaan Perjalanan:</label>
                <input type="number" name="waktu_perjalanan" class="form-control" value="<?php echo htmlspecialchars($data['waktu_perjalanan']); ?>" required>
            </p>
            <label>Pelayanan Paket Perjalanan:</label>
            <dii>
            <div class="form-check mb-3">
                <input type="checkbox" name="penginapan" value="1000000" <?php echo $data['penginapan'] ? 'checked' : ''; ?> onchange="hitungHargaPaket()">
                <label for="penginapan">Penginapan (Rp 1.000.000)</label>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="transportasi" value="1200000" <?php echo $data['transportasi'] ? 'checked' : ''; ?> onchange="hitungHargaPaket()">
                <label for="transportasi">Transportasi (Rp 1.200.000)</label>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="makan" value="500000" <?php echo $data['makan'] ? 'checked' : ''; ?> onchange="hitungHargaPaket()">
                <label for="makan">Servis/Makan (Rp 500.000)</label>
            </div>
            <p>
                <label for="jumlah_peserta">Jumlah Peserta:</label>
                <input type="number" name="jumlah_peserta" class="form-control" value="<?php echo htmlspecialchars($data['jumlah_peserta']); ?>" required>
            </p>
            <p>
                <label for="harga_paket_perjalanan">Harga Paket Perjalanan:</label>
                <input type="number" name="harga_paket_perjalanan" class="form-control" value="<?php echo htmlspecialchars($data['harga_paket_perjalanan']); ?>" readonly>
            </p>
            <p>
                <label for="jumlah_tagihan">Jumlah Tagihan:</label>
                <input type="number" name="jumlah_tagihan" class="form-control" value="<?php echo htmlspecialchars($data['jumlah_tagihan']); ?>" readonly>
            </p>
            <input type="submit" class="btn btn-primary btn-sm" value="Update" name="update">
            <button type="button" class="btn btn-primary btn-sm" onclick="hitungTagihan()">Hitung Tagihan</button>
            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
        </fieldset>
        </div>
    </form>
    <script>
        function hitungHargaPaket() {
            let penginapan = document.querySelector('input[name="penginapan"]:checked') ? parseInt(document.querySelector('input[name="penginapan"]').value) : 0;
            let transportasi = document.querySelector('input[name="transportasi"]:checked') ? parseInt(document.querySelector('input[name="transportasi"]').value) : 0;
            let makan = document.querySelector('input[name="makan"]:checked') ? parseInt(document.querySelector('input[name="makan"]').value) : 0;

            let hargaPaketPerjalanan = penginapan + transportasi + makan;

            document.querySelector('input[name="harga_paket_perjalanan"]').value = hargaPaketPerjalanan;
        }

        function hitungTagihan() {
            let jumlahPeserta = parseInt(document.querySelector('input[name="jumlah_peserta"]').value);
            let waktuPerjalanan = parseInt(document.querySelector('input[name="waktu_perjalanan"]').value);
            let hargaPaketPerjalanan = parseInt(document.querySelector('input[name="harga_paket_perjalanan"]').value);

            if (isNaN(jumlahPeserta) || jumlahPeserta <= 0) {
                alert("Harap isi jumlah peserta dengan benar.");
                return;
            }
            if (isNaN(waktuPerjalanan) || waktuPerjalanan <= 0) {
                alert("Harap isi waktu perjalanan dengan benar.");
                return;
            }

            let jumlahTagihan = waktuPerjalanan * jumlahPeserta * hargaPaketPerjalanan;
            document.querySelector('input[name="jumlah_tagihan"]').value = jumlahTagihan;
        }

        function validateForm() {
            let jumlahTagihan = document.querySelector('input[name="jumlah_tagihan"]').value;
            if (!jumlahTagihan || jumlahTagihan < 0) {
                alert("Harap hitung tagihan terlebih dahulu sebelum menyimpan.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
