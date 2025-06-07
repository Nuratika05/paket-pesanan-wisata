<?php
include("koneksi.php");

// Cek apakah tombol update sudah diklik atau belum
if(isset($_POST['update']))
{
    // Ambil data dari formulir
    $id = $_POST['id']; // Pastikan ID juga dikirim dari form sebagai input hidden
    $nama_pemesan = $_POST['nama_pemesan'];
    $no_telpon = $_POST['no_telpon'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $waktu_perjalanan = $_POST['waktu_perjalanan'];
    $penginapan = isset($_POST['penginapan']) ? $_POST['penginapan'] : 0;
    $transportasi = isset($_POST['transportasi']) ? $_POST['transportasi'] : 0;
    $makan = isset($_POST['makan']) ? $_POST['makan'] : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket_perjalanan = $_POST['harga_paket_perjalanan'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    // Buat query update
    $sql = "UPDATE pemesanan_tiket SET 
            nama_pemesan='$nama_pemesan', 
            no_telpon='$no_telpon', 
            tanggal_pesan='$tanggal_pesan', 
            waktu_perjalanan='$waktu_perjalanan', 
            penginapan='$penginapan', 
            transportasi='$transportasi', 
            makan='$makan', 
            jumlah_peserta='$jumlah_peserta', 
            harga_paket_perjalanan='$harga_paket_perjalanan', 
            jumlah_tagihan='$jumlah_tagihan'
            WHERE id=$id";

    // Eksekusi query
    $query = mysqli_query($db, $sql);

    // Apakah query simpan berhasil?
    if($query) {
        // Kalau berhasil alihkan ke halaman daftar-pesanan.php dengan status=sukses
        header('Location: daftar-pesanan.php?status=sukses');
    } else {
        // Kalau gagal alihkan ke halaman daftar-pesanan.php dengan status=gagal
        header('Location: daftar-pesanan.php?status=gagal');
    }
} 
else {
    die("Akses dilarang...");
}
?>
