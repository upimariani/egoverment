<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSktm extends CI_Controller
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
        $this->load->view('Masyarakat/vKetTidakMampu', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function daftar($id_masyarakat)
    {
        $config['upload_path']          = './asset/pengantar';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 500000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('surat_pengantar')) {
            $data = array(
                'domisili' => $this->mPengajuanSurat->data_masyarakat()
            );
            $this->load->view('Masyarakat/Layout/head');
            $this->load->view('Masyarakat/vKetTidakMampu', $data);
            $this->load->view('Masyarakat/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $no_surat = $this->db->query("SELECT MAX(no_surat_sktm)+1 as no_surat FROM `sktm`;")->row();
            if ($no_surat->no_surat == NULL) {
                $no_urut = '1';
            } else {
                $no_urut = $no_surat->no_surat;
            }
            $data_sktm = array(
                'id_masyarakat' => $id_masyarakat,
                'tgl_pengajuan_sktm' => date('Y-m-d'),
                'no_surat_sktm' => $no_urut,
                'surat_pengantar' => $upload_data['file_name']
            );
            $this->mPengajuanSurat->insertSktm($data_sktm);
            redirect('Masyarakat/cSktm/status');
        }
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusSktm', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cSktm.php */
