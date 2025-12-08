<?php ob_start(); ?>

<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            <i class="fas fa-edit mr-2 text-yellow-600"></i> Edit User
        </h1>
        <a href="/admin/user" class="text-gray-500 hover:text-gray-700 transition flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <?php if(isset($_SESSION['error'])): ?>
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4 border border-red-300">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
    <?php endif; ?>

    <div class="flex justify-center mt-6">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 w-full max-w-3xl">

            <form action="/admin/user/update/<?= $user['id'] ?>" method="POST" class="p-8 space-y-6">

                <h3 class="text-lg font-semibold text-gray-700 border-b pb-3 flex items-center gap-2">
                    <i class="fas fa-user-edit text-gray-400"></i>
                    Edit Data User
                </h3>


                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Password <span class="text-xs text-gray-500">(kosongkan jika tidak diubah)</span>
                        </label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <select name="role"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-300 focus:outline-none">
                        <option value="admin" <?= $user['role']=='admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="editor" <?= $user['role']=='editor' ? 'selected' : '' ?>>Editor</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Dosen <span class="text-xs text-gray-500">(khusus editor)</span>
                    </label>
                    <select name="id_dosen"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-300 focus:outline-none">
                        <option value="">-- Pilih Dosen --</option>
                        <?php foreach($dosens as $d): ?>
                        <option value="<?= $d['id'] ?>" <?= ($user['id_dosen'] ?? '') == $d['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($d['nama']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Footer -->
                <div class="pt-4 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-lg font-semibold shadow transition">
                        <i class="fas fa-save mr-2"></i> Update Data
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php 
$content = ob_get_clean();
include "../app/views/admin/layouts/master.php";
?>