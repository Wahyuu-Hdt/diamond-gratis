<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Absensi Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-blue-100 min-h-screen font-sans">
    
    <!-- Navbar -->
    <nav class="bg-blue-600 shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-4">
        <h1 class="text-white text-xl font-bold  tracking-wide">
          SELAMAT DATANG DI ABSENSI KARYAWAN
        </h1>
      </div>
    </nav>

    <div class="max-w-5xl mx-auto px-6 py-10">
      <h2 class="text-4xl font-bold text-center text-gray-800 mb-10">👤 Absensi Karyawan</h2>

      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-sm">
          <thead class="bg-blue-500 text-white uppercase tracking-wider text-sm">
            <tr>
              <th class="py-4 px-6 text-center">Nama</th>
              <th class="py-4 px-6 text-center">Tanggal Absensi</th>
              <th class="py-4 px-6 text-center">Jam Masuk</th>
              <th class="py-4 px-6 text-center">Jam Pulang</th>
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
              <td class="py-3 px-6 text-center"><?= $data['Nama']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Tanggal_absensi']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Jam_masuk']?></td>
              <td class="py-3 px-6 text-center"><?= $data['Jam_pulang']?></td>
              <td class="py-3 px-6 text-center">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded-lg text-sm font-medium transition duration-200">
                  Hapus
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

      <div class="flex justify-start mt-6">
        <a href="karyawan.php" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-lg shadow font-medium transition duration-300">
          Kembali
        </a>
      </div>
    </div>
  </body>
</html>