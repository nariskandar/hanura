<?php

class Data_model extends CI_model{
    
    public function fetchprovinsi()
    {
        $this->db->order_by("geo_prov_nama", "ASC");
        $query = $this->db->get('m_geo_prov_kpu');
        return $query->result_array();
    }

    public function fetchkota($geo_prov_id)
    {
        $this->db->where('geo_prov_id', $geo_prov_id);
        $this->db->order_by('geo_kab_nama' ,'ASC');
        $query = $this->db->get('m_geo_kab_kpu');
        $output = '<option value ="">Select kota</option>';
        foreach($query->result_array() as $row)
        {
            $output .= '<option value="' .$row->geo_kab_id. '">'. $row->geo_kab_nama.'</option>'; 
        }
        return $output;
    }
}