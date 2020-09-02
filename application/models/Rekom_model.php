<?php
class Rekom_model extends CI_model {

    public function getAllDataRekom()
    {
        $this->db->select(
            "tb_calon_rekomendasi_i.id_rekom,
            pengusung_i.id_pengusung,
            tb_rekomendasi.id as id_rekomendasi,
            m_geo_prov_kpu.geo_prov_id,
            m_geo_kab_kpu.geo_kab_id,
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan,
            tb_calon_rekomendasi_i.total_kursi,
            tb_partai_i.logo_partai,
            tb_syarat.syarat,
            GROUP_CONCAT(DISTINCT tb_partai_i.logo_partai SEPARATOR ' ' ) as pengusung_i,
            GROUP_CONCAT(DISTINCT tb_partai_i.partai SEPARATOR ' , ' ) as nama_partai,
            SUM(
                (
                SELECT
                    SUM( tks.total_kursi ) 
                FROM
                    tb_kursi tks 
                WHERE
                    tks.geo_kab_id = tb_calon_rekomendasi_i.geo_kab_id 
                    AND tks.geo_prov_id = tb_calon_rekomendasi_i.geo_prov_id 
                    AND tks.id_partai = pengusung_i.id_partai 
                ) 
            ) AS hasil_total_kursi_i");
    
            $this->db->from('tb_rekomendasi');
            $this->db->join('tb_calon AS calon', 'tb_rekomendasi.id_calon = calon.id', 'LEFT');
            $this->db->join('tb_calon AS pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'LEFT');
            $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'LEFT');
            $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'LEFT');
            $this->db->join('tb_calon_rekomendasi AS tb_calon_rekomendasi_i', 'tb_rekomendasi.id_calon = tb_calon_rekomendasi_i.id_calon', 'LEFT');
            $this->db->join('m_geo_prov_kpu AS m_geo_prov_kpu_i', 'tb_calon_rekomendasi_i.geo_prov_id = m_geo_prov_kpu_i.geo_prov_id', 'LEFT');
            $this->db->join('m_geo_kab_kpu AS m_geo_kab_kpu_i', 'tb_calon_rekomendasi_i.geo_kab_id = m_geo_kab_kpu_i.geo_kab_id', 'LEFT');
            $this->db->join('tb_calon AS calon_i', 'tb_calon_rekomendasi_i.id_calon = calon_i.id', 'LEFT');
            $this->db->join('tb_calon AS pasangan_i', 'tb_calon_rekomendasi_i.id_pasangan = pasangan_i.id', 'LEFT');
            $this->db->join('tb_pengusung as pengusung_i', 'tb_calon_rekomendasi_i.id_rekom = pengusung_i.id_rekom', 'LEFT');
            $this->db->join('tb_syarat', 'm_geo_kab_kpu.geo_kab_id = tb_syarat.geo_kab_id', 'LEFT');
            $this->db->join('tb_partai as tb_partai_i', 'pengusung_i.id_partai = tb_partai_i.id_partai', 'LEFT');
            $this->db->group_by('tb_rekomendasi.id');
    
            // $exist = $this->db->get()->row();
            return $this->db->get()->result_array();
    }

