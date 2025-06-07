<?php
include 'config.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if (empty($username) || empty($password)) {
    $error = "Harap isi semua form!";
  } else {
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
      $error = "Username sudah digunakan, pilih yang lain.";
    } else {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
      $insert = mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");
      if ($insert) {
        $success = "Registrasi berhasil! Silakan login.";
        header("Refresh: 2; url=index.php");
      } else {
        $error = "Terjadi kesalahan saat menyimpan data.";
      }
    }
  }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registrasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-blue-100">
  <div class="flex w-full max-w-4xl shadow-lg rounded-xl overflow-hidden">
    <div class="w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
      <h2 class="text-3xl font-bold mb-2">Create a New Account</h2>
      <p class="mb-6">
        Already have an account? 
        <a href="index.php" class="underline font-semibold hover:text-blue-200">Login here</a>
      </p>

      <?php if ($error): ?>
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
          <?= $error ?>
        </div>
      <?php elseif ($success): ?>
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded text-sm">
          <?= $success ?>
        </div>
      <?php endif; ?>
      <form method="POST" class="space-y-4">
        <div>
          <label class="block mb-1 font-semibold">Username</label>
          <input type="text" name="username" placeholder = "Please enter your username"
                 class="w-full px-4 py-2 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-blue-300" />
        </div>
        <div>
          <label class="block mb-1 font-semibold">Password</label>
          <input type="password" name="password" placeholder = "Please enter your password"
                 class="w-full px-4 py-2 rounded-md text-black focus:outline-none focus:ring-2 focus:ring-blue-300" />
        </div>
          <label class="flex items-center">
            <input type="checkbox" class="mr-2" />
            Let me keep registration
          </label>
        <button type="submit" class="w-full bg-white text-blue-600 font-bold py-2 rounded-md hover:bg-blue-200 transition">
          Registration
        </button>
      </form>
    </div>
    <div class="w-1/2 bg-white p-10 flex flex-col items-center justify-center space-y-4">
      <img src="gambar/2.jpg" alt="Register Illustration" class="w-full max-w-md" />
      <div class="flex text-3xl font-bold text-blue-600">
        <span class="mr-2">Welcome</span>
        <span>Back!</span>
      </div>
      <p>Please Registration first to join us</p>
    </div>
  </div>
</body>
</html>