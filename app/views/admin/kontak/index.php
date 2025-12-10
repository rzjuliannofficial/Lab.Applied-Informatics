<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Pesan Kontak</h1>

<table class="mt-4 w-full border bg-white shadow">
    <thead class="bg-gray-100">
        <tr>
            <th class="p-2 border">#</th>
            <th class="p-2 border">Nama</th>
            <th class="p-2 border">Email</th>
            <th class="p-2 border">Subject</th>
            <th class="p-2 border">Isi Pesan</th>
            <th class="p-2 border">Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $i = 0; foreach ($pesan as $p): ?>
        <tr class="hover:bg-gray-50">
            <td class="p-2 border"><?= ++$i ?></td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['nama']) ?>
            </td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['email']) ?>
            </td>

            <td class="p-2 border">
                <?= htmlspecialchars($p['subject']) ?>
            </td>

            <td class="p-2 border">
                <div class="line-clamp-2 max-w-xs text-gray-700">
                    <?= htmlspecialchars($p['isi']) ?>
                </div>
            </td>

            <td class="p-2 border">
                <div class="flex items-center justify-center gap-2">
                    
                    <button type="button" 
                            onclick="showDetail(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8') ?>)"
                            class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                                   text-blue-700 bg-blue-100 border border-blue-300 
                                   rounded hover:bg-blue-200 transition">
                        <i class="fas fa-eye text-[10px]"></i>
                        Lihat
                    </button>

                    <a href="/admin/kontak/delete/<?= $p['id'] ?>"
                       onclick="return confirm('Hapus pesan ini?')"
                       class="flex items-center gap-1 px-2 py-1 text-xs font-medium 
                              text-red-700 bg-red-100 border border-red-300 
                              rounded hover:bg-red-200 transition">
                        <i class="fas fa-trash text-[10px]"></i>
                        Hapus
                    </a>

                </div>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showDetail(data) {
        // Escape HTML untuk keamanan saat menampilkan isi pesan di SweetAlert
        const safeIsi = data.isi.replace(/&/g, "&amp;")
                                .replace(/</g, "&lt;")
                                .replace(/>/g, "&gt;")
                                .replace(/"/g, "&quot;")
                                .replace(/'/g, "&#039;")
                                .replace(/\n/g, "<br>");

        Swal.fire({
            title: 'Detail Pesan',
            html: `
                <div class="text-left text-sm space-y-3">
                    <div>
                        <strong class="block text-gray-700">Pengirim:</strong>
                        <span>${data.nama} (${data.email})</span>
                    </div>
                    <div>
                        <strong class="block text-gray-700">Subject:</strong>
                        <span>${data.subject}</span>
                    </div>
                    <div class="border-t pt-2 mt-2">
                        <strong class="block text-gray-700 mb-1">Isi Pesan:</strong>
                        <div class="p-3 bg-gray-50 rounded border text-gray-800 max-h-60 overflow-y-auto">
                            ${safeIsi}
                        </div>
                    </div>
                </div>
            `,
            confirmButtonText: 'Tutup',
            confirmButtonColor: '#02416D',
            width: '600px'
        });
    }
</script>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>