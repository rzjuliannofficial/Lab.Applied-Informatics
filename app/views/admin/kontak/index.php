<?php ob_start(); ?>

<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-800">Pesan Masuk</h1>
    <p class="text-slate-500 text-sm mt-1">Daftar pertanyaan dan pesan dari pengunjung website.</p>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50/50 border-b border-slate-100">
            <tr>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-16 text-center">#</th>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-1/4">Pengirim</th> <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Pesan</th> <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-32 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            <?php $i = 0; foreach ($pesan as $p): ?>
            <tr class="hover:bg-blue-50/30 transition-colors group">
                <td class="p-4 text-center text-sm text-slate-400 font-medium align-top">
                    <?= ++$i ?>
                </td>

                <td class="p-4 align-top">
                    <div class="flex items-start gap-3">
                        <div class="min-w-0">
                            <p class="text-sm font-bold text-slate-800 truncate"><?= htmlspecialchars($p['nama']) ?></p>
                            <p class="text-xs text-slate-500 truncate"><?= htmlspecialchars($p['email']) ?></p>
                        </div>
                    </div>
                </td>

                <td class="p-4 align-top cursor-pointer" onclick="showDetail(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8') ?>)">
                    <p class="text-sm font-semibold text-slate-700 mb-1 group-hover:text-blue-600 transition-colors">
                        <?= htmlspecialchars($p['subject']) ?>
                    </p>
                    <p class="text-sm text-slate-500 line-clamp-2 max-w-xs">
                        <?= htmlspecialchars($p['isi']) ?>
                    </p>
                </td>

                <td class="p-4 text-center align-top">
                    <div class="flex items-center justify-center gap-2">
                        <button type="button" onclick="showDetail(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, 'UTF-8') ?>)" 
                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Lihat Detail">
                            <i class="fas fa-envelope-open-text"></i>
                        </button>
                        
                        <a href="/admin/kontak/delete/<?= $p['id'] ?>" onclick="return confirm('Hapus pesan ini?')" 
                            class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if(empty($pesan)): ?>
                <tr>
                    <td colspan="4" class="p-8 text-center text-slate-500">
                        Tidak ada pesan masuk.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showDetail(data) {
        // Sanitasi sederhana untuk tampilan HTML di SweetAlert
        const safeIsi = data.isi.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\n/g, "<br>");

        Swal.fire({
            html: `
                <div class="text-left">
                    <div class="flex items-center gap-4 mb-6 border-b pb-4 border-gray-100">
                        <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl">
                            ${data.nama.charAt(0).toUpperCase()}
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">${data.nama}</h3>
                            <p class="text-sm text-slate-500">${data.email}</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <span class="text-xs font-bold text-blue-600 uppercase tracking-wider bg-blue-50 px-2 py-1 rounded">Subject</span>
                        <p class="text-md font-semibold text-slate-800 mt-1">${data.subject}</p>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 text-sm text-slate-600 leading-relaxed max-h-80 overflow-y-auto">
                        ${safeIsi}
                    </div>
                </div>
            `,
            showCloseButton: true,
            showConfirmButton: false,
            width: '600px',
            customClass: {
                popup: 'rounded-2xl shadow-xl'
            }
        });
    }
</script>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>