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
                            $partai_id["$id_partai"][] = "getId"  ;
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
                    'count'           => $count
                ]
            ];


            return $result;

            // unset($partai_count['id-13']);

            // var_dump($id_rekom_with_hanura);

            // var_dump($partai_count);
            

            
            
            
            

            
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
}