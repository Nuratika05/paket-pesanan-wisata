<?php
include("koneksi.php");
// cek apakah tombol daftar sudah diklik atau belum?
if(isset($_POST['pesan']))
{

// ambil data dari formulir
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


    // buat query
    $sql = "INSERT INTO pemesanan_tiket (nama_pemesan, no_telpon, tanggal_pesan, waktu_perjalanan,
    penginapan, transportasi, makan, jumlah_peserta, harga_paket_perjalanan, jumlah_tagihan) VALUE ('$nama_pemesan', '$no_telpon', '$tanggal_pesan', 
    '$waktu_perjalanan', '$penginapan', '$transportasi', '$makan', '$jumlah_peserta', '$harga_paket_perjalanan', '$jumlah_tagihan')";
    $query = mysqli_query($db, $sql);

// apakah query simpan berhasil?
    if( $query ) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: daftar-pesanan.php?status=sukses');
    } else {
    // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
        header('Location: daftar-pesanan.php?status=gagal');
    }

} 
else {
    die("Akses dilarang...");
}
?>