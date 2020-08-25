<?php

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'masuk'){
			redirect('auth');
		}
        $this->load->helper('url');
        // $this->load->model('Data_rekom');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Utama';

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('layout/footer', $data);
    }
}