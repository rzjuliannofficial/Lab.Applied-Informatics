<?php
class GalleryController extends Controller
{
    public function index()
    {
        $galeriModel = $this->model('Galeri');

        // Ambil data galeri berdasarkan kategori BARU (Aktivitas Dosen)
        $data['galeriPublikasi'] = $galeriModel->getByPublikasiDosen();
        $data['galeriBerita'] = $galeriModel->getByBerita();
        $data['galeriProduk'] = $galeriModel->getByProduk();
        $data['galeriFasilitas'] = $galeriModel->getByFasilitas();
        $data['galeriAktivitas'] = $galeriModel->getByAktivitasDosen();
        $data['galeriPpm'] = $galeriModel->getByPpm();
        $data['galeriRiset'] = $galeriModel->getByRiset();
        $data['galeriHKI'] = $galeriModel->getByKI();

        // Gabungkan semua galeri untuk carousel
        $data['galleryItems'] = array_merge(
            $data['galeriPublikasi'],
            $data['galeriAktivitas'],
            $data['galeriPpm'],
            $data['galeriRiset'],
            $data['galeriHKI'],
            $data['galeriBerita'],
            $data['galeriProduk'],
            $data['galeriFasilitas']
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
