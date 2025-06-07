<?php
include 'config.php';

if (isset($_GET['nip'])) {
  $nip = $_GET['nip'];

  $cek = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE NIP = '$nip'");
  if (mysqli_num_rows($cek) > 0) {
    $hapus = mysqli_query($conn, "DELETE FROM karyawan_absensi WHERE NIP = '$nip'");
    
    if ($hapus) {
      echo "<script>alert('Data berhasil dihapus!'); window.location='karyawan.php';</script>";
    } else {
      echo "<script>alert('Gagal menghapus data.'); window.location='karyawan.php';</script>";
    }
  } else {
    echo "<script>alert('Data tidak ditemukan.'); window.location='karyawan.php';</script>";
  }
} else {
  header('Location: karyawan.php');
}
?>