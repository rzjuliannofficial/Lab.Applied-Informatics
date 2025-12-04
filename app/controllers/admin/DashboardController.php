<?php

class DashboardController extends Controller
{
    public function index()
    {
        // Load Model
        $dosenModel = new dosen();
        $userModel = new Users();
        $publikasiModel = new PublikasiDosen();
        $galeriModel = new Galeri();

        // Ambil statistik
        $totalDosen = $dosenModel->countAll();
        $totalEditor     = $userModel->countEditors();
        $totalPublikasi = $publikasiModel->countAll();
        $totalGaleri     = $galeriModel->countAll();

        // Kirim ke view
        
        $this->view('admin/dashboard/Dashboard', [
            'totalDosen' => $totalDosen,
            'totalEditor'    => $totalEditor,
            'totalPublikasi' => $totalPublikasi,
            'totalGaleri' => $totalGaleri
        ]);
    }
}
