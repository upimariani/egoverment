<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengajuan extends CI_Model
{
    public function pengajuan_domisili()
    {
        $this->db->select('*');
        $this->db->from('domisili');
        $this->db->join('masyarakat', 'domisili.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function ket_kelahiran()
    {
        $this->db->select('*');
        $this->db->from('ket_kelahiran');
        $this->db->join('masyarakat', 'ket_kelahiran.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function pindah()
    {
        $this->db->select('*');
        $this->db->from('ket_pindah');
        $this->db->join('masyarakat', 'ket_pindah.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function sktm()
    {
        $this->db->select('*');
        $this->db->from('sktm');
        $this->db->join('masyarakat', 'sktm.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function sku()
    {
        $this->db->select('*');
        $this->db->from('sku');
        $this->db->join('masyarakat', 'sku.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function kematian()
    {
        $this->db->select('*');
        $this->db->from('kematian');
        $this->db->join('masyarakat', 'kematian.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function blm_mmlk_rumah()
    {
        $this->db->select('*');
        $this->db->from('blm_mmlk_rumah');
        $this->db->join('masyarakat', 'blm_mmlk_rumah.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
    public function belum_kawin()
    {
        $this->db->select('*');
        $this->db->from('belum_kawin');
        $this->db->join('masyarakat', 'belum_kawin.id_masyarakat = masyarakat.id_masyarakat', 'left');
        return $this->db->get()->result();
    }
}

/* End of file mPengajuan.php */
