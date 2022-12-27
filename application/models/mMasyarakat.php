<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mMasyarakat extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('masyarakat', $data);
    }
    public function select()
    {
        $stat = 'Kepala Keluarga';
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->where('stat_dlm_kel', $stat);
        return $this->db->get()->result();
    }
    public function update($id, $data)
    {
        $this->db->where('id_masyarakat', $id);
        $this->db->update('masyarakat', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_masyarakat', $id);
        $this->db->delete('masyarakat');
    }
    public function select_anggota($no_kk)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->where('no_kk', $no_kk);
        return $this->db->get()->result();
    }
}

/* End of file mMasyarakat.php */
