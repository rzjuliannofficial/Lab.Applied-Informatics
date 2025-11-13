<?php
// authenticateAdmin.php - Proses Login Khusus Admin
session_start();
require_once 'koneksi.php'; 

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

// MODIFIKASI SQL: Hanya ambil user dengan role 'admin'
$sql = 'SELECT id, username, password_hash, full_name, role FROM users WHERE username = $1 AND role = $2 LIMIT 1';
$result = pg_query_params($conn, $sql, array($username, 'admin'));

if (!$result) {
    error_log("PostgreSQL Error (authenticateAdmin): " . pg_last_error($conn));
    header('Location: loginAdmin.php?error=' . urlencode('Terjadi kesalahan pada server.'));
    exit;
}

if (pg_num_rows($result) === 0) {
    // Pesan umum untuk keamanan
    header('Location: loginAdmin.php?error=' . urlencode('Username atau password salah, atau akun bukan admin.'));
    exit;
}

$user = pg_fetch_assoc($result);
$hash = $user['password_hash'];

// verifikasi password
if (password_verify($password, $hash)) {
    // sukses: set session
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];
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