<?php
class AktivitasDosenController extends Controller
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
        $safe = "aktdosen_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        
        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/galeri_dosen/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/galeri_dosen/" . $safe : null;
    }

    public function index()
    {
        $m = new AktivitasDosen();

        if ($_SESSION['user']['role'] === 'editor') {
            $data['aktivitas'] = $m->getByDosen($_SESSION['user']['id_dosen']);
        } else {
            $data['aktivitas'] = $m->getAll();
        }

        $this->view("admin/aktivitasDosen/index", $data);
    }

    public function create()
    {
        $d = new Dosen();
        $data['dosen'] = $d->getAll();

        $this->view("admin/aktivitasDosen/create", $data);
    }

    public function store()
    {
        $m = new AktivitasDosen();
        $foto = $this->uploadDokumentasi('foto_url');
        $id_baru = $m->createAndReturnId([
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['jenis_aktivitas'],
            $_POST['tanggal'],
            $_POST['deskripsi'],
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
                null,             // id_publikasi_dosen
                $id_baru,         // id_aktivitas_dosen (ID YANG BARU)
                null, null, null, // id_ppm, id_riset_dosen, id_ki
                'Aktivitas Dosen' // Kategori
            ]);
        }
        $_SESSION['success'] = "Aktivitas berhasil ditambahkan";
        header("Location: /admin/AktivitasDosen");
    }

    public function edit($id)
    {
        $m = new AktivitasDosen();
        $d = new Dosen();

        $data['aktivitas'] = $m->find($id);
        $data['dosen'] = $d->getAll();

        $this->view("admin/aktivitasDosen/edit", $data);
    }

    public function update($id)
    {
        $m = new AktivitasDosen();
        $g = new Galeri();
        $old = $m->find($id);
        $foto_baru = $this->uploadDokumentasi('foto_url');
        
        if ($foto_baru) {
            $foto = $foto_baru;
        } else {
            $foto = $old['foto_url'];
        }

        $m->updateAktivitas($id, [
            $_POST['id_dosen'], $_POST['judul'], $_POST['jenis_aktivitas'], $_POST['tanggal'], $_POST['deskripsi'], $foto
        ]);
        
        // Jika ada foto baru, insert ke galeri
        if ($foto_baru) {
            $existing_galeri = $g->getByAktivitasDosen();
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
                    null,
                    $id,
                    null, null, null,
                    'Aktivitas Dosen'
                ]);
            }
        }
        
        $_SESSION['success'] = "Aktivitas berhasil diperbarui";
        header("Location: /admin/AktivitasDosen");
    }

    public function delete($id)
    {
        $m = new AktivitasDosen();
        $old = $m->find($id);
        if (!empty($old['foto_url'])) { $path = realpath(__DIR__ . '/../../..') . $old['foto_url']; if (file_exists($path)) unlink($path); }
        $m->delete($id);
        $_SESSION['success'] = "Aktivitas berhasil dihapus";
        header("Location: /admin/AktivitasDosen");
    }
}