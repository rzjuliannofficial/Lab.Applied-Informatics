<?php
class GalleryController extends Controller
{
    public function index()
    {
        $galeriModel = $this->model('Galeri');

        // Ambil data galeri berdasarkan kategori
        $data['galeriPublikasi'] = $galeriModel->getByPublikasiLab();
        $data['galeriBerita'] = $galeriModel->getByBerita();
        $data['galeriProduk'] = $galeriModel->getByProduk();
        $data['galeriFasilitas'] = $galeriModel->getByFasilitas();
        $data['galeriPenelitian'] = $galeriModel->getByPenelitianLab();
        $data['galeriKegiatan'] = $galeriModel->getByKegiatanLab();

        // Gabungkan semua galeri untuk carousel
        $data['galleryItems'] = array_merge(
            $data['galeriPublikasi'],
            $data['galeriBerita'],
            $data['galeriProduk'],
            $data['galeriFasilitas'],
            $data['galeriPenelitian'],
            $data['galeriKegiatan']
        );

        // Urutkan berdasarkan tanggal terbaru
        usort($data['galleryItems'], function($a, $b) {
            return strtotime($b['tanggal_upload']) - strtotime($a['tanggal_upload']);
        });

        $data['title'] = 'Lab Applied Informatics Polinema';

        $this->view("public/layouts/header", $data);
        $this->view("public/gallery/index", $data);
        $this->view("public/layouts/footer");
    }

    public function home()
    {
        $this->index();
    }
}
