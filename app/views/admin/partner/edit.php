<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Edit Partner</h1>

<form action="/admin/Partner/update/<?= $partners['id'] ?>" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow w-full max-w-3xl">

    <label class="block font-semibold mb-1">Nama</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($partners['nama']) ?>" class="w-full p-2 border rounded mb-4">

    <label class="block font-semibold mb-1">Deskripsi</label>
    <textarea name="deskripsi" class="w-full p-2 border rounded mb-4"><?= htmlspecialchars($partners['deskripsi']) ?></textarea>

    <label class="block font-semibold mb-1">website</label>
    <input type="text" name="website" value="<?= $partners['website'] ?>" class="w-full p-2 border rounded mb-4">

    <label class="block font-semibold mb-1">Logo Baru (Opsional)</label>
    <input type="file" name="logo" class="w-full mb-4">

    <?php if ($partners['logo']): ?>
        <p class="font-semibold mb-1">Logo Saat Ini:</p>
        <img src="<?= htmlspecialchars($partners['logo']) ?>" class="w-32 h-32 object-cover rounded mb-4">
    <?php endif; ?>
    
    <label class="block font-semibold mb-1">Kategori Partner</label>
    <select name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition bg-white">
        <option value="Industry Partner" <?= $partners['kategori']=='Industry Partner'?'selected':'' ?>>Industry Partner</option>
        <option value="Educational Institutions" <?= $partners['kategori']=='Educational Institutions'?'selected':'' ?>>Educational Institutions</option>
        <option value="International Institutions" <?= $partners['kategori']=='International Institutions'?'selected':'' ?>>International Institutions</option>
        <option value="Government Institutions" <?= $partners['kategori']=='Government Institutions'?'selected':'' ?>>Government Institutions</option>
    </select>

    <button class="bg-yellow-600 text-white px-4 py-2 rounded">Update</button>

</form>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
