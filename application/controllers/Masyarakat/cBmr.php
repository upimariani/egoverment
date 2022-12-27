<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBmr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengajuanSurat');
        $this->load->model('mStatusSurat');
    }

    public function index()
    {
        $data = array(
            'domisili' => $this->mPengajuanSurat->data_masyarakat()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vBmr', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function daftar($id_masyarakat)
    {
        $no_surat = $this->db->query("SELECT MAX(no_surat_rumah)+1 as no_surat FROM `blm_mmlk_rumah`;")->row();
        if ($no_surat->no_surat == NULL) {
            $no_urut = '1';
        } else {
            $no_urut = $no_surat->no_surat;
        }
        $data_bmr = array(
            'id_masyarakat' => $id_masyarakat,
            'tgl_pengajuan_rumah' => date('Y-m-d'),
            'no_surat_rumah' => $no_urut
        );
        $this->mPengajuanSurat->insertBmr($data_bmr);
        redirect('masyarakat/cBmr/status', 'refresh');
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusBmr', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cBmr.php */
