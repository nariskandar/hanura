<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tittle'] = 'HALAMAN LOGIN'; 

        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/index', $data);
        }else{
            $this->aksi_login();
        }        
    }

    function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => $password
			);

        $cek = $this->m_login->cek_login("tb_users_rekom",$where)->num_rows();

        if($cek > 0){

			$data_session = array(
				'email' => $email,
				'status' => 'masuk'
				);
 
			$this->session->set_userdata($data_session);
			redirect( base_url('rekom'));
		}else{
			redirect('auth');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
}