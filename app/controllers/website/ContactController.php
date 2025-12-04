<?php
class ContactController extends Controller
{
    public function index()
    {
        $data['title'] = 'Contact Us';

        $this->view("public/layouts/header", $data);
        $this->view("public/contact/index");
        $this->view("public/layouts/footer");
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            header("Location: /kontak");
            exit;
        }

        $kontakModel = $this->model("KontakModel");

        $kontakModel->create([
            $_POST['nama'],
            $_POST['email'],
            $_POST['subject'],
            $_POST['isi']
        ]);

        $_SESSION['success'] = "Pesan berhasil dikirim!";
        header("Location: /kontak");
        exit;
    }
}
