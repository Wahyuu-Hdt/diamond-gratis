<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-blue-100 min-h-screen font-sans">
    <nav class="bg-blue-600 shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-4">
        <h1 class="text-white text-xl font-bold  tracking-wide">
          SELAMAT DATANG DI DAFTAR KARYAWAN
        </h1>
      </div>
    </nav>
    <div class="max-w-7xl mx-auto px-6 py-10">
      <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">👤 Daftar Karyawan</h1>

      <div class="flex justify-between items-center mb-6">
        <a href="tambah.php" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow font-medium transition duration-300">
          + Tambah Karyawan
        </a>
        <a href="logout.php" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg text-sm font-medium transition duration-300">
          Logout
        </a>
      </div>

      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm">
          <thead class="bg-blue-500 text-white uppercase text-sm tracking-wider">
            <tr>
              <th class="py-4 px-6 text-center">NIP</th>
              <th class="py-4 px-6 text-center">Nama</th>
              <th class="py-4 px-6 text-center">Umur</th>
              <th class="py-4 px-6 text-center">Jenis Kelamin</th>
              <th class="py-4 px-6 text-center">Departemen</th>
              <th class="py-4 px-6 text-center">Jabatan</th>
              <th class="py-4 px-6 text-center">Kota Asal</th>
              <th class="py-4 px-6 text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <?php
            include 'config.php';
            $sql = mysqli_query($conn, "SELECT * FROM karyawan_absensi");
            while ($data = mysqli_fetch_assoc($sql)) {
            ?>
            <tr class="border-b hover:bg-blue-50 transition">
              <td class="py-3 px-6 text-center"><?= $data['NIP']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Nama']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Umur']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Jenis_kelamin']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Departemen']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Jabatan']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Kota_asal']?></td>
              <td class="py-3 px-6 text-center">
                <div class="flex justify-center space-x-4">
                  <a href="edit.php?nip=<?= $data['NIP'] ?>" class="text-blue-500 hover:underline font-semibold">Edit</a>
                  <a href="hapus.php?nip=<?= $data['NIP'] ?>" class="text-red-500 hover:underline font-semibold">Hapus</a>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="flex justify-start mt-6">
        <a href="absensi.php" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg shadow font-medium transition duration-300">
          Absensi Karyawan
        </a>
      </div>
    </div>
  </body>
</html>