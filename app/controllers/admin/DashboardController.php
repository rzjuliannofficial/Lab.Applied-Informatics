<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        Middleware::auth();
    }
    public function index()
    {
        // Load Model
        $dosenModel = new Dosen();
        $userModel = new Users();
        $publikasiModel = new PublikasiDosen();
        $galeriModel = new Galeri();
        $beritaModel = new Berita();
        $produkModel = new Produk();
        $galeriModel = new Galeri();
        $partnerModel = new Partners();

        // Ambil statistik
        $totalDosen = $dosenModel->countAll();
        $totalEditor     = $userModel->countEditors();
        $totalPublikasi = $publikasiModel->countAll();
        $totalGaleri     = $galeriModel->countAll();
        $totalBerita = $beritaModel -> countAll();
        $totalProduk = $produkModel -> countAll();
        $totalGaleri = $galeriModel -> countAll();
        $totalPartner = $partnerModel -> countAll();

        // Kirim ke view
        
        $this->view('admin/dashboard/dashboard', [
            'totalDosen' => $totalDosen,
            'totalEditor'    => $totalEditor,
            'totalPublikasi' => $totalPublikasi,
            'totalGaleri' => $totalGaleri,
            'totalBerita' => $totalBerita,
            'totalProduk' => $totalProduk,
            'totalPartner' => $totalPartner
        ]);
    }
}
