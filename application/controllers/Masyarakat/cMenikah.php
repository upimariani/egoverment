<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMenikah extends CI_Controller
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
        $this->load->view('Masyarakat/vMenikah', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function daftar($id_masyarakat)
    {
        $no_surat = $this->db->query("SELECT MAX(no_surat_kawin)+1 as no_surat FROM `belum_kawin`;")->row();
        if ($no_surat->no_surat == NULL) {
            $no_urut = '1';
        } else {
            $no_urut = $no_surat->no_surat;
        }
        $data_kawin = array(
            'id_masyarakat' => $id_masyarakat,
            'tgl_pengajuan_kawin' => date('Y-m-d'),
            'no_surat_kawin' => $no_urut,
            'stat_kawin' => $this->input->post('status')
        );
        $this->mPengajuanSurat->insertKawin($data_kawin);
        redirect('Masyarakat/cMenikah/status');
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusMenikah', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cMenikah.php */
