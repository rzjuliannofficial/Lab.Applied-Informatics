<?php
// authenticateAdmin.php - Proses Login Khusus Admin
session_start();
require_once '../app/config/Koneksi.php'; 

$username = isset($_POST['username']) ? trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING)) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// --- Dapatkan koneksi dari fungsi ---
try {
    $conn = get_pg_connection(); 
} catch (Throwable $e) {
    error_log('DB connection error in authenticateAdmin.php: ' . $e->getMessage());
    header('Location: loginAdmin.php?error=' . urlencode('Gagal koneksi ke database.'));
    exit;
}

if ($username === '' || $password === '') {
    header('Location: loginAdmin.php?error=' . urlencode('Username dan password harus diisi.'));
    exit;
}

$sql = 'SELECT id, username, password, role, id_dosen FROM users WHERE username = $1 LIMIT 1';
$result = pg_query_params($conn, $sql, array($username));

if (!$result || pg_num_rows($result) === 0) {
    header('Location: loginAdmin.php?error=' . urlencode('Username tidak ditemukan.'));
    exit;
}

$user = pg_fetch_assoc($result);

// verifikasi password
if ($password === $user['password']) {
    // sukses: set session
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['id_dosen'] = $user['id_dosen'];
    $_SESSION['role'] = $user['role']; // Simpan role admin
    
    // Arahkan ke dashboard admin
    header('Location: dasboard.php'); 
    exit;
} else {
    // gagal
    header('Location: loginAdmin.php?error=' . urlencode('Username atau password salah, atau akun bukan admin.'));
    exit;
}
?>