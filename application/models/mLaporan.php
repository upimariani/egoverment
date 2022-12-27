<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{
    public function laporan()
    {
        $this->db->select('*');
        $this->db->from('domisili');
        $this->db->join('masyarakat', 'domisili.id_masyarakat = masyarakat.id_masyarakat', 'left');
        $this->db->where('stat_dom=1');

        return $this->db->get()->result();
    }
}

/* End of file mLaporan.php */
