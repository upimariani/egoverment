<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPindah extends CI_Controller
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
        $this->load->view('Masyarakat/vPindah', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function daftar($id_masyarakat)
    {
        $no_surat = $this->db->query("SELECT MAX(no_surat_pindah)+1 as no_surat FROM `ket_pindah`;")->row();
        if ($no_surat->no_surat == NULL) {
            $no_urut = '1';
        } else {
            $no_urut = $no_surat->no_surat;
        }
        $data_pindah = array(
            'id_masyarakat' => $id_masyarakat,
            'tgl_pengajuan_pindah' => date('Y-m-d'),
            'no_surat_pindah' => $no_urut,
            'alasan' => $this->input->post('alasan'),
            'alamat_tujuan'  => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'desa_kel' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'kab' => $this->input->post('kab'),
            'prov' => $this->input->post('prov'),
            'kode_pos' => $this->input->post('kode_pos'),
            'jenis_pindah' => $this->input->post('jenis'),
            'stat_kk_tidak' => $this->input->post('stat_tidak'),
            'stat_kk_iya' => $this->input->post('stat_iya'),
            'type_pindah' => $this->input->post('antar')
        );
        $this->mPengajuanSurat->insertPindah($data_pindah);
        redirect('Masyarakat/cPindah/status');
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusPindah', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cPindah.php */
