<?php
class Rekom_model extends CI_model {

    public function getAllDataRekom()
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
            GROUP_CONCAT(DISTINCT tb_partai.logo_partai SEPARATOR ' ' ) as pengusung,
            GROUP_CONCAT(DISTINCT tb_partai.partai SEPARATOR ' , ' ) as nama_partai");
    
            $this->db->from('tb_calon_rekomendasi');
            $this->db->join('m_geo_prov_kpu', 'tb_calon_rekomendasi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
            $this->db->join('m_geo_kab_kpu', 'tb_calon_rekomendasi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
            $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
            $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
            $this->db->join('tb_pengusung as pengusung', 'tb_calon_rekomendasi.id_rekom = pengusung.id_rekom', 'INNER');
            $this->db->join('tb_partai', 'pengusung.id_partai = tb_partai.id_partai', 'INNER');
            $this->db->group_by('id_rekom');
    
            // $exist = $this->db->get()->row();
            return $this->db->get()->result_array();
    }

    public function getAllDataCalon()
    {
        $this->db->select(
            "calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan");
            
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('tb_calon_rekomendasi', 'calon', 'INNER');
        return $this->db->get()->result_array();

    }

    public function getAllDataKab()
    {
        $this->db->select(
            "m_geo_kab_kpu.geo_kab_nama");
            
        $this->db->from('m_geo_kab_kpu');
        // $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        // $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        return $this->db->get()->result_array();

    }

    public function getCountDataCalon()
    {
        $this->db->select(
            "COUNT(*) AS seluruh_calon");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        return $this->db->get()->result_array();
    }
    
    public function getCountDataRekom()
    {
        $this->db->select(
            "COUNT(*) AS seluruh_rekom");
        $this->db->from('tb_calon_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        return $this->db->get()->result_array();
    }

    public function getAllDataHanura()
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
            $this->db->where('tb_pengusung.id_partai = 13');
            $this->db->group_by('id_rekom');
    
            // $exist = $this->db->get()->row();
            return $this->db->get()->result_array();
    }

    public function getJumlahHanura()
    {
        $this->db->select('COUNT(*) AS hanura');
        $this->db->from('tb_calon_rekomendasi');
        $this->db->join('tb_pengusung', 'tb_calon_rekomendasi.id_rekom=tb_pengusung.id_rekom');
        $this->db->where('tb_pengusung.id_partai=13');
        return $this->db->get()->result_array();
        // return $this->db->get()->row_array();
    }

    public function getAllDataTbKursi()
    {
        return $this->db->get('tb_kursi')->result_array();
    }
    
    public function getDataJenisSurat()
    {
        return $this->db->get('tb_jenis_surat')->result_array();
    }
    
    public function getAllDataTbPartai()
    {
        return $this->db->get('tb_partai')->result_array();
    }

    public function getDataRekomById($id_rekom)
    {
        $this->db->select(
            "SUM((SELECT SUM(tks.total_kursi) from tb_kursi tks where tks.geo_kab_id = tb_calon_rekomendasi.geo_kab_id and tks.geo_prov_id = tb_calon_rekomendasi.geo_prov_id AND tks.id_partai = pengusung.id_partai)) as hasil_total_kursi,
            tb_calon_rekomendasi.id_rekom,
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan,
            pengusung.id_pengusung,
            tb_partai.logo_partai,
            
            tb_calon_rekomendasi.geo_prov_id,
            tb_calon_rekomendasi.geo_kab_id,
            tb_calon_rekomendasi.total_kursi,


            tb_calon_rekomendasi.catatan,
            GROUP_CONCAT(DISTINCT tb_partai.logo_partai SEPARATOR ' ' ) as pengusung,
            GROUP_CONCAT(DISTINCT tb_partai.partai SEPARATOR ' ' ) as nama_pengusung");
        $this->db->from('tb_calon_rekomendasi');
        $this->db->join('m_geo_prov_kpu', 'tb_calon_rekomendasi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'tb_calon_rekomendasi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('tb_pengusung as pengusung', 'tb_calon_rekomendasi.id_rekom = pengusung.id_rekom', 'INNER');
        $this->db->join('tb_partai', 'pengusung.id_partai = tb_partai.id_partai', 'INNER');
        $this->db->where('tb_calon_rekomendasi.id_rekom', $id_rekom);
        $this->db->group_by('id_rekom');

        return $this->db->get()->row_array();
        
        // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
    }

    public function getDataRekom($id_rekom = null, $geo_prov_id = null, $geo_kab_id = null)
    {
        $this->db->select(
        "m_geo_prov_kpu.geo_prov_nama,
        m_geo_kab_kpu.geo_kab_nama,
        calon.nama AS nama_calon,
        pasangan.nama AS nama_pasangan"
        );
        $this->db->from('tb_calon_rekomendasi');
        $this->db->join('m_geo_prov_kpu', 'tb_calon_rekomendasi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'tb_calon_rekomendasi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->where('tb_calon_rekomendasi.id_rekom', $id_rekom);
        $this->db->where('tb_calon_rekomendasi.geo_prov_id', $geo_prov_id);
        $this->db->where('tb_calon_rekomendasi.geo_kab_id', $geo_kab_id);

        return $this->db->get()->row();
        
        // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
    }

    public function getEditSelected($id_rekom)
    {
        $this->db->select(
            "tb_calon_rekomendasi.id_rekom,
            
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            calon.nama AS nama_calon,
            calon.id AS id_calon,
            pasangan.nama AS nama_pasangan,
            pasangan.id AS id_pasangan,
            pengusung.id_pengusung,
            tb_partai.logo_partai,
            
            tb_calon_rekomendasi.geo_prov_id,
            tb_calon_rekomendasi.geo_kab_id,
            tb_calon_rekomendasi.total_kursi,
            
            tb_calon_rekomendasi.catatan,
            GROUP_CONCAT(DISTINCT tb_partai.logo_partai SEPARATOR ' ' ) as pengusung,
            GROUP_CONCAT(DISTINCT tb_partai.partai SEPARATOR ' ' ) as nama_pengusung");
        $this->db->from('tb_calon_rekomendasi');
        $this->db->join('m_geo_prov_kpu', 'tb_calon_rekomendasi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'tb_calon_rekomendasi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->join('tb_calon as calon', 'tb_calon_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_calon_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('tb_pengusung as pengusung', 'tb_calon_rekomendasi.id_rekom = pengusung.id_rekom', 'INNER');
        $this->db->join('tb_partai', 'pengusung.id_partai = tb_partai.id_partai', 'INNER');
        $this->db->where('tb_calon_rekomendasi.id_rekom', $id_rekom);
        $this->db->group_by('id_rekom');

        return $this->db->get()->result_array();
        
        // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
    }

    public function getSelectedPengusung($id_rekom = null, $geo_prov_id = null, $geo_kab_id = null)
        {
            $this->db->select(
                "tb_pengusung.id_pengusung,
                tb_pengusung.id_rekom,
                tb_pengusung.id_partai,
                tb_pengusung.no_surat,
                tb_jenis_surat.id_jenis_surat,
                tb_jenis_surat.nama_jenis_surat,
                tb_partai.partai,
                tb_kursi.total_kursi,
                m_geo_prov_kpu.geo_prov_id,
                m_geo_prov_kpu.geo_prov_nama,
                m_geo_kab_kpu.geo_kab_id,
                m_geo_kab_kpu.geo_kab_nama");
            $this->db->from('tb_pengusung');
            $this->db->join('tb_jenis_surat', 'tb_pengusung.id_jenis_surat = tb_jenis_surat.id_jenis_surat', 'INNER');
            $this->db->join('tb_partai', 'tb_pengusung.id_partai = tb_partai.id_partai', 'INNER');
            $this->db->join('tb_kursi', 'tb_pengusung.id_partai = tb_kursi.id_partai', 'INNER');
            $this->db->join('m_geo_prov_kpu', 'tb_kursi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
            $this->db->join('m_geo_kab_kpu', 'tb_kursi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');
    
            $this->db->where('tb_kursi.geo_prov_id', $geo_prov_id);
            $this->db->where('tb_kursi.geo_kab_id', $geo_kab_id);
            $this->db->where('tb_pengusung.id_rekom', $id_rekom);
    
            return $this->db->get()->result_array();
            
            // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
        
        // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
    }

    public function getListPartai($geo_prov_id, $geo_kab_id)
    {
        $this->db->select(
            "m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            m_geo_prov_kpu.geo_prov_id,
            m_geo_kab_kpu.geo_kab_id,
            tb_kursi.id_partai,
            tb_kursi.partai,
            tb_kursi.total_kursi");
        $this->db->from('tb_kursi');
        $this->db->join('m_geo_prov_kpu', 'tb_kursi.geo_prov_id = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'tb_kursi.geo_kab_id = m_geo_kab_kpu.geo_kab_id', 'INNER');

        $this->db->where('tb_kursi.geo_prov_id', $geo_prov_id);
        $this->db->where('tb_kursi.geo_kab_id', $geo_kab_id);
        // $this->db->where('tb_pengusung.id_rekom', $id_rekom);

        return $this->db->get()->result_array();
        
        // return $this->db->get_where('tb_calon_rekomendasi', ['id_rekom' => $id_rekom] )->row_array();
    }


    public function getDataKursi($id_rekom, $geo_prov_id, $geo_kab_id)
    {
        $this->db->select("tb_pengusung.id_pengusung,
        tb_pengusung.id_rekom,
        tb_pengusung.id_partai,
        tb_pengusung.no_surat,
        tb_kursi.partai,
        tb_kursi.total_kursi,
        tb_jenis_surat.nama_jenis_surat");
        $this->db->from("tb_pengusung");
        $this->db->join("tb_kursi", "tb_pengusung.id_partai = tb_kursi.id_partai");
        $this->db->join("tb_jenis_surat", "tb_pengusung.id_jenis_surat = tb_jenis_surat.id_jenis_surat");
        $this->db->where("tb_pengusung.id_rekom", $id_rekom );
        $this->db->where("tb_kursi.geo_prov_id", $geo_prov_id );
        $this->db->where("tb_kursi.geo_kab_id", $geo_kab_id );
        return $this->db->get()->result_array();
    }


    public function addDataRekom($dataRekom)
    {
        $this->db->trans_start();
        $this->db->insert('tb_calon_rekomendasi', $dataRekom);
        $this->db->trans_complete();
        return $this->db->insert_id();
    }
    
    public function addDataPengusung($dataPengusung)
    {   
        $this->db->insert_batch('tb_pengusung', $dataPengusung);
        // var_dump($dataPengusung);
    }

    public function deleteDataRekom($id_rekom)
    {
        $this->db->where('id_rekom', $id_rekom);
        $this->db->delete('tb_calon_rekomendasi');
    }

    public function deleteDataPengusung($id_rekom)
    {
        $this->db->where('id_rekom', $id_rekom);
        $this->db->delete('tb_pengusung');
    }

    public function removePengusung($id_pengusung)
    {
        $this->db->where('id_pengusung', $id_pengusung);
        return $this->db->delete('tb_pengusung');
    }
}
// $this->db->insert_batch('tb_calon_rekomendasi', $data);