<?php

class Chart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Chart_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Chart';
        // $data['rekomendasi'] = $this->Rekom_model->getAllDataRekom();
        // $data['jmlh_hanura'] = $this->Rekom_model->getJumlahHanura();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('chart/index', $data);
        $this->load->view('layout/footer', $data);
    }
}