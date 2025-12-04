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

    <!-- IMAGE PREVIEW SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap semua input file di halaman
            const fileInputs = document.querySelectorAll('input[type="file"]');

            fileInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    
                    // Validasi apakah file adalah image
                    if (!file || !file.type.startsWith('image/')) {
                        return;
                    }

                    // Buat FileReader untuk preview
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imageDataUrl = event.target.result;
                        
                        // Cari preview container terdekat
                        // Strategi 1: Cari di parent form
                        let previewContainer = null;
                        let form = input.closest('form');

                        if (form) {
                            // Cari elemen dengan class yang mengindikasikan preview
                            previewContainer = form.querySelector(
                                '.preview-image, ' +
                                '.image-preview, ' +
                                '[data-preview-target], ' +
                                '.file-preview, ' +
                                'img[alt*="preview" i], ' +
                                'img[alt*="bukti" i], ' +
                                'img[alt*="foto" i]'
                            );
                        }

                        // Jika tidak ketemu, cari di seluruh halaman dengan parent terdekat
                        if (!previewContainer) {
                            const parentDiv = input.closest('div');
                            if (parentDiv) {
                                previewContainer = parentDiv.querySelector('img');
                            }
                        }

                        // Jika masih tidak ketemu, buat preview baru
                        if (!previewContainer) {
                            const wrapper = document.createElement('div');
                            wrapper.className = 'mt-3 flex justify-center';
                            
                            const previewImg = document.createElement('img');
                            previewImg.src = imageDataUrl;
                            previewImg.className = 'w-48 h-48 object-cover rounded border-2 border-blue-300';
                            previewImg.alt = 'Preview';
                            
                            wrapper.appendChild(previewImg);
                            input.parentElement.appendChild(wrapper);
                        } else {
                            // Update gambar yang sudah ada
                            previewContainer.src = imageDataUrl;
                            previewContainer.style.display = 'block';
                            if (previewContainer.classList.length === 0) {
                                previewContainer.className = 'w-48 h-48 object-cover rounded border-2 border-blue-300';
                            }
                        }
                    };

                    reader.readAsDataURL(file);
                });
            });

            // DRAG & DROP SUPPORT
            const dropZones = document.querySelectorAll(
                '.border-dashed, ' +
                '[data-drop-zone], ' +
                '.file-upload-area'
            );

            dropZones.forEach(zone => {
                const fileInput = zone.querySelector('input[type="file"]');
                
                if (!fileInput) return;

                // Prevent default drag behavior
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    zone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                // Highlight drop area when item is dragged over it
                ['dragenter', 'dragover'].forEach(eventName => {
                    zone.addEventListener(eventName, () => {
                        zone.classList.add('bg-blue-50', 'border-blue-400');
                    });
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    zone.addEventListener(eventName, () => {
                        zone.classList.remove('bg-blue-50', 'border-blue-400');
                    });
                });

                // Handle dropped files
                zone.addEventListener('drop', (e) => {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    
                    fileInput.files = files;
                    
                    // Trigger change event untuk preview
                    const event = new Event('change', { bubbles: true });
                    fileInput.dispatchEvent(event);
                });
            });
        });
    </script>
</body>
</html>
