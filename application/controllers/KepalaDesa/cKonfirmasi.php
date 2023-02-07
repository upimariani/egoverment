<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKonfirmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mPengajuan');
        $this->load->model('mStatusSurat');
    }

    public function index()
    {
        $data = array(
            'domisili' => $this->mPengajuan->pengajuan_domisili()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vDomisili', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_domisili($id)
    {
        $data = array(
            'stat_dom' => '1'
        );
        $this->db->where('id_domisili', $id);
        $this->db->update('domisili', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Domisili Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi');
    }
    public function ket_lahir()
    {
        $data = array(
            'ket_kelahiran' => $this->mPengajuan->ket_kelahiran()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vKetKelahiran', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_lahir($id)
    {
        $data = array(
            'stat_lahir' => '1'
        );
        $this->db->where('id_ket_kelahiran', $id);
        $this->db->update('ket_kelahiran', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Kelahiran Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/ket_lahir');
    }
    public function pindah()
    {
        $data = array(
            'pindah' => $this->mPengajuan->pindah()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vPindah', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_pindah($id)
    {
        $data = array(
            'stat_pindah' => '1'
        );
        $this->db->where('id_pindah', $id);
        $this->db->update('ket_pindah', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Pindah Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/pindah');
    }
    public function sktm()
    {
        $data = array(
            'sktm' => $this->mPengajuan->sktm()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vSktm', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_sktm($id)
    {
        $data = array(
            'stat_sktm' => '1'
        );
        $this->db->where('id_sktm', $id);
        $this->db->update('sktm', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Tidak Mampu Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/sktm');
    }
    public function sku()
    {
        $data = array(
            'sku' => $this->mPengajuan->sku()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vSku', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_sku($id)
    {
        $data = array(
            'stat_usaha' => '1'
        );
        $this->db->where('id_sku', $id);
        $this->db->update('sku', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Usaha Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/sku');
    }
    public function kematian()
    {
        $data = array(
            'kematian' => $this->mPengajuan->kematian()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vKematian', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_kematian($id)
    {
        $data = array(
            'stat_kematian' => '1'
        );
        $this->db->where('id_kematian', $id);
        $this->db->update('kematian', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Kematian Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/kematian');
    }
    public function rumah()
    {
        $data = array(
            'rumah' => $this->mPengajuan->blm_mmlk_rumah()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/vBmr', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_rumah($id)
    {
        $data = array(
            'stat_rumah' => '1'
        );
        $this->db->where('id_rumah', $id);
        $this->db->update('blm_mmlk_rumah', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Keterangan Belum Memiliki Rumah Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/rumah');
    }
    public function kawin()
    {
        $data = array(
            'belum_kawin' => $this->mPengajuan->belum_kawin()
        );
        $this->load->view('KepalaDesa/Layout/head');
        $this->load->view('KepalaDesa/Layout/aside');
        $this->load->view('KepalaDesa/VBMenikah', $data);
        $this->load->view('KepalaDesa/Layout/footer');
    }
    public function konfrm_kawin($id)
    {
        $data = array(
            'stat_surat' => '1'
        );
        $this->db->where('id_kawin', $id);
        $this->db->update('belum_kawin', $data);
        $this->session->set_flashdata('success', 'Surat Pengajuan Status Kawin Berhasil Dikonfirmasi!!!');
        redirect('KepalaDesa/cKonfirmasi/kawin');
    }
}

/* End of file cKonfirmasi.php */
