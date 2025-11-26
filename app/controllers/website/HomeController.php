<?php

require_once __DIR__ . "/../../models/website/WebsiteModel.php";
require_once __DIR__ . "/../../models/website/ProductModel.php";
require_once __DIR__ . '/../../models/website/PublicationModel.php';


class HomeController extends Controller {

    public function home() {
        return $this->index();
    }

    public function index() {

        // ambil data team dari WebsiteModel
        $team = WebsiteModel::fetchTeam();

        // ambil data produk dari ProductModel
        $productModel = new ProductModel();
        $products = $productModel->getAll();

        // ambil data produk dari PublicationModel
        $publicationModel = new PublicationModel();
        $publications = $publicationModel->getAll();

        // load view
        require __DIR__ . "/../../views/website/home/index.php";

    }
}
