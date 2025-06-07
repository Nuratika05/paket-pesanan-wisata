<?php 
include 'koneksi.php';

$id = $_GET['id'];

// Buat query DELETE
$query = "DELETE FROM pemesanan_tiket WHERE id=$id";

// Eksekusi query
$result = mysqli_query($db, $query);

// Cek apakah query berhasil dijalankan
if($result) {
    // Kalau berhasil alihkan ke halaman daftar-pesanan.php dengan status=sukses
    header("Location: daftar-pesanan.php?status=sukses");
} else {
    // Kalau gagal alihkan ke halaman daftar-pesanan.php dengan status=gagal
    header("Location: daftar-pesanan.php?status=gagal");
}

// Pastikan tidak ada output sebelum header()
exit();
?>
