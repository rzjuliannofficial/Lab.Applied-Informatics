<?php
class HomeController extends Controller {
    public function index() {

        // ORIGINAL MODELS
        $productModel = $this->modelWebsite('ProductModel');
        $memberModel = $this->modelWebsite('MemberModel');
        $newsModel = $this->modelWebsite('NewsModel');
        $pubModel = $this->modelWebsite('PublicationModel');
        $fasilitasModel = $this->model('Fasilitas');

        // Fetch Data
        $data['products'] = $productModel->fetchProduct();
        $data['team'] = $memberModel->fetchTeam();
        $data['news'] = $newsModel->fetchLatestNews(3);
        $data['publications'] = $pubModel->FetchPublication();
        $data['fasilitas'] = $fasilitasModel->getAll();
        $data['title'] = 'Lab Applied Informatics Polinema';

        $this->view("public/layouts/header", $data);
        $this->view("public/home/index", $data);
        $this->view("public/layouts/footer");
    }
}