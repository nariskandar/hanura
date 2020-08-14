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
        // // $master_partai = $this->db->get()->result();
        // $master_partai = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];

        $hanura          = 13;
        $partai_count    = [];

            $payload = [];
            $rekom_with_hanura = [];

            foreach($pengusung as $item){
                if($item['id_partai'] == 13){
                    $rekom_with_hanura[] = $item['id_rekom'];
                }
            }
            
            foreach($pengusung as $item){
                foreach($rekom_with_hanura as $rekom){
                    if($item['id_rekom'] == $rekom){
                        if($item['id_partai'] != 13){
                            $partai = $item['id_partai']; 
                            $partai_count["id nyaa-$partai"][] = "oke";
                        }
                    }
                }            
            }

            // foreach ($pengusung as $np) {
            //     $nama_partai = ($np['nama_partai']);
            //     $id_partai = ($np['id_partai']);
            // }

            foreach ($partai as $id_partai) {
                var_dump ($id_partai);
            }
            
            $result = [
                [
                    'nama_partai' => '',
                    'id_partai'   => '',
                    'count'       => $count
                ]
            ];

            var_dump ($result);


            // foreach ($partai_count as $count) {
            //     // var_dump ($count);
            //     echo sizeof($count);
            // }


            

            // unset($partai_count['id-13']);

            // var_dump($rekom_with_hanura);

            var_dump($partai_count);die;

            

             
            // $cars=array($item['id_partai']);
            // echo sizeof($cars);die;
  



            // foreach($master_partai as $partai){
            // $partai_count["id-$partai"]= [];
            // }

            // foreach($rekom_with_hanura as $value){

            // $partai = $value['id_partai']; 
            // $partai_count["id-$partai"][] = "ok";
            
            // }
            // var_dump($partai_count);

            // $count_result = [
            //     [
            //         'nama_partai' = '',
            //         'id'          = '',
            //         'count'       = ''
            //     ],
            // ]
            
    }
}