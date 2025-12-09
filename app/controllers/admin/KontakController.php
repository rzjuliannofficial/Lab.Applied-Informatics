<?php

class KontakController extends Controller
{
    public function __construct()
    {
        Middleware::onlyAdmin();
    }

    public function index()
    {
        $kontakModel = new KontakModel();
        $data['pesan'] = $kontakModel->getAll();
        $data['title'] = 'Kontak';
        $this->view("admin/kontak/index", $data);
    }

    public function delete($id)
    {
        $kontakModel = new KontakModel();
        $kontakModel->delete($id);

        $_SESSION['success'] = "Pesan berhasil dihapus!";
        header("Location: /admin/kontak");
    }
}
