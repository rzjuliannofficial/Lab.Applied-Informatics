<?php
class MemberController extends Controller
{
    public function index()
    {
        $data['team'] = $this->model('dosen')->getAll();
        $data['title'] = 'Lab Applied Informatics Polinema';

        $this->view("public/layouts/header", $data);
        $this->view("public/member/index", $data);
        $this->view("public/layouts/footer");
    }

    public function home()
    {
        $this->index();
    }

    public function detail($id)
    {
        $dosenModel = $this->model('dosen');
        $data['member'] = $dosenModel->find($id);
        
        if (!$data['member']) {
            header('Location: /member');
            exit;
        }

        // Get publications related to this member
        $publikasiModel = $this->model('PublikasiDosen');
        $data['publications'] = $publikasiModel->getByDosen($id);
        
        // Get riset (research) related to this member
        $risetModel = $this->model('RisetDosen');
        $data['riset'] = $risetModel->getByDosen($id);
        
        // Get kekayaan intelektual (intellectual property) related to this member
        $kekayaanModel = $this->model('KekayaanIntelektual');
        $data['kekayaan'] = $kekayaanModel->getByDosen($id);
        
        // Get PPM (community service) related to this member
        $ppmModel = $this->model('Ppm');
        $data['ppm'] = $ppmModel->getByDosen($id);
        
        // Get aktivitas (activities) related to this member
        $aktivitasModel = $this->model('AktivitasDosen');
        $data['aktivitas'] = $aktivitasModel->getByDosen($id);
        
        $data['title'] = 'Profile ' . $data['member']['nama'] . ' - Lab Applied Informatics';

        $this->view("public/layouts/header", $data);
        $this->view("public/member/detail", $data);
        $this->view("public/layouts/footer");
    }
}

