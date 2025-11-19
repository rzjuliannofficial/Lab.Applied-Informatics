<?php
// register_process.php - Hanya bisa diakses oleh Admin yang sudah login
session_start();
require_once 'koneksi.php'; 

// --- Cek Hak Akses (Hanya Admin) ---
// if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'admin') {
//     // Jika bukan Admin atau belum login, arahkan ke halaman login Admin
//     header('Location: loginAdmin.php?error=' . urlencode('Akses Ditolak: Hanya Admin yang dapat memproses registrasi.'));
//     exit;
// }
// --- Akhir Cek Hak Akses ---

// Dapatkan koneksi dari fungsi
try {
    $conn = get_pg_connection(); 
} catch (Throwable $e) {
    error_log('DB connection error: ' . $e->getMessage());
    header('Location: register.php?error=' . urlencode('Gagal koneksi ke database. Hubungi admin.'));
    exit;
}

// Cek method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php?error=' . urlencode('Akses tidak valid.'));
    exit;
}

// CSRF token
$token = $_POST['csrf_token'] ?? '';
if (empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    header('Location: register.php?error=' . urlencode('Token CSRF tidak valid. Coba lagi.'));
    exit;
}

// Ambil dan sanitasi input
$username = isset($_POST['username']) ? trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING)) : '';
$full_name = isset($_POST['full_name']) ? trim(filter_var($_POST['full_name'], FILTER_SANITIZE_STRING)) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : ''; // Ambil role yang dipilih

// Validasi input
if (strlen($username) < 3 || strlen($password) < 6 || $password !== $password_confirm) {
    header('Location: register.php?error=' . urlencode('Input tidak valid: Username min 3, Password min 6, dan harus sama.'));
    exit;
}

// VALIDASI ROLE: Karena ini hanya untuk Admin, kita perbolehkan semua role termasuk 'admin'
$valid_roles = ['mahasiswa', 'dosen', 'karyawan', 'admin'];
if (!in_array($role, $valid_roles)) {
    header('Location: register.php?error=' . urlencode('Pilihan peran (role) tidak valid.'));
    exit;
}

// Cek apakah username sudah ada
$check_sql = 'SELECT id FROM users WHERE username = $1 LIMIT 1';
$check_res = pg_query_params($conn, $check_sql, array($username));

if (!$check_res || pg_num_rows($check_res) > 0) {
    $error_msg = pg_num_rows($check_res) > 0 ? 'Username sudah digunakan.' : 'Terjadi kesalahan server saat memeriksa user.';
    error_log("PostgreSQL Error (register check): " . pg_last_error($conn));
    header('Location: register.php?error=' . urlencode($error_msg));
    exit;
}

// Hash password dan simpan
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$insert_sql = 'INSERT INTO users (username, password_hash, full_name, role) VALUES ($1, $2, $3, $4) RETURNING id';
$insert_res = pg_query_params($conn, $insert_sql, array($username, $password_hash, $full_name, $role)); 

if ($insert_res) {
    // Setelah sukses, redirect kembali ke halaman register dengan pesan sukses (Admin bisa lanjut buat akun lain)
    header('Location: register.php?success=' . urlencode("Akun $username berhasil dibuat sebagai $role!"));
    exit;
} else {
    error_log("PostgreSQL Error (register insert): " . pg_last_error($conn));
    header('Location: register.php?error=' . urlencode('Gagal menyimpan data pengguna.'));
    exit;
}
?>