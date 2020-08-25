<?php

class Surat extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'masuk'){
			redirect('auth');
		}
        $this->load->model('Surat_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['judul'] = 'Halaman Master Jenis Surat';
        $data['surat'] = $this->Surat_model->getAllDataSurat();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('surat/index', $data);
        $this->load->view('layout/footer', $data);
    }

    public function tambah_aksi()
    {
        $data['judul'] = 'Halaman Master Jenis Surat';
        $data['surat'] = $this->Surat_model->getAllDataSurat();

        $this->form_validation->set_rules('nama_jenis_surat', 'Nama Surat', 'required|is_unique[tb_jenis_surat.nama_jenis_surat]');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/menubar', $data);
            $this->load->view('surat/index', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $nama_jenis_surat   = $this->input->post('nama_jenis_surat');
            $data               = $this->Surat_model->addDataSurat($nama_jenis_surat);
            
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('surat/index');
        }
    }

    public function edit_aksi()
    {
        $data['judul'] = 'Halaman Master Jenis Surat';
        $data['surat'] = $this->Surat_model->getAllDataSurat();
        
        $this->form_validation->set_rules('nama_jenis_surat', 'Nama Surat', 'required|is_unique[tb_jenis_surat.nama_jenis_surat]');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/menubar', $data);
            $this->load->view('surat/index', $data);
            $this->load->view('layout/footer', $data);
        }else{
            $id_jenis_surat     = $this->input->post('id_jenis_surat');
            $nama_jenis_surat   = $this->input->post('nama_jenis_surat');
            $data               = $this->Surat_model->editDataSurat($id_jenis_surat, $nama_jenis_surat);

            $this->session->set_flashdata('flash', 'Diedit');
            redirect('surat/index');
        }
    }

    public function delete_aksi($id_jenis_surat)
    {
        $data               = $this->Surat_model->deleteDataSurat($id_jenis_surat);
        
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('surat/index');
    }
}