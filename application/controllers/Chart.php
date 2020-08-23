<?php

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Chart_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Chart';
        // $data['rekomendasi'] = $this->Rekom_model->getAllDataRekom();
        $data['hanura'] = $this->Chart_model->getAllData();
        $data['hitung'] = $this->Chart_model->getHitung();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('chart/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function partailain($url_encode, $id_par)
    {
        $url_decode    = urldecode($url_encode);
        $rekom    = json_decode($url_decode);

        $data['judul'] = 'Halaman Partai lain';
        // $data['rekomendasi'] = $this->Rekom_model->getAllDataRekom();
        $data['hanura'] = $this->Chart_model->getAllData();
        $data['hitung'] = $this->Chart_model->getHitung();
        $data['rekom'] = $this->Chart_model->getDataPartaiLain($rekom);
        $data['partai'] = $this->Chart_model->getPartaiName($rekom, $id_par);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('chart/partailain', $data);
        $this->load->view('layout/footer', $data);
    }
}