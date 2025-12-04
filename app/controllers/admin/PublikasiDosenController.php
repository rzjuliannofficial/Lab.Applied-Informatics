<?php

class PublikasiDosenController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    private function uploadDokumentasi($input = 'foto_url')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
        $safe = "pubdosen_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        
        // Simpan di folder umum atau khusus
        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/galeri_dosen/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/galeri_dosen/" . $safe : null;
    }

    public function index()
    {
        $m = new PublikasiDosen();

        if ($_SESSION['user']['role'] === 'editor') {
            $data['publikasi'] = $m->getByDosen($_SESSION['user']['id_dosen']);
        } else {
            $data['publikasi'] = $m->getAll();
        }

        $this->view("admin/publikasiDosen/index", $data);
    }

    public function create()
    {
        $dosenModel = new Dosen();
        $data['dosen'] = $dosenModel->getAll();

        $this->view("admin/publikasiDosen/create", $data);
    }
    
    public function store() {
        $m = new PublikasiDosen();
        $foto = $this->uploadDokumentasi('foto_url'); // Pastikan name di form view adalah 'foto_url'
        
       // 2. Create Data Utama & Ambil ID
        $id_baru = $m->createAndReturnId([
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['deskripsi'],
            $_POST['tahun'],
            $_POST['link_jurnal'],
            $_POST['kategori'],
            $foto
        ]);
        
        // 3. Upload Foto & Masukkan ke Galeri
        
        if ($foto) {
            $g = new Galeri();
            $uploadedBy = $_SESSION['user']['id_dosen'] ?? null; // Menggunakan ID Dosen yg sedang login/dipilih
            $g->create([
                $uploadedBy,
                $foto,
                $_POST['judul'], // Caption otomatis dari judul
                null, // id_berita
                null, // id_produk
                null, // id_fasilitas
                $id_baru, // id_publikasi_dosen (YANG INI DIISI)
                null, // id_aktivitas_dosen
                null, // id_ppm
                null, // id_riset_dosen
                null, // id_ki
                'Publikasi Dosen' // Kategori
            ]);
        }
        $_SESSION['success'] = "Publikasi berhasil ditambahkan."; header("Location: /admin/PublikasiDosen");
    }

    public function edit($id)
    {
        $m = new PublikasiDosen();
        $d = new Dosen();
        $data['publikasi'] = $m->find($id);
        $data['dosen'] = $d->getAll();
        $this->view("admin/publikasiDosen/edit", $data);
    }
    public function update($id) {
        $m = new PublikasiDosen();
        $g = new Galeri();
        $old = $m->find($id);
        $foto_baru = $this->uploadDokumentasi('foto_url');
        
        if ($foto_baru) {
            // Ada foto baru, gunakan foto baru
            $foto = $foto_baru;
        } else {
            // Tidak ada foto baru, gunakan foto lama
            $foto = $old['foto_url'];
        }

        $m->updatePublikasi($id, [
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['deskripsi'],
            $_POST['tahun'],
            $_POST['link_jurnal'],
            $_POST['kategori'],
            $foto
        ]);
        
        // Jika ada foto baru, insert ke galeri atau update galeri yang sudah ada
        if ($foto_baru) {
            // Cek apakah sudah ada record di galeri untuk publikasi ini
            $existing_galeri = $g->getByPublikasiDosen();
            $found = false;
            foreach ($existing_galeri as $item) {
                if ($item['id'] != 0 && strpos($item['judul'], $_POST['judul']) !== false) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                // Insert galeri baru
                $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;
                $g->create([
                    $uploadedBy,
                    $foto_baru,
                    $_POST['judul'],
                    null, null, null,
                    $id,
                    null, null, null, null,
                    'Publikasi Dosen'
                ]);
            }
            // Jika sudah ada, skip (user bisa update caption via galeri menu)
        }
        
        $_SESSION['success'] = "Publikasi berhasil diperbarui"; header("Location: /admin/PublikasiDosen");
    }

    public function delete($id) {
        $m = new PublikasiDosen();
        $old = $m->find($id);
        if (!empty($old['foto_url'])) {
            $path = realpath(__DIR__ . '/../../..') . $old['foto_url'];
            if (file_exists($path)) unlink($path);
        }
        $m->delete($id); // Delete di tabel utama akan men-trigger cascade delete di Galeri (jika diset di DB)
        $_SESSION['success'] = "Publikasi berhasil dihapus"; header("Location: /admin/PublikasiDosen");
    }
}