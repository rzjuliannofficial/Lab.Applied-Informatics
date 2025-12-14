<?php ob_start(); ?>

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Publikasi Ilmiah</h1>
        <p class="text-slate-500 text-sm mt-1">Jurnal, prosiding, dan karya tulis ilmiah dosen.</p>
    </div>
    
    <a href="/admin/PublikasiDosen/create" class="group relative inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full hover:from-blue-700 hover:to-blue-900 shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50">
        <i class="fas fa-plus mr-2"></i> Tambah Publikasi
    </a>
</div>

<div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50/50 border-b border-slate-100">
            <tr>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-16 text-center">#</th>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-1/4">Judul Publikasi</th>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Penulis / Dosen</th>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-32 text-center">Tahun</th>
                <th class="p-4 text-xs font-bold text-slate-500 uppercase tracking-wider w-32 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-50">
            <?php $i=0; foreach ($publikasi as $p): ?>
            <tr class="hover:bg-blue-50/30 transition-colors group">
                <td class="p-4 text-center text-sm text-slate-400 font-medium align-top">
                    <?= ++$i ?>
                </td>
                
                <td class="p-4 align-top">
                    <p class="text-sm font-bold text-slate-800 mb-1 group-hover:text-blue-600 transition-colors">
                        <?= htmlspecialchars($p['judul']) ?>
                    </p>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-medium bg-slate-100 text-slate-600 uppercase tracking-wide">
                        <?= htmlspecialchars($p['kategori']) ?>
                    </span>
                    <?php if($p['link_jurnal']): ?>
                        <a href="<?= htmlspecialchars($p['link_jurnal']) ?>" target="_blank" class="text-xs text-blue-500 hover:underline ml-2">
                            <i class="fas fa-external-link-alt"></i> Link
                        </a>
                    <?php endif; ?>
                </td>

                <td class="p-4 align-top">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs font-bold">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="text-sm text-slate-600 font-medium">
                            <?= htmlspecialchars($p['nama_dosen']) ?>
                        </span>
                    </div>
                </td>

                <td class="p-4 text-center align-top">
                    <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 rounded-full text-xs font-bold">
                        <?= htmlspecialchars($p['tahun']) ?>
                    </span>
                </td>

                <td class="p-4 text-center align-top">
                    <div class="flex items-center justify-center gap-2">
                        <a href="/admin/PublikasiDosen/edit/<?= $p['id'] ?>" class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-lg transition-colors">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/admin/PublikasiDosen/delete/<?= $p['id'] ?>" onclick="return confirm('Hapus data ini?')" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($publikasi)): ?>
                <tr><td colspan="5" class="p-8 text-center text-slate-500">Belum ada data publikasi.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean(); include "../app/views/admin/layouts/master.php"; ?>