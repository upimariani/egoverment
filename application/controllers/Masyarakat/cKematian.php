<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKematian extends CI_Controller
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
            'kematian' => $this->mPengajuanSurat->data_masyarakat()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vKematian', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function daftar($id_masyarakat)
    {
        $no_surat = $this->db->query("SELECT MAX(no_surat_kematian)+1 as no_surat FROM `kematian`;")->row();
        if ($no_surat->no_surat == NULL) {
            $no_urut = '1';
        } else {
            $no_urut = $no_surat->no_surat;
        }
        $data_kematian = array(
            'id_masyarakat' => $id_masyarakat,
            'tgl_pengajuan_kematian' => date('Y-m-d'),
            'no_surat_kematian' => $no_urut,
            'tgl_meninggal' => $this->input->post('tanggal'),
            'akibat' => $this->input->post('akibat'),
            'tempat' => $this->input->post('tempat'),
        );
        $this->mPengajuanSurat->insertKematian($data_kematian);
        redirect('Masyarakat/cKematian/status');
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusKematian', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cKematian.php */
