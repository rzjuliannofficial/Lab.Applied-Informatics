<?php

class PpmController extends Controller
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
        $safe = "ppm_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        
        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/ppm/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/ppm/" . $safe : null;
    }

    public function index()
    {
        $m = new Ppm();
        $data['title'] = 'PPM';
        if ($_SESSION['user']['role'] === 'editor') {
            $data['ppm'] = $m->getByDosen($_SESSION['user']['id_dosen']);
        } else {
            $data['ppm'] = $m->getAll();
        }

        $this->view("admin/ppm/index", $data);
    }
    public function create()
    {
        $d = new Dosen();
        $data['dosen'] = $d->getAll();

        $this->view("admin/ppm/create", $data);
    }

    public function store()
    {
        $m = new Ppm();
        $foto = $this->uploadDokumentasi('foto_url');
        $id_baru = $m->createAndReturnId([
            $_POST['id_dosen'],
            $_POST['judul'],
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
                null, null,       // id_publikasi_dosen, id_aktivitas_dosen
                $id_baru,         // id_ppm (ID YANG BARU)
                null, null,       // id_riset_dosen, id_ki
                'PPM'             // Kategori
            ]);
        }
        $_SESSION['success'] = "PPM berhasil ditambahkan";
        header("Location: /admin/Ppm");
    }

    public function edit($id)
    {
        $ppm = new Ppm();
        $d = new Dosen();

        $data['ppm'] = $ppm->find($id);
        $data['dosen'] = $d->getAll();

        $this->view("admin/ppm/edit", $data);
    }

    public function update($id) {
        $m = new Ppm();
        $g = new Galeri();
        $old = $m->find($id);
        $foto_baru = $this->uploadDokumentasi('foto_url');
        
        if ($foto_baru) {
            $foto = $foto_baru;
        } else {
            $foto = $old['foto_url'];
        }

        $m->updatePpm($id, [
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['tahun'],
            $foto
        ]);
        
        // Jika ada foto baru, insert ke galeri
        if ($foto_baru) {
            $existing_galeri = $g->getByPpm();
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
                    null, null,
                    $id,
                    null, null,
                    'PPM'
                ]);
            }
        }
        
        $_SESSION['success'] = "PPM berhasil diperbarui";
        header("Location: /admin/Ppm");
    }

    public function delete($id) {
        $m = new Ppm(); $old = $m->find($id);
        if (!empty($old['foto_url'])) { $path = realpath(__DIR__ . '/../../..') . $old['foto_url']; if (file_exists($path)) unlink($path); }
        $m->delete($id);
        $_SESSION['success'] = "PPM berhasil dihapus"; header("Location: /admin/Ppm");
    }
}