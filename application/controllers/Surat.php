<?php

class Surat extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
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
        $nama_jenis_surat   = $this->input->post('nama_jenis_surat');
        $data               = $this->Surat_model->addDataSurat($nama_jenis_surat);
        redirect('surat/index');
    }

    public function edit_aksi()
    {
        $id_jenis_surat     = $this->input->post('id_jenis_surat');
        $nama_jenis_surat   = $this->input->post('nama_jenis_surat');
        $data               = $this->Surat_model->editDataSurat($id_jenis_surat, $nama_jenis_surat);
        redirect('surat/index');
    }

    public function delete_aksi($id_jenis_surat)
    {
        $data               = $this->Surat_model->deleteDataSurat($id_jenis_surat);
        redirect('surat/index');
    }
}