    public function getFilterByProvinsi($provinsi)
    {
        $this->db->select(
            "tb_calon_rekomendasi_i.id_rekom,
            pengusung_i.id_pengusung,
            tb_rekomendasi.id as id_rekomendasi,
            m_geo_prov_kpu.geo_prov_id,
            m_geo_kab_kpu.geo_kab_id,
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_kab_kpu.geo_kab_nama,
            calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan,
            tb_calon_rekomendasi_i.total_kursi,
            tb_partai_i.logo_partai,
            tb_syarat.syarat,
            GROUP_CONCAT(DISTINCT tb_partai_i.logo_partai SEPARATOR ' ' ) as pengusung_i,
            GROUP_CONCAT(DISTINCT tb_partai_i.partai SEPARATOR ' , ' ) as nama_partai,
            SUM(
                (
                SELECT
                    SUM( tks.total_kursi ) 
                FROM
                    tb_kursi tks 
                WHERE
                    tks.geo_kab_id = tb_calon_rekomendasi_i.geo_kab_id 
                    AND tks.geo_prov_id = tb_calon_rekomendasi_i.geo_prov_id 
                    AND tks.id_partai = pengusung_i.id_partai 
                ) 
            ) AS hasil_total_kursi_i");
    
            $this->db->from('tb_rekomendasi');
            $this->db->join('tb_calon AS calon', 'tb_rekomendasi.id_calon = calon.id', 'LEFT');
            $this->db->join('tb_calon AS pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'LEFT');
            $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'LEFT');
            $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'LEFT');
            $this->db->join('tb_calon_rekomendasi AS tb_calon_rekomendasi_i', 'tb_rekomendasi.id_calon = tb_calon_rekomendasi_i.id_calon', 'LEFT');
            $this->db->join('m_geo_prov_kpu AS m_geo_prov_kpu_i', 'tb_calon_rekomendasi_i.geo_prov_id = m_geo_prov_kpu_i.geo_prov_id', 'LEFT');
            $this->db->join('m_geo_kab_kpu AS m_geo_kab_kpu_i', 'tb_calon_rekomendasi_i.geo_kab_id = m_geo_kab_kpu_i.geo_kab_id', 'LEFT');
            $this->db->join('tb_calon AS calon_i', 'tb_calon_rekomendasi_i.id_calon = calon_i.id', 'LEFT');
            $this->db->join('tb_calon AS pasangan_i', 'tb_calon_rekomendasi_i.id_pasangan = pasangan_i.id', 'LEFT');
            $this->db->join('tb_pengusung as pengusung_i', 'tb_calon_rekomendasi_i.id_rekom = pengusung_i.id_rekom', 'LEFT');
            $this->db->join('tb_syarat', 'm_geo_kab_kpu.geo_kab_id = tb_syarat.geo_kab_id', 'LEFT');
            $this->db->join('tb_partai as tb_partai_i', 'pengusung_i.id_partai = tb_partai_i.id_partai', 'LEFT');
            $this->db->where('m_geo_prov_kpu.geo_prov_id', $provinsi);
            $this->db->group_by('tb_rekomendasi.id');
    
            // $exist = $this->db->get()->row();
            return $this->db->get()->result_array();
    }

