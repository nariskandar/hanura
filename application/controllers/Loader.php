<?php

class Loader extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'masuk'){
			redirect('auth');
		}
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('loader/index');
    }
}