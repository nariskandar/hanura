<?php

class Surat_model extends CI_model
{
    public function getAllDataSurat()
    {
        $this->db->select('*');
        $this->db->from('tb_jenis_surat');
        return $this->db->get()->result_array();
    }

    public function addDataSurat($nama_jenis_surat)
    {
        $data = [
            'nama_jenis_surat' => $nama_jenis_surat
        ];
        $this->db->trans_start();
        $this->db->insert('tb_jenis_surat', $data);
        $this->db->trans_complete();
    }

    public function editDataSurat($id_jenis_surat, $nama_jenis_surat)
    {
        $data = [
            'nama_jenis_surat' => $nama_jenis_surat
        ];
        $this->db->where('tb_jenis_surat.id_jenis_surat', $id_jenis_surat);
        return $this->db->update('tb_jenis_surat', $data);
    }

    public function deleteDataSurat($id_jenis_surat)
    {
        $this->db->where('id_jenis_surat', $id_jenis_surat);
        return $this->db->delete('tb_jenis_surat');
    }
}