    public function getDataRekomProvinsi()
    {
        $this->db->select("
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->group_by('m_geo_prov_kpu.geo_prov_nama');

        return $this->db->get()->result_array();
        // var_dump($query);die;
    }
    public function getCountKabProv()
    {
        $query = $this->db->query("
        select
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id
        from tb_rekomendasi
        inner join tb_calon as calon ON tb_rekomendasi.id_calon = calon.id
        inner join tb_calon as pasangan ON tb_rekomendasi.id_pasangan = pasangan.id
        inner join m_geo_prov_kpu ON calon.provinsi = m_geo_prov_kpu.geo_prov_id
        inner join m_geo_kab_kpu ON calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id
        group by m_geo_kab_kpu.geo_kab_nama");
        
        return $query->num_rows();
    }
    // WHERE m_geo_prov_kpu.geo_prov_id = $geo_prov_id
    
    public function getAllDataKab()
    {
        $this->db->select("
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->group_by('m_geo_kab_kpu.geo_kab_nama');

        return $this->db->get()->result_array();
        // var_dump($query);die;
    }

    public function getProvToKab($geo_prov_id)
    {
        $this->db->select("
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'INNER');
        $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'INNER');
        $this->db->where('m_geo_prov_kpu.geo_prov_id', $geo_prov_id);
        $this->db->group_by('m_geo_kab_kpu.geo_kab_nama');

        return $this->db->get()->result_array();
        // var_dump($query);die;
    }

    public function getAllDataCalon()
    {
        $this->db->select(
            "calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'INNER');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'INNER');
        // $this->db->join('tb_calon_rekomendasi', 'calon', 'INNER');
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

    public function getCountProvinsi()
    {
        $query = $this->db->query("
        select
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id
        from tb_rekomendasi
        inner join tb_calon as calon ON tb_rekomendasi.id_calon = calon.id
        inner join tb_calon as pasangan ON tb_rekomendasi.id_pasangan = pasangan.id
        inner join m_geo_prov_kpu ON calon.provinsi = m_geo_prov_kpu.geo_prov_id
        inner join m_geo_kab_kpu ON calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id
        group by m_geo_prov_kpu.geo_prov_nama");

        return $query->num_rows();
    }

    public function getCountKab()
    {
        $query = $this->db->query("
        select
        m_geo_prov_kpu.geo_prov_nama,
        m_geo_prov_kpu.geo_prov_id,
        m_geo_kab_kpu.geo_kab_nama,
        m_geo_kab_kpu.geo_kab_id
        from tb_rekomendasi
        inner join tb_calon as calon ON tb_rekomendasi.id_calon = calon.id
        inner join tb_calon as pasangan ON tb_rekomendasi.id_pasangan = pasangan.id
        inner join m_geo_prov_kpu ON calon.provinsi = m_geo_prov_kpu.geo_prov_id
        inner join m_geo_kab_kpu ON calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id
        group by m_geo_kab_kpu.geo_kab_id");

        return $query->num_rows();
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
    public function getDataRekomById($id_rekomendasi)
    {
        $this->db->select("tb_rekomendasi.id as id_rekomendasi,
            tb_calon_rekomendasi.total_kursi,
            m_geo_prov_kpu.geo_prov_nama,
            m_geo_prov_kpu.geo_prov_id,
            m_geo_kab_kpu.geo_kab_nama,
            m_geo_kab_kpu.geo_kab_id,
            calon.nama AS nama_calon,
            pasangan.nama AS nama_pasangan,
            tb_calon_rekomendasi.catatan,
            tb_syarat.syarat,
            tb_calon_rekomendasi.id_rekom as id_rekom_i
            ");
        $this->db->from('tb_rekomendasi');
        $this->db->join('tb_calon as calon', 'tb_rekomendasi.id_calon = calon.id', 'left');
        $this->db->join('tb_calon as pasangan', 'tb_rekomendasi.id_pasangan = pasangan.id', 'left');
        $this->db->join('m_geo_prov_kpu', 'calon.provinsi = m_geo_prov_kpu.geo_prov_id', 'left');
        $this->db->join('m_geo_kab_kpu', 'calon.kabupaten_kota = m_geo_kab_kpu.geo_kab_id', 'left');
        $this->db->join('tb_syarat', 'm_geo_kab_kpu.geo_kab_id = tb_syarat.geo_kab_id', 'left');
        $this->db->join('tb_calon_rekomendasi', 'calon.id = tb_calon_rekomendasi.id_calon', 'left');
        $this->db->where('tb_rekomendasi.id', $id_rekomendasi);
        return $this->db->get()->result_array();
        
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

    public function getEditSelected($id_rekom_i)
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
        $this->db->where('tb_calon_rekomendasi.id_rekom', $id_rekom_i);
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


    public function getDataKursi($id_rekom_i, $geo_prov_id = null, $geo_kab_id = null)
    {
        // var_dump($id_rekom_i);
        $this->db->select("tb_pengusung.id_pengusung,
        tb_pengusung.id_rekom as id_rekom_i,
        tb_pengusung.id_partai,
        tb_pengusung.no_surat,
        tb_kursi.partai,
        tb_kursi.total_kursi,
        tb_jenis_surat.nama_jenis_surat");
        $this->db->from("tb_pengusung");
        $this->db->join("tb_kursi", "tb_pengusung.id_partai = tb_kursi.id_partai");
        $this->db->join("tb_jenis_surat", "tb_pengusung.id_jenis_surat = tb_jenis_surat.id_jenis_surat");
        $this->db->where("tb_pengusung.id_rekom", $id_rekom_i );
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