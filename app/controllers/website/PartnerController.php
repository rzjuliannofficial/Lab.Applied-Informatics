<?php
class PartnerController extends Controller
{
    public function index()
    {
        $data['partners'] = $this->model('Partners')->getAll();
        $data['title'] = 'Lab Applied Informatics Polinema';

        $this->view("public/layouts/header", $data);
        $this->view("public/partner/index", $data);
        $this->view("public/layouts/footer");
    }

    public function home()
    {
        $this->index();
    }
}
