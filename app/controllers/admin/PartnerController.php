<?php

class PartnerController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }

    /* ==========================
     *     Upload FOTO
     * ========================== */
    private function uploadLogo($input = 'logo')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $file = $_FILES[$input];
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

        $safe = "partner_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;

        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/partner/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        // Return path format: /uploads/dosen/filename.ext
        return move_uploaded_file($file['tmp_name'], $dir . $safe) ? "/uploads/partner/" . $safe : null;
    }

    /* ==========================
     *          INDEX
     * ========================== */
    public function index()
    {
        $m = new Partners();
        $data['partners'] = $m->getAll();
        $data['title'] = 'Partner';
        $this->view("admin/partner/index", $data);
    }

    /* ==========================
     *          CREATE
     * ========================== */
    public function create()
    {
        $this->view("admin/partner/create");
    }

    /* ==========================
     *          STORE
     * ========================== */
    public function store()
    {
        $nama = trim($_POST['nama'] ?? '');
        $website = trim($_POST['website'] ?? null);
        $deskripsi = trim($_POST['deskripsi'] ?? null);
        $kategori = trim($_POST['kategori'] ?? '');
        
        if ($nama === '' || $kategori === '') {
            $_SESSION['error'] = "Semua field wajib diisi.";
            return header("Location: /admin/partner/create");
        }

        $logo = $this->uploadLogo();

        $m = new Partners();
        $m->create([
            'nama' => $nama,
            'logo' => $logo,
            'website' => $website,
            'deskripsi' => $deskripsi,
            'kategori'  => $kategori
        ]);

        $_SESSION['success'] = "Partner berhasil ditambahkan.";
        header("Location: /admin/partner");
    }

    /* ==========================
     *          EDIT
     * ========================== */
    public function edit($id)
    {
        $m = new Partners();
        $data['partners'] = $m->find($id);

        if (!$data['partners']) {
            $_SESSION['error'] = "Data partner tidak ditemukan.";
            return header("Location: /admin/partner");
        }

        $this->view("admin/partner/edit", $data);
    }

    /* ==========================
     *          UPDATE
     * ========================== */
    public function update($id)
    {
        $m = new Partners();
        $old = $m->find($id);

        if (!$old) {
            $_SESSION['error'] = "Data partner tidak ditemukan.";
            return header("Location: /admin/partner");
        }

        $nama = trim($_POST['nama'] ?? '');
        $website = trim($_POST['website'] ?? null);
        $deskripsi = trim($_POST['deskripsi'] ?? null);
        $kategori = trim($_POST['kategori'] ?? '');

        if ($nama === '' || $kategori === '') {
            $_SESSION['error'] = "Semua field wajib diisi.";
            return header("Location: /admin/partner/edit/{$id}");
        }

        $logoBaru = $this->uploadLogo();
        if (!$logoBaru) {
            $logoBaru = $old['logo'];
        } else {
            $file = realpath(__DIR__ . '/../../..') . "/public" . $old['logo'];
            if (is_file($file)) @unlink($file);
        }

        $result = $m->update($id, [
            'nama' => $nama,
            'website' => $website,
            'logo' => $logoBaru,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori
        ]);

        if ($result) {
            $_SESSION['success'] = "Partner berhasil diperbarui.";
        } else {
            $_SESSION['error'] = "Gagal memperbarui data partner.";
        }
        header("Location: /admin/partner");
    }

    /* ==========================
     *          DELETE
     * ========================== */
    public function delete($id)
    {
        $m = new Partners();
        $row = $m->find($id);

        if ($row && !empty($row['logo'])) {
            $file = realpath(__DIR__ . '/../../..') . "/public" . $row['logo'];
            if (is_file($file)) @unlink($file);
        }

        $m->delete($id);

        $_SESSION['success'] = "Partner berhasil dihapus.";
        header("Location: /admin/partner");
    }
}
