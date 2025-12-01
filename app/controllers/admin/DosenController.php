<?php

class DosenController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    /* ==========================
     *     Upload FOTO
     * ========================== */
    private function uploadFoto($input = 'foto')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);

        $safe = "dosen_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;

        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/dosen/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        // Return path format: /uploads/dosen/filename.ext
        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/dosen/" . $safe : null;
    }

    /* ==========================
     *          INDEX
     * ========================== */
    public function index()
    {
        $m = new Dosen();
        $data['dosen'] = $m->getAll();

        $this->view("admin/dosen/index", $data);
    }

    /* ==========================
     *          CREATE
     * ========================== */
    public function create()
    {
        $this->view("admin/dosen/create");
    }

    /* ==========================
     *          STORE
     * ========================== */
    public function store()
    {
        $nama       = trim($_POST['nama'] ?? '');
        $nip        = trim($_POST['nip'] ?? '');
        $email      = trim($_POST['email'] ?? '');
        $keahlian   = trim($_POST['keahlian_text'] ?? null);
        $deskripsi  = trim($_POST['deskripsi'] ?? null);
        $jabatan    = trim($_POST['jabatan'] ?? 'member');
        $google_scholar  = trim($_POST['link_scholar'] ?? null);
        $researcher  = trim($_POST['link_researchgate'] ?? null);
        $orcid    = trim($_POST['link_orcid'] ?? null);
        
        if ($nama === '' || $nip === '' || $email === '') {
            $_SESSION['error'] = "Semua field wajib diisi.";
            return header("Location: /admin/dosen/create");
        }

        $foto = $this->uploadFoto();

        $m = new Dosen();
        $m->create([
            'nama'           => $nama,
            'nip'            => $nip,
            'email'          => $email,
            'foto'           => $foto,
            'keahlian_text'  => $keahlian,
            'deskripsi'      => $deskripsi,
            'jabatan'        => $jabatan,
            'google_scholar' => $google_scholar,
            'researcher'     => $researcher,
            'orcid'          => $orcid 
        ]);

        $_SESSION['success'] = "Dosen berhasil ditambahkan.";
        header("Location: /admin/dosen");
    }

    /* ==========================
     *          EDIT
     * ========================== */
    public function edit($id)
    {
        $m = new Dosen();
        $data['dosen'] = $m->find($id);

        if (!$data['dosen']) {
            $_SESSION['error'] = "Data dosen tidak ditemukan.";
            return header("Location: /admin/dosen");
        }

        $this->view("admin/dosen/edit", $data);
    }

    /* ==========================
     *          UPDATE
     * ========================== */
    public function update($id)
    {
        $m = new Dosen();
        $old = $m->find($id);

        if (!$old) {
            $_SESSION['error'] = "Data dosen tidak ditemukan.";
            return header("Location: /admin/dosen");
        }

        $nama       = trim($_POST['nama'] ?? '');
        $nip        = trim($_POST['nip'] ?? '');
        $email      = trim($_POST['email'] ?? '');
        $keahlian   = trim($_POST['keahlian_text'] ?? '');
        $deskripsi  = trim($_POST['deskripsi'] ?? '');
        $jabatan    = trim($_POST['jabatan'] ?? 'member');
        $google_scholar  = !empty(trim($_POST['link_scholar'] ?? '')) ? trim($_POST['link_scholar']) : null;
        $researcher  = !empty(trim($_POST['link_researchgate'] ?? '')) ? trim($_POST['link_researchgate']) : null;
        $orcid    = !empty(trim($_POST['link_orcid'] ?? '')) ? trim($_POST['link_orcid']) : null;

        if ($nama === '' || $nip === '' || $email === '') {
            $_SESSION['error'] = "Semua field wajib diisi.";
            return header("Location: /admin/dosen/edit/{$id}");
        }

        $fotoBaru = $this->uploadFoto();
        if (!$fotoBaru) {
            $fotoBaru = $old['foto_profil'];
        }

        $result = $m->updateDosen($id, [
            'nama'          => $nama,
            'nip'           => $nip,
            'email'         => $email,
            'foto'          => $fotoBaru,
            'keahlian_text' => $keahlian,
            'deskripsi'     => $deskripsi,
            'jabatan'       => $jabatan,
            'google_scholar' => $google_scholar,
            'researcher'     => $researcher,
            'orcid'          => $orcid 
        ]);

        if ($result) {
            $_SESSION['success'] = "Dosen berhasil diperbarui.";
        } else {
            $_SESSION['error'] = "Gagal memperbarui data dosen.";
        }
        header("Location: /admin/dosen");
    }

    /* ==========================
     *          DELETE
     * ========================== */
    public function delete($id)
    {
        $m = new Dosen();
        $row = $m->find($id);

        if ($row && !empty($row['foto_profil'])) {
            $file = realpath(__DIR__ . '/../../..') . "/public/uploads/dosen/" . $row['foto_profil'];
            if (is_file($file)) @unlink($file);
        }

        $m->delete($id);

        $_SESSION['success'] = "Dosen berhasil dihapus.";
        header("Location: /admin/dosen");
    }
}
