<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel'; ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
            /* Konfigurasi Warna Khusus Lab AI */
            :root {
                --color-primary: #02416D; /* Biru Tua */
                --color-accent: #F97316; /* Oranye */
                --color-sidebar-bg: #1F2937; /* Sidebar Gelap */
                --color-text-light: #E5E7EB;
            }

            /* Kelas Tailwind Kustom (Digunakan untuk demo) */
            .sidebar-bg { background-color: var(--color-sidebar-bg); }
            .bg-primary { background-color: var(--color-primary); }
            .text-accent { color: var(--color-accent); }

            /* Scrollbar Styling (Opsional, untuk estetika) */

            ::-webkit-scrollbar { width: 6px; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
            ::-webkit-scrollbar-track { background: #f1f5f9; }
        </style>
</head>

<body class="bg-gray-100">

    <!-- Sidebar -->
    <?php include __DIR__ . "/sidebar.php"; ?>

    <!-- Header -->
    <?php include __DIR__ . "/header.php"; ?>

    <!-- Content -->
    <main class="flex-1 md:ml-64 flex-col p-6 ">
        <?= $content; ?>
    </main>

    <!-- Footer -->
    <footer class="ml-64 p-4 text-center text-gray-600 text-sm">
        © 2025 Lab AI — Dashboard v1.0
    </footer>
</body>
</html>
