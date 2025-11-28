<?php ob_start(); ?>

<h1 class="text-2xl font-bold mb-6">Tambah Member</h1>

<form action="/admin/dosen/store" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="space-y-4">
        <label class="block font-semibold mb-1">Nama</label>
        <input type="text" name="nama" required class="w-full p-2 border rounded mb-4">
        
        <label class="block font-semibold mb-1">NIP / NIM</label>
        <input type="text" name="nip" required class="w-full p-2 border rounded mb-4">
        
        <label class="block font-semibold mb-1">Email</label>
        <input type="email" name="email" required class="w-full p-2 border rounded mb-4">
    </div>

    <div class="space-y-4">
        <label class="block font-semibold mb-1">Keahlian</label>
        <input type="keahlian_text" name="keahlian_text" required class="w-full p-2 border rounded mb-4">
        
        <label class="block font-semibold mb-1">Deskripsi</label>
        <input type="deskripsi" name="deskripsi" required class="w-full p-2 border rounded mb-4">
        
        <label class="block font-semibold mb-1">Jabatan</label>
        <select name="jabatan" class="w-full p-2 border rounded mb-4">
            <option value="ketua_lab">ketua lab</option>
            <option value="asisten_lab">asisten lab</option>
            <option value="member">member</option>
        </select>
        
        <label class="block font-semibold mb-1">Foto Profil (opsional)</label>
        <input type="file" name="foto" class="w-full mb-4">

        <div class="md:col-span-2 flex pt-4">
            <button class="bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-red-700 transition duration-150">
                <i class="fas fa-user-plus mr-2"></i> Tambah Member
            </button>
        </div>
    </div>     
</form>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>
