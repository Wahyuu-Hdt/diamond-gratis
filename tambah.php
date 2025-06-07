<?php
include 'config.php';
$success = "";
$error = "";

if (isset($_POST["tambah"])) {
  $nip = $_POST["NIP"];
  $nama = $_POST["Nama"];
  $umur = $_POST["Umur"];
  $jenis_kelamin = $_POST["Jenis_kelamin"];
  $departemen = $_POST["Departemen"];
  $jabatan = $_POST["Jabatan"];
  $kota_asal = $_POST["Kota_asal"];
  $tanggal_absensi = $_POST["Tanggal_absensi"];
  $jam_masuk = $_POST["Jam_masuk"];
  $jam_pulang = $_POST["Jam_pulang"];

  if (
    $nip === "" || $nama === "" || $umur === "" || $jenis_kelamin === "" ||
    $departemen === "" || $jabatan === "" || $kota_asal === "" ||
    $tanggal_absensi === "" || $jam_masuk === "" || $jam_pulang === ""
  ) {
    $error = "Semua from harus diisi!";
  } else {
    $query = "INSERT INTO karyawan_absensi 
    (NIP, Nama, Umur, Jenis_kelamin, Departemen, Jabatan, Kota_asal, Tanggal_absensi, Jam_masuk, Jam_pulang) 
    VALUES ('$nip', '$nama', $umur, '$jenis_kelamin', '$departemen', '$jabatan', '$kota_asal', '$tanggal_absensi', '$jam_masuk', '$jam_pulang')";

    if (mysqli_query($conn, $query)) {
      header("Location: karyawan.php");
      exit();
    } else {
      $error = "Gagal menambahkan data!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-3xl">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-700">Tambah Data Karyawan 👤</h2>

    <?php if ($error): ?>
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center">
        <?= $error ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block mb-1 font-medium text-gray-700">NIP</label>
        <input type="text" name="NIP" placeholder="Masukkan NIP" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Nama</label>
        <input type="text" name="Nama" placeholder="Masukkan Nama" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Umur</label>
        <input type="number" name="Umur" placeholder="Masukkan Umur" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Jenis Kelamin</label>
        <select name="Jenis_kelamin" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400">
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Departemen</label>
        <input type="text" name="Departemen" placeholder="Masukkan Departemen" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Jabatan</label>
        <input type="text" name="Jabatan" placeholder="Masukkan Jabatan" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Kota Asal</label>
        <input type="text" name="Kota_asal" placeholder="Masukkan Kota Asal" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Tanggal Absensi</label>
        <input type="date" name="Tanggal_absensi" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Jam Masuk</label>
        <input type="time" name="Jam_masuk" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div>
        <label class="block mb-1 font-medium text-gray-700">Jam Pulang</label>
        <input type="time" name="Jam_pulang" class="w-full p-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400" />
      </div>

      <div class="md:col-span-2 flex justify-between mt-6">
        <a href="karyawan.php" class="px-6 py-3 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Batal</a>
        <button type="submit" name="tambah" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>