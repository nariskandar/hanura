<?php

class Chart_model extends CI_model
{
    public function getAllData()
    {
        $this->db->select(
        "tb_pengusung.id_pengusung as id,
        tb_pengusung.id_rekom,
        tb_pengusung.id_partai");

        $this->db->from('tb_pengusung');
        // $exist = $this->db->get()->row();
        return $this->db->get()->result_array();
    }

    public function getHitung()
    {
        $this->db->select(
        "tb_pengusung.id_pengusung as id,
        tb_pengusung.id_rekom,
        tb_pengusung.id_partai,
        tb_partai.partai AS nama_partai");
        $this->db->from('tb_pengusung');
        $this->db->join('tb_partai', 'tb_pengusung.id_partai = tb_partai.id_partai');
        $pengusung = $this->db->get()->result_array();
        
        // $this->db->select("tb_partai.id_partai");
        // $this->db->from("tb_partai");
        // $master_partai = $this->db->get()->result();
        $master_partai = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];

        $hanura          = 13;
        $partai_count    = [];

            $payload = [];
            $id_rekom_with_hanura = [];
            $namapartai_with_hanura = [];
            $id_partai = [];
            $partai_name = [];
            $list_data = [];

            // pengusung : id, id_rekom, id_partai, nama_partai
            // mencari id rekom yang ada id pengusung hanura
            foreach ($pengusung as $item) {
                if ($item ['id_partai'] == 13) {
                    $id_rekom_with_hanura[] = $item['id_rekom'];
                }
            }
            
            // mencari id
            foreach ($pengusung as $item) {
                foreach ($id_rekom_with_hanura as $id_rekom) {
                    if ($item['id_rekom'] == $id_rekom) {
                        if ($item['id_partai'] != 13) {
                            $id_partai = $item['id_partai'];
                            $partai_id["$id_partai"][] = "getId";
                            $list_data["$id_partai"][] = $item['id_rekom'];
                        }
                    }
                }
            }
            
            // $count  =  [$partai_id];
            $count = [];
            foreach ($partai_id as $hitung) {
                $count[] = sizeof($hitung) ;
            }
            
            // mencari nama partai
            foreach ($pengusung as $item) {
                foreach ($id_rekom_with_hanura as $id_rekom) {
                    if ($item['id_rekom'] == $id_rekom ) {
                        if ($item['id_partai'] != 13) {
                            $nama_partai = $item['nama_partai'];
                            $partai_name["$nama_partai"][] = "getName";
                        }
                    }
                }
            }
            

            $result = [
                [
                    'id_partai'       => $partai_id,
                    'nama_partai'     => $partai_name,
                    'count'           => $count,
                    'list_data'       => $list_data
                    ]
                ];
                
                return $result;
            // return $list_data;
            // unset($partai_count['id-13']);

            // var_dump($id_rekom_with_hanura);

            // var_dump($result);
            

            
            
            
            

            
            // foreach($master_partai as $partai){
            //     $partai_count["id-$partai"]= [];
            //     var_dump ($partai_count);die;
            // }

            // foreach($id_rekom_with_hanura as $value){

            // $partai = $value['id_partai']; 
            // $partai_count["id-$partai"][] = "ok";
            
            // }
            // var_dump($partai_count);die;

            // $count_result = [
            //     [
            //         'nama_partai' = '',
            //         'id'          = '',
            //         'count'       = ''
            //     ],
            // ]
            
    }

    public function getDataPartaiLain($rekom)
    {
        $this->db->select(
            "SUM((SELECT SUM(tks.total_kursi) from tb_kursi tks where tks.geo_kab_id = tb_calon_rekomendasi.geo_kab_id and tks.geo_prov_id = tb_calon_rekomendasi.geo_prov_id AND tks.id_partai = pengusung.id_partai)) as hasil_total_kursi,
            tb_calon_rekomendasi.id_rekom,
            m_geo_kab_kpu.geo_kab_id,
            m_geo_prov_kpu.geo_prov_id,
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan,
            pengusung.id_pengusung,
            tb_partai.logo_partai,
            
            tb_calon_rekomendasi.total_kursi,

            
            tb_calon_rekomendasi.catatan,
            GROUP_CONCAT(DISTINCT tb_partai.logo_partai SEPARATOR ' ' ) as pengusung");
    
            $this->db->from('tb_calon_rekomendasi');
            $this->db->join('tb_pengusung', 'tb_calon_rekomendasi.id_rekom = tb_pengusung.id_rekom', 'INNER');
            $this->db->join('m_geo_prov_kpu', 'tb_calon_rekomendasi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
            $this->db->join('m_geo_kab_kpu', 'tb_calon_rekomendasi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
            $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
            $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
            $this->db->join('tb_pengusung as pengusung', 'tb_calon_rekomendasi.id_rekom = pengusung.id_rekom', 'INNER');
            $this->db->join('tb_partai', 'pengusung.id_partai = tb_partai.id_partai', 'INNER');
            $this->db->where_in('tb_pengusung.id_rekom', $rekom);
            $this->db->group_by('id_rekom');
    
            // $exist = $this->db->get()->row();
            return $this->db->get()->result_array();
    }
}