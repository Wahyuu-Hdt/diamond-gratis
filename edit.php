<?php
include 'config.php';

if (!isset($_GET['nip'])) {
  header('Location: karyawan.php');
  exit();
}

$nip = $_GET['nip'];
$result = mysqli_query($conn, "SELECT * FROM karyawan_absensi WHERE NIP = '$nip'");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST["Nama"];
  $umur = $_POST["Umur"];
  $jenis_kelamin = $_POST["Jenis_kelamin"];
  $departemen = $_POST["Departemen"];
  $jabatan = $_POST["Jabatan"];
  $kota_asal = $_POST["Kota_asal"];
  $tanggal_absensi = $_POST["Tanggal_absensi"];
  $jam_masuk = $_POST["Jam_masuk"];
  $jam_pulang = $_POST["Jam_pulang"];

  mysqli_query($conn, "UPDATE karyawan_absensi SET 
    Nama = '$nama',
    Umur = $umur,
    Jenis_kelamin = '$jenis_kelamin',
    Departemen = '$departemen',
    Jabatan = '$jabatan',
    Kota_asal = '$kota_asal',
    Tanggal_absensi = '$tanggal_absensi',
    Jam_masuk = '$jam_masuk',
    Jam_pulang = '$jam_pulang'
    WHERE NIP = '$nip'");

  header('Location: karyawan.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit Karyawan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 min-h-screen flex items-center justify-center px-4 py-8b">

  <div class="bg-white shadow-xl rounded-2xl w-full max-w-4xl p-10">
    <h2 class="text-3xl font-bold text-blue-700 text-center mb-8">✏️ Edit Data Karyawan</h2>

    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-sm font-semibold mb-1">Nama</label>
        <input type="text" name="Nama" value="<?= $data['Nama'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Umur</label>
        <input type="number" name="Umur" value="<?= $data['Umur'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
        <select name="Jenis_kelamin" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
          <option value="Laki-laki" <?= $data['Jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
          <option value="Perempuan" <?= $data['Jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Departemen</label>
        <input type="text" name="Departemen" value="<?= $data['Departemen'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Jabatan</label>
        <input type="text" name="Jabatan" value="<?= $data['Jabatan'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Kota Asal</label>
        <input type="text" name="Kota_asal" value="<?= $data['Kota_asal'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Tanggal Absensi</label>
        <input type="date" name="Tanggal_absensi" value="<?= $data['Tanggal_absensi'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Jam Masuk</label>
        <input type="time" name="Jam_masuk" value="<?= $data['Jam_masuk'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Jam Pulang</label>
        <input type="time" name="Jam_pulang" value="<?= $data['Jam_pulang'] ?>" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" required>
      </div>
    </form>

    <div class="flex justify-center mt-10 space-x-4">
      <button type="submit" formmethod="POST" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-300">
        Simpan Perubahan
      </button>
      <a href="karyawan.php" class="px-6 py-3 bg-gray-400 hover:bg-gray-500 text-white rounded-lg font-semibold transition duration-300">
        Batal
      </a>
    </div>
  </div>

</body>
</html>