<?php

class RisetDosenController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    private function isImageFile($filename)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        return in_array($ext, $allowed);
    }

    private function uploadDokumentasi($input = 'foto_bukti')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);
        $safe = "riset_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
        
        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/galeri_dosen/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/galeri_dosen/" . $safe : null;
    }

    public function index()
    {
        $m = new RisetDosen();

        if ($_SESSION['user']['role'] === 'editor') {
            $data['riset'] = $m->getByDosen($_SESSION['user']['id_dosen']);
        } else {
            $data['riset'] = $m->getAll();
        }

        $this->view("admin/risetDosen/index", $data);
    }

    public function create()
    {
        $d = new Dosen();
        $data['dosen'] = $d->getAll();

        $this->view("admin/risetDosen/create", $data);
    }

    public function store()
    {
        $m = new RisetDosen();

        // 1. Insert data riset & ambil ID
        $id_baru = $m->createAndReturnId([
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['tahun'],
            $_POST['sumber_dana']
        ]);

        // 2. Upload foto & masukkan ke galeri
        $foto = $this->uploadDokumentasi('foto_bukti');
        
        if ($foto && $this->isImageFile($foto)) {
            $g = new Galeri();
            $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;

            $g->create([
                $uploadedBy,
                $foto,
                $_POST['judul'],  // Caption
                null, null, null, // id_berita, id_produk, id_fasilitas
                null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm
                $id_baru,         // id_riset_dosen (ID YANG BARU)
                null,             // id_ki
                'Riset Dosen'     // Kategori
            ]);
        }

        $_SESSION['success'] = "Riset dosen berhasil ditambahkan.";
        header("Location: /admin/RisetDosen");
    }

    public function edit($id)
    {
        $r = new RisetDosen();
        $d = new Dosen();

        $data['riset'] = $r->find($id);
        $data['dosen'] = $d->getAll();

        $this->view("admin/risetDosen/edit", $data);
    }

    public function update($id)
    {
        $m = new RisetDosen();

        $m->updateRiset($id, [
            $_POST['id_dosen'],
            $_POST['judul'],
            $_POST['tahun'],
            $_POST['sumber_dana']
        ]);

        $_SESSION['success'] = "Riset dosen berhasil diperbarui.";
        header("Location: /admin/RisetDosen");
    }

    public function delete($id)
    {
        $m = new RisetDosen();
        $m->delete($id);

        $_SESSION['success'] = "Riset dosen berhasil dihapus.";
        header("Location: /admin/RisetDosen");
    }
}
