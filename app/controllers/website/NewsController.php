<?php
class NewsController extends Controller {
    
    // Halaman Daftar Semua Berita (/news)
    public function index() {
        $newsModel = $this->modelWebsite('NewsModel');
        
        $data['news'] = $newsModel->fetchAllNews();
        $data['title'] = 'Berita & Artikel - Lab AI Polinema';

        $this->view("public/layouts/header", $data);
        $this->view("public/news/index", $data); // File view baru
        $this->view("public/layouts/footer");
    }

    // Halaman Detail Berita (/news/detail/{id})
    public function detail($id) {
        if (!$id) {
            header("Location: /news");
            exit;
        }

        $newsModel = $this->modelWebsite('NewsModel');
        $berita = $newsModel->fetchNewsById($id);

        if (!$berita) {
            echo "Berita tidak ditemukan.";
            exit;
        }

        $data['berita'] = $berita;
        $data['title'] = $berita['judul'] . ' - Lab AI';

        // Ambil berita lain untuk sidebar (optional)
        $data['recent_news'] = $newsModel->fetchLatestNews(3);

        $this->view("public/layouts/header", $data);
        $this->view("public/news/detail", $data); // File view baru
        $this->view("public/layouts/footer");
    }
}