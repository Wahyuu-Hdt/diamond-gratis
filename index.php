<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: karyawan.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen">

  <div class="flex w-full max-w-3xl shadow-lg rounded-xl overflow-hidden">
    <div class="w-1/2 bg-white p-10 flex flex-col items-center justify-center space-y-2">
      <img src="gambar/1.jpg" alt="Login Illustration" class="w-[280px]" />
      <div class="flex text-3xl font-bold text-blue-600">
        <span class="mr-2">Welcome</span>
        <span>Back!</span>
      </div>
      <p>Please login first to join us</p>
    </div>
    
    <div class="w-1/2 bg-blue-600 text-white p-10 flex flex-col justify-center">
      <h2 class="text-3xl font-bold mb-2">Enter Correctly!</h2>
      <p class="mb-6">
        Don't have an account yet? 
        <a href="register.php" class="underline font-semibold hover:text-blue-200">Sign Up</a>
      </p>

      <?php if (!empty($error)): ?>
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form action="" method="POST" class="space-y-4">
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
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center">
            <input type="checkbox" class="mr-2" />
            Keep me logged in
          </label>
          <a href="#" class="underline hover:text-blue-200">Forgot Password?</a>
        </div>
        <button type="submit" class="w-full bg-white text-blue-600 font-bold py-2 rounded-md hover:bg-blue-200 transition">
          Login
        </button>
      </form>
    </div>
  </div>

</body>
</html>