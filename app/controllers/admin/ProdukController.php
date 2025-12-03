<?php

class ProdukController extends Controller
{
    public function __construct()
    {
        Middleware::onlyAdmin(); // khusus admin
    }

    private function isImageFile($filename)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];
        return in_array($ext, $allowed);
    }

    private function uploadImage($input = 'image')
    {
        if (empty($_FILES[$input]) || $_FILES[$input]['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $f = $_FILES[$input];
        $ext = pathinfo($f['name'], PATHINFO_EXTENSION);

        $safe = "produk_" . time() . "_" . bin2hex(random_bytes(5)) . "." . $ext;

        $dir = realpath(__DIR__ . '/../../..') . "/public/uploads/produk/";
        if (!is_dir($dir)) mkdir($dir, 0777, true);

        return move_uploaded_file($f['tmp_name'], $dir . $safe) ? "/uploads/produk/" . $safe : null;
    }


    public function index()
    {
        $m = new Produk();
        $data['produk'] = $m->getAll();

        $this->view("admin/produk/index", $data);
    }

    public function create()
    {
        $this->view("admin/produk/create");
    }


    // ====================================================
    // STORE — SIMPAN PRODUK BARU + MASUK GALERI
    // ====================================================
    public function store()
    {
        $image = $this->uploadImage();

        // CREATE produk + return ID
        $m = new Produk();
        $id_produk = $m->createAndReturnId([
            $_POST['nama_produk'],
            $_POST['deskripsi'],
            $_POST['link_demo'],
            $image,
            $_POST['kategori']
        ]);

        // Masukkan ke galeri jika image valid
        if ($image && $this->isImageFile($image)) {
            $g = new Galeri();
            $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;

            $g->create([
                $uploadedBy,
                $image,
                "",                     // caption kosong dulu
                null, $id_produk, null, // id_berita, id_produk, id_fasilitas
                null, null, null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, id_ki
                'Produk'                // kategori
            ]);
        }

        $_SESSION['success'] = "Produk berhasil ditambahkan.";
        header("Location: /admin/produk");
    }


    // ====================================================
    // EDIT PRODUK
    // ====================================================
    public function edit($id)
    {
        $m = new Produk();
        $data['produk'] = $m->find($id);

        $this->view("admin/produk/edit", $data);
    }


    // ====================================================
    // UPDATE PRODUK + MASUK GALERI (JIKA FOTO BARU)
    // ====================================================
    public function update($id)
    {
        $m = new Produk();
        $old = $m->find($id);

        $image = $this->uploadImage();
        if (!$image) $image = $old['image'];

        $m->updateData($id, [
            $_POST['nama_produk'],
            $_POST['deskripsi'],
            $_POST['link_demo'],
            $image,
            $_POST['kategori']
        ]);

        // jika upload image baru → masukkan galeri
        if ($image !== $old['image'] && $this->isImageFile($image)) {
            // Cek apakah sudah ada di galeri
            $g = new Galeri();
            $existing = $g->getByProduk();
            $found = false;
            foreach ($existing as $item) {
                if (!empty($item['id']) && strpos($item['judul'] ?? '', $_POST['nama_produk']) !== false) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                $uploadedBy = $_SESSION['user']['id_dosen'] ?? null;
                $g->create([
                    $uploadedBy,
                    $image,
                    "",
                    null, $id, null, // id_berita, id_produk, id_fasilitas
                    null, null, null, null, null, // id_publikasi_dosen, id_aktivitas_dosen, id_ppm, id_riset_dosen, id_ki
                    'Produk'         // kategori
                ]);
            }
        }

        $_SESSION['success'] = "Produk berhasil diperbarui.";
        header("Location: /admin/produk");
    }


    // ====================================================
    // DELETE PRODUK
    // ====================================================
    public function delete($id)
    {
        $m = new Produk();
        $row = $m->find($id);

        if (!empty($row['image'])) {
            $filePath = realpath(__DIR__ . '/../../..') . $row['image'];
            if (file_exists($filePath)) unlink($filePath);
        }

        $m->delete($id);

        $_SESSION['success'] = "Produk berhasil dihapus.";
        header("Location: /admin/produk");
    }
}
