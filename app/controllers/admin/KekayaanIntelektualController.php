<?php

class KekayaanIntelektualController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    private function uploadDokumentasi($input = 'foto_bukti')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
        $safe = "hki_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        
        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/galeri_dosen/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/galeri_dosen/" . $safe : null;
    }

    public function index()
    {
        $m = new KekayaanIntelektual();
        $data['title'] = 'Kekayaan Intelektual';
        if ($_SESSION['user']['role'] === 'editor') {
            $data['ki'] = $m->getByDosen($_SESSION['user']['id_dosen']);
        } else {
            $data['ki'] = $m->getAll();
        }

        $this->view("admin/kekayaanIntelektual/index", $data);
    }

    public function create()
    {
        $d = new Dosen();
        $data['dosen'] = $d->getAll();

        $this->view("admin/kekayaanIntelektual/create", $data);
    }

    public function store()
    {
        $m = new KekayaanIntelektual();
        $foto = $this->uploadDokumentasi('foto_bukti');
        
        $id_baru = $m->createAndReturnId([
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['no_permohonan'],
            $_POST['tahun'],
            $foto
        ]);

        if ($foto) {
            $g = new Galeri();
            $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;

            $g->create([
                $uploadedBy,
                $foto,
                $_POST['judul'],  // Caption
                null, null, null, // id_berita, id_produk, id_fasilitas
                null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm
                null,             // id_riset_dosen
                $id_baru,         // id_kekayaan_intelektual (ID YANG BARU)
                'Kekayaan Intelektual' // Kategori
            ]);
        }
        $_SESSION['success'] = "Data Kekayaan Intelektual berhasil ditambahkan.";
        header("Location: /admin/KekayaanIntelektual");
    }

    public function edit($id)
    {
        $m = new KekayaanIntelektual();
        $d = new Dosen();

        $data['ki'] = $m->find($id);
        $data['dosen'] = $d->getAll();

        $this->view("admin/kekayaanIntelektual/edit", $data);
    }

    public function update($id)
    {
        $m = new KekayaanIntelektual();
        $g = new Galeri();
        $old = $m->find($id);
        $foto_baru = $this->uploadDokumentasi('foto_bukti');
        
        if ($foto_baru) {
            $foto = $foto_baru;
        } else {
            $foto = $old['foto_url'];
        }

        $m->updateKI($id, [
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['no_permohonan'],
            $_POST['tahun'],
            $foto
        ]);
        
        // Jika ada foto baru, insert ke galeri
        if ($foto_baru) {
            $existing_galeri = $g->getByKI();
            $found = false;
            foreach ($existing_galeri as $item) {
                if ($item['id'] != 0 && strpos($item['judul'], $_POST['judul']) !== false) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;
                $g->create([
                    $uploadedBy,
                    $foto_baru,
                    $_POST['judul'],
                    null, null, null,
                    null, null, null,
                    null,
                    $id,
                    'Kekayaan Intelektual'
                ]);
            }
        }
        
        $_SESSION['success'] = "Data Kekayaan Intelektual berhasil diperbarui.";
        header("Location: /admin/KekayaanIntelektual");
    }

    public function delete($id) {
        $m = new KekayaanIntelektual(); $old = $m->find($id);
        if (!empty($old['foto_url'])) { $path = realpath(__DIR__ . '/../../..') . $old['foto_url']; if (file_exists($path)) unlink($path); }
        $m->delete($id);
        $_SESSION['success'] = "Data HKI berhasil dihapus."; header("Location: /admin/KekayaanIntelektual");
    }
}