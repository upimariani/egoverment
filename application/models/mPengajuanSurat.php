<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengajuanSurat extends CI_Model
{
    public function data_masyarakat()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->where('nik', $this->session->userdata('nik'));
        return $this->db->get()->row();
    }
    public function insertPengajuan($data)
    {
        $this->db->insert('pengajuan_surat', $data);
    }


    public function insertDomisili($data)
    {
        $this->db->insert('domisili', $data);
    }
    public function insertKetLahir($data)
    {
        $this->db->insert('ket_kelahiran', $data);
    }
    public function insertPindah($data)
    {
        $this->db->insert('ket_pindah', $data);
    }
    public function insertSktm($data)
    {
        $this->db->insert('sktm', $data);
    }
    public function insertSku($data)
    {
        $this->db->insert('sku', $data);
    }
    public function insertKematian($data)
    {
        $this->db->insert('kematian', $data);
    }
    public function insertBmr($data)
    {
        $this->db->insert('blm_mmlk_rumah', $data);
    }
    public function insertKawin($data)
    {
        $this->db->insert('belum_kawin', $data);
    }
}

/* End of file mPengajuanSurat.php */
