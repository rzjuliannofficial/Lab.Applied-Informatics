<?php
// loginAdmin.php - Form Login Khusus Admin (Menggunakan Style SI-AKAD)
session_start();

// Cek apakah user sudah login sebagai Admin.
// Jika sudah, langsung arahkan ke dashboard Admin.
if (isset($_SESSION['user_id']) && ($_SESSION['role'] ?? '') === 'admin') {
    header('Location: Beranda.php');
    exit;
}

// Ambil pesan error/sukses dari query string
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siakad | Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style/styleLoginAdmin.css">
    <script src="jquery-ui-1.14.1/external/jquery/jquery.js"></script>
    <style>
        /* Gaya spesifik untuk error/success di dalam form box */
        .message-box {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container-main">
        <div class="container-right">
            <div class="head">
                <div class="head-left">
                    <h1>SIGN IN</h1>
                    <p>Admin</p>
                </div>
                <div class="head-right">
                    <img src="img/logo.png" alt="Logo">
                </div>
            </div>

            <?php if ($error): ?>
                <div class="message-box error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form id="loginForm" method="post">
                <div class="login">
                    <input type="text" name="nim" id="nim" placeholder="Nim" required><br><br>
                    <input type="password" name="password" id="password" placeholder="Password" required><br><br>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                    </select><br>
                    <div class="submit" >
                        <button type="submit">
                            Login
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </form>
            <div class="Copyright">
                <p>© 2025 Sistem Informasi Akademik. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
