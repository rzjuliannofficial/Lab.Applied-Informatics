<?php

class BeritaController extends Controller
{
    public function __construct()
    {
        Middleware::onlyAdmin(); // hanya admin
    }

    private function isImageFile($filename)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        return in_array($ext, $allowed);
    }

    private function uploadImage($input = 'gambar_utama')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);

        $safe = "berita_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;

        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/berita/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/berita/" . $safe : null;
    }

    public function index()
    {
        $m = new Berita();
        $data['title'] = 'Berita';
        $data['berita'] = $m->getAll();

        $this->view("admin/berita/index", $data);
    }

    public function create()
    {
        $this->view("admin/berita/create");
    }

    public function store()
    {
        $gambar = $this->uploadImage();

        $m = new Berita();
        $id_berita = $m->createAndReturnId([
            $_SESSION['user']['id_dosen'], // created_by
            $_POST['judul'],
            $_POST['isi_berita'],
            $_POST['tanggal'],
            $gambar,
            $_POST['kategori']
        ]);

        // ===== INSERT KE GALERI =====
        if ($gambar && $this->isImageFile($gambar)) {

            $g = new Galeri();
            $g->create([
                $_SESSION['user']['id_dosen'],
                $gambar,
                "",
                $id_berita, // id_berita
                null,       // id_produk
                null,       // id_fasilitas
                null, null, null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, id_ki
                'Berita'    // kategori
            ]);
        }

        $_SESSION['success'] = "Berita berhasil ditambahkan.";
        header("Location: /admin/berita");
    }

    public function edit($id)
    {
        $m = new Berita();
        $data['berita'] = $m->find($id);

        $this->view("admin/berita/edit", $data);
    }

    public function update($id)
    {
        $m = new Berita();
        $old = $m->find($id);

        $gambar = $this->uploadImage();
        if (!$gambar) $gambar = $old['gambar_utama'];

        $m->updateData($id, [
            $_POST['judul'],
            $_POST['isi_berita'],
            $_POST['tanggal'],
            $gambar,
            $_POST['kategori']
        ]);

        // Jika gambar baru diupload → masuk galeri
        if ($gambar !== $old['gambar_utama'] && $this->isImageFile($gambar)) {
            // Cek apakah sudah ada di galeri
            $g = new Galeri();
            $existing = $g->getByBerita();
            $found = false;
            foreach ($existing as $item) {
                if (!empty($item['id']) && strpos($item['judul'] ?? '', $_POST['judul']) !== false) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $g->create([
                    $_SESSION['user']['id_dosen'],
                    $gambar,
                    "",
                    $id,        // id_berita
                    null, null, // id_produk, id_fasilitas
                    null, null, null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, id_ki
                    'Berita'    // kategori
                ]);
            }
        }

        $_SESSION['success'] = "Berita berhasil diperbarui.";
        header("Location: /admin/berita");
    }

    
    public function delete($id)
    {
        $m = new Berita();
        $old = $m->find($id);

        if (!empty($old['gambar_utama'])) {
            $path = realpath(__DIR__ . '/../../..') . $old['gambar_utama'];
            if (file_exists($path)) unlink($path);
        }

        $m->delete($id);

        $_SESSION['success'] = "Berita berhasil dihapus.";
        header("Location: /admin/berita");
    }
}
