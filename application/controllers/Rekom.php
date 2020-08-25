<?php

class Rekom extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != 'masuk'){
			redirect('auth');
		}
        $this->load->model('Rekom_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

    }

    public function index()
    {
        $data['judul'] = 'Halaman Data Rekom';
        $data['rekomendasi'] = $this->Rekom_model->getAllDataRekom();
        $data['jmlh_hanura'] = $this->Rekom_model->getJumlahHanura();
        $data['alldatacalon'] = $this->Rekom_model->getCountDataCalon();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/index', $data);
        $this->load->view('layout/footer', $data);
    }


    public function diusunghanura()
    {
        $data['judul'] = 'Halaman Data Calon di Usung Partai Hanura';
        $data['rekomendasi'] = $this->Rekom_model->getAllDataHanura();
        $data['jmlh_hanura'] = $this->Rekom_model->getJumlahHanura();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/diusunghanura', $data);
        $this->load->view('layout/footer', $data);
    }

    public function seluruhcalon()
    {
        $data['judul'] = 'Halaman Seluruh Calon';
        $data['alldatacalon'] = $this->Rekom_model->getAllDataCalon();
        // $data['jmlh_hanura'] = $this->Rekom_model->getJumlahHanura();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/seluruhcalon', $data);
        $this->load->view('layout/footer', $data);
    }

    public function seluruhkab()
    {
        $data['judul'] = 'Halaman Seluruh Kabupaten/Kota';
        $data['alldatakab'] = $this->Rekom_model->getAllDataKab();
        // $data['jmlh_hanura'] = $this->Rekom_model->getJumlahHanura();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/seluruhkab', $data);
        $this->load->view('layout/footer', $data);
    }

    public function detail($id_rekom, $geo_prov_id, $geo_kab_id)
    {
        $data['judul'] = 'Datail Data Rekom';
        $data['rekomendasi'] = $this->Rekom_model->getDataRekomById($id_rekom);
        $data['datakursi'] = $this->Rekom_model->getDataKursi($id_rekom, $geo_prov_id, $geo_kab_id);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/detail', $data);
        $this->load->view('layout/footer', $data);
    }

    public function partai()
    {
        $data['judul'] = 'Cek';
        $partai = $this->Rekom_model->getAllDataTbPartai();
        $kursi = $this->Rekom_model->getAllDataTbKursi();
        
        $id_partai= [];
        foreach ($kursi as $kur) {
            $nama_partai = $kur['partai'];

            $index = array_search($nama_partai, array_column($partai, 'partai'));

            $id_partai = $partai[$index]['id_partai'];
            // echo $nama_partai . '  ' . $index . ' ' .$id_partai. '<br>';
            echo $id_partai . '<br>';
        }

    }

    // TAMBAH
    public function tambah()
    {
        $this->db->select('*');
        $this->db->from('m_geo_prov_kpu');
        $query  = $this->db->get();

        $data['provinsi'] = $query->result();
        $data['jenissurat'] = $this->Rekom_model->getDataJenisSurat();

        $data['judul'] = 'Halaman Tambah';
    
        $this->form_validation->set_rules('calon', 'Calon', 'required|is_unique[tb_calon_rekomendasi.id_calon]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);  
            $this->load->view('layout/menubar', $data);
            $this->load->view('rekom/tambah', $data);
            $this->load->view('layout/footer', $data);

            
        }else{
            
            $geo_prov_id            = $this->input->post('provinsi', true);
            $geo_kab_id             = $this->input->post('kab', true);
            $id_calon               = $this->input->post('calon', true);
            $id_pasangan            = $this->input->post('pasangan', true);
            $partai                 = $this->input->post('partai', true);
            // $total_kursi            = $this->input->post('total_kursi', true);
            $total_kursi            = $this->input->post('total_kursi', true);
            $jenis_surat            = $this->input->post('jenis_surat', true);
            $no_surat               = $this->input->post('no_surat', true);
            $catatan                = $this->input->post('catatan', true);

            $result_kursi           = array_sum($total_kursi);

            $dataRekom = [
                "geo_prov_id"            => $geo_prov_id,
                "geo_kab_id"             => $geo_kab_id,
                "id_calon"               => $id_calon,
                "id_pasangan"            => $id_pasangan,
                "total_kursi"            => $result_kursi,
                "catatan"                => $catatan
            ];

            $this->db->insert('tb_calon_rekomendasi', $dataRekom);

            $id_rekom = $this->db->insert_id();

            $dataPengusung = [];
            foreach ($partai as $key => $par ) {
                $dataPengusung[] = [
                    "id_rekom"               => $id_rekom,
                    "id_partai"              => $par,
                    "id_jenis_surat"         => $jenis_surat[$key],
                    "no_surat"               => $no_surat[$key]
                ];
            }

            // var_dump($dataPengusung);die;
            
            $this->Rekom_model->addDataPengusung($dataPengusung);

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('rekom');
            
        }

    }

	function add_ajax_kab($geo_prov_id)
	{
        $query = $this->db->get_where('m_geo_kab_kpu',array('geo_prov_id'=>$geo_prov_id));
        
        $data = "<option value=''>-- Pilih Kota/Kabupaten --</option>";
        
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->geo_kab_id."'>".$value->geo_kab_nama."</option>";
    	}
        echo $data;
    }

    function add_ajax_calon($geo_prov_id = null, $geo_kab_id = null)
	{
        $geo_prov_id = $this->input->get('geo_prov_id');
        $geo_kab_id = $this->input->get('geo_kab_id');

        $this->db->select('tb_rekomendasi.id_calon, tb_calon.nama');
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon', 'tb_calon.id = tb_rekomendasi.id_calon', 'INNER');

        $this->db->where('provinsi', $geo_prov_id);
        $this->db->where('kabupaten_kota', $geo_kab_id);
        $query  = $this->db->get();

    	$data = "<option value=''>-- Pilih Nama Calon --</option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_calon."'>".$value->nama."</option>";
        }
    	echo $data;
    }

    
    function add_ajax_pasangan($geo_prov_id = null, $geo_kab_id = null, $id_calon = null)
	{
        $geo_prov_id = $this->input->get('geo_prov_id');
        $geo_kab_id = $this->input->get('geo_kab_id');
        $id_calon = $this->input->get('id_calon');

        $this->db->select('tb_rekomendasi.id_pasangan, tb_calon.nama');
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon', 'tb_calon.id = tb_rekomendasi.id_pasangan', 'INNER');

        $this->db->where('provinsi', $geo_prov_id);
        $this->db->where('kabupaten_kota', $geo_kab_id);
        $this->db->where('id_calon', $id_calon);
        $query  = $this->db->get();
                            // <input type="text" class="form-control" readonly>

        $data = "";
        if($query->result() == null){
            $data = "<input type='hidden' name='pasangan' value='' >";
            $data .= "<input type='text' class='form-control' value='' readonly>";
        }
    	foreach ($query->result() as $value) {
                $data = "<input type='hidden' name='pasangan' value='$value->id_pasangan' >";
                $data .= "<input type='text' class='form-control' value='$value->nama' readonly>";
        }
    	echo $data;
    }

    function add_ajax_partai($geo_prov_id = null, $geo_kab_id = null)
	{
        $geo_prov_id = $this->input->get('geo_prov_id');
        $geo_kab_id = $this->input->get('geo_kab_id');
       

        $this->db->select('*');
        $this->db->from('tb_kursi');

        $this->db->where('geo_prov_id', $geo_prov_id);
        $this->db->where('geo_kab_id', $geo_kab_id);
        $query  = $this->db->get();

    	$data = "<option value=''></option>";
    	foreach ($query->result() as $value) {
        	$data .= "<option value='".$value->id_partai."'>".$value->partai."</option>";
        }

    	echo $data;
    }

    function add_ajax_kursi($geo_prov_id = null, $geo_kab_id = null, $id_partai = null)
	{
        // var_dump($this->input->get());
        $geo_prov_id = $this->input->get('geo_prov_id');
        $geo_kab_id = $this->input->get('geo_kab_id');
        $id_partai = $this->input->get('id_partai');

        $this->db->select('SUM(total_kursi) as total, tb_kursi.*');
        $this->db->from('tb_kursi');

        $this->db->where('geo_prov_id', $geo_prov_id);
        $this->db->where('geo_kab_id', $geo_kab_id);
        $this->db->where_in('id_partai', $id_partai);
        $query  = $this->db->get();

        $data = "";
        if ($query->result() == null) {
            $data = "<input type='text' name='total_kursi[]' class='form-control' readonly value='' >";
            return;
        }

    	foreach ($query->result() as $value) {
        	$data = "<input type='text' name='total_kursi[]' class='form-control' value='".$value->total."' readonly>";
        }
    	echo $data;
    }

    function edit_ajax_kursi($geo_prov_id = null, $geo_kab_id = null, $id_partai = null)
	{
        // var_dump($this->input->get());
        $geo_prov_id = $this->input->get('geo_prov_id');
        $geo_kab_id = $this->input->get('geo_kab_id');
        $id_partai = $this->input->get('id_partai');

        $this->db->select('SUM(total_kursi) as total, tb_kursi.*');
        $this->db->from('tb_kursi');

        $this->db->where('geo_prov_id', $geo_prov_id);
        $this->db->where('geo_kab_id', $geo_kab_id);
        $this->db->where_in('id_partai', $id_partai);
        $query  = $this->db->get();

        $data = "";
        if ($query->result() == null) {
            $data = "<input type='text' name='total_kursi[]' class='form-control' readonly value='' >";
            return;
        }

    	foreach ($query->result() as $value) {
        	$data = "<input type='text' name='total_kursi[]' class='form-control' value='".$value->total."' readonly>";
        }
        // var_dump ($data);
    	echo $data;
    }

    public function remove_ajax_pengusung($id_pengusung = null)
    {
        echo $this->Rekom_model->removePengusung($id_pengusung);
    }

    public function delete($id_rekom = null)
    {
        $this->Rekom_model->deleteDataRekom($id_rekom);
        $this->Rekom_model->deleteDataPengusung($id_rekom);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('rekom');
    }

    public function editRekom($id_rekom)
    {
        $this->db->select('*');
        $this->db->from('m_geo_prov_kpu');
        $query  = $this->db->get();

        $data['provinsi'] = $query->result();
        $data['rekomendasi'] = $this->Rekom_model->getEditSelected($id_rekom);
        $data['judul'] = 'Halaman Ubah';
        
        $this->form_validation->set_rules('calon', 'Calon', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/navbar', $data);
            $this->load->view('layout/menubar', $data);
            $this->load->view('rekom/edit', $data);
            $this->load->view('layout/footer', $data);
            
        }else{
            
            $geo_prov_id         = $this->input->post('provinsi', true);
            $geo_kab_id          = $this->input->post('kab', true);
            $id_calon            = $this->input->post('calon', true);
            $id_pasangan         = $this->input->post('pasangan', true);
            $ket                 = $this->input->post('ket', true);
            $no_ket              = $this->input->post('no_ket', true);
            $catatan             = $this->input->post('catatan', true);

            $dataRekom = [
                "geo_prov_id"         => $geo_prov_id,
                "geo_kab_id"          => $geo_kab_id,
                "id_calon"            => $id_calon,
                "id_pasangan"         => $id_pasangan,
                "catatan"             => $catatan
            ];

            $this->db->where('tb_calon_rekomendasi.id_rekom',$id_rekom);
            $this->db->update('tb_calon_rekomendasi', $dataRekom);
            
            $this->session->set_flashdata('edit', 'Diedit');
            // redirect(base_url() . 'rekom/editpengusung($id_rekom/$geo_prov_id/$geo_kab_id)');
            redirect(base_url() . 'rekom/editpengusung/'.$id_rekom.'/'.$geo_prov_id.'/'.$geo_kab_id);
        }
    }

    public function editPengusung($id_rekom, $geo_prov_id, $geo_kab_id)
    {
        $data['datarekom'] = $this->Rekom_model->getDataRekom($id_rekom, $geo_prov_id, $geo_kab_id);
        $data['selected'] = $this->Rekom_model->getSelectedPengusung($id_rekom, $geo_prov_id, $geo_kab_id);
        $data['listpartai'] = $this->Rekom_model->getListPartai($geo_prov_id, $geo_kab_id);
        $data['jenissurat'] = $this->Rekom_model->getDataJenisSurat();

        $data['judul'] = 'Halaman Edit';
        $data['geo_prov_id'] = $geo_prov_id;
        $data['geo_kab_id'] = $geo_kab_id;
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/menubar', $data);
        $this->load->view('rekom/editpengusung', $data);
        $this->load->view('layout/footer', $data);
            
        $id_pengusung             = $this->input->post('id_pengusung', true);
        $id_jenis_surat           = $this->input->post('jenis_surat', true);
        $no_surat                 = $this->input->post('no_surat', true);
        $partai                   = $this->input->post('partai', true);
        // var_dump ($no_surat);

        if (isset($partai)) {
            foreach ($partai as $key => $value) {
                if ($id_pengusung[$key] == '0' ) {
                    $this->db->insert('tb_pengusung', [
                        'id_rekom'           => $id_rekom,
                        'id_partai'          => $value,
                        'id_jenis_surat'     => $id_jenis_surat[$key],
                        'no_surat'           => $no_surat[$key]]);
                }else{
                    $this->db->where('tb_pengusung.id_pengusung', $id_pengusung[$key]);
                    $this->db->update('tb_pengusung',[
                        'id_partai'           => $value,
                        'id_jenis_surat'      => $id_jenis_surat[$key],
                        'no_surat'            => $no_surat[$key]]);
                }
            }
            
            $this->session->set_flashdata('flash', 'Diupdate');
            // var_dump($this->input->post());
            return redirect('rekom');
        }
    }

    public function deletePengusung($id_pengusung)
    {
        $this->Rekom_model->deletePengusungById($id_pengusung);
        $this->session->set_flashdata('flash', 'Dihapus');
        return redirect('rekom');
    }

    public function cetakpdf($id_rekom = null, $geo_prov_id = null, $geo_kab_id = null)
    {
        $mpdf = new \Mpdf\Mpdf([]);

        // $stylesheet = file_get_contents(base_url('assets/bootstrap-3.4.1/dist\css'));
        // $pdf->WriteHTML($stylesheet, 1); // CSS Script goes here.
        // $pdf->WriteHTML($html, 2); //HTML Content goes here.
        // $pdf->Output();


        
        // $data = $this->load->view('layout/header');
        $rekom['rekomendasi'] = $this->Rekom_model->getDataRekomById($id_rekom);
        $rekom['datakursi'] = $this->Rekom_model->getDataKursi($id_rekom, $geo_prov_id, $geo_kab_id);

        $data = $this->load->view('rekom/cetak', $rekom , TRUE);
        
        
        $mpdf->WriteHTML($data);
        $mpdf->Output('mpdf.pdf', \Mpdf\Output\Destination::INLINE);
    }

    public function cetakallpdf()
    {
        $mpdf = new \Mpdf\Mpdf([]);        

        // $data = $this->load->view('layout/header');
        $rekom['rekomendasi'] = $this->Rekom_model->getAllDataRekom();

        $data = $this->load->view('rekom/cetakallpdf', $rekom , TRUE);
        
        
        $mpdf->WriteHTML($data);
        $mpdf->Output('mpdf.pdf', \Mpdf\Output\Destination::INLINE);
    }

}