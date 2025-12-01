<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Tambah Partner</h1>

<form action="/admin/Partner/store" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded-lg shadow w-full max-w-3xl">

    <label class="block font-semibold mb-1">Nama</label>
    <input type="text" name="nama" class="w-full p-2 border rounded mb-4">

    <label class="block font-semibold mb-1">Deskripsi</label>
    <textarea name="deskripsi" class="w-full p-2 border rounded mb-4"></textarea>

    <label class="block font-semibold mb-1">Website</label>
    <input type="text" name="website" class="w-full p-2 border rounded mb-4">

    <label class="block font-semibold mb-1">Logo</label>
    <input type="file" name="logo" class="w-full mb-4">
    
    <label class="block font-semibold mb-1">Kategori Partner</label>
    <select name="kategori" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition bg-white">
        <option value="Industry Partner">Industry Partner</option>
        <option value="Educational Institutions">Educational Institutions</option>
        <option value="International Institutions">International Institutions</option>
        <option value="Government Institutions">Government Institutions</option>
    </select>
    
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>

</form>

<?php
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
