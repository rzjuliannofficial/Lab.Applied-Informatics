<?php
// register.php - Hanya bisa diakses oleh user yang sudah login sebagai 'admin'
session_start();

// Cek autentikasi dan role
// if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
//     // Jika belum login atau bukan admin, arahkan ke loginAdmin
//     header('Location: loginAdmin.php?error=' . urlencode('Akses Ditolak: Hanya Admin yang dapat membuat akun baru.'));
//     exit;
// }

// Buat CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Akun Baru (Admin)</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <style>
    body { font-family: Arial, sans-serif; background:#f4f6f8; padding:2rem; }
    .card { background:#fff; max-width:480px; margin:2rem auto; padding:1.5rem; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.06); }
    input[type="text"], input[type="password"], select { 
      width:100%; padding:0.6rem; margin:0.4rem 0 1rem 0; box-sizing:border-box; 
      border: 1px solid #ccc; border-radius: 4px;
    }
    button { padding:0.6rem 1rem; cursor:pointer; background-color: #007bff; color: white; border: none; border-radius: 4px;}
    .error { color:#b00020; margin-bottom:0.8rem; border: 1px solid #f5c6cb; background: #f8d7da; padding: 10px;}
    .success { color:#1b7a1b; margin-bottom:0.8rem; border: 1px solid #c3e6cb; background: #d4edda; padding: 10px;}
    small, a { color:#666; }
  </style>
</head>
<body>
  <div class="card">
    <h2>Buat Akun Baru (Admin Access)</h2>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
      <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="register_process.php" method="post" autocomplete="off" novalidate>
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

      <label for="username">Username</label><br>
      <input id="username" name="username" type="text" required minlength="3" maxlength="100">

      <label for="full_name">Nama Lengkap</label><br>
      <input id="full_name" name="full_name" type="text" maxlength="200">
      
      <!-- Admin dapat memilih role untuk user baru -->
      <label for="role">Daftarkan Sebagai</label><br>
      <select id="role" name="role" required>
        <option value="mahasiswa">Mahasiswa</option>
        <option value="dosen">Dosen</option>
        <option value="karyawan">Karyawan</option>
        <option value="admin">Admin</option> <!-- Admin bisa mendaftarkan Admin lain -->
      </select><br>

      <label for="password">Password</label><br>
      <input id="password" name="password" type="password" required minlength="6">

      <label for="password_confirm">Konfirmasi Password</label><br>
      <input id="password_confirm" name="password_confirm" type="password" required minlength="6">

      <button type="submit">Daftar Akun</button>
      <p><small><a href="loginAdmin.php">Kembali ke Login Admin</a></small></p>
    </form>
  </div>
</body>
</html>