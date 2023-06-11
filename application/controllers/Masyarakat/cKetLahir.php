<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKetLahir extends CI_Controller
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
        $this->load->view('Masyarakat/vKetKelahiran', $data);
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
            $this->load->view('Masyarakat/vKetKelahiran', $data);
            $this->load->view('Masyarakat/Layout/footer');
        } else {
            $upload_data = $this->upload->data();
            $no_surat = $this->db->query("SELECT MAX(no_surat_kel)+1 as no_surat FROM `ket_kelahiran`;")->row();
            if ($no_surat->no_surat == NULL) {
                $no_urut = '1';
            } else {
                $no_urut = $no_surat->no_surat;
            }
            $data_ketlahir = array(
                'id_masyarakat' => $id_masyarakat,
                'tgl_pengajuan_kel' => date('Y-m-d'),
                'no_surat_kel' => $no_urut,
                'nama_bayi' => $this->input->post('nama_bayi'),
                'jk_bayi' => $this->input->post('jk'),
                'tempat_dilahirkan' => $this->input->post('tmpt_dilahirkan'),
                'tempat_kel' => $this->input->post('tmpt_kelahiran'),
                'hari_tgl_lahir' => $this->input->post('ttl'),
                'pukul' => $this->input->post('pukul'),
                'jenis_kel' => $this->input->post('jenis_kelahiran'),
                'kelahiran_ke' => $this->input->post('kelahiran_ke'),
                'penolong_kel' => $this->input->post('penolong'),
                'berat' => $this->input->post('berat'),
                'panjang' => $this->input->post('panjang'),
                'tgl_perkawinan' => $this->input->post('tgl_kawin'),
                'nik_saksi_satu' => $this->input->post('nik_1'),
                'nama_saksi_satu' => $this->input->post('nama_saksi1'),
                'umur_saksi_satu' => $this->input->post('umur_1'),
                'pekerjaan_saksi_satu' => $this->input->post('pekerjaan_1'),
                'alamat_saksi_satu' => $this->input->post('alamat_1'),
                'nik_saksi_dua' => $this->input->post('nik_2'),
                'nama_saksi_dua' => $this->input->post('nama_saksi2'),
                'umur_saksi_dua' => $this->input->post('umur_2'),
                'pekerjaan_saksi_dua' => $this->input->post('pekerjaan_2'),
                'alamat_saksi_dua' => $this->input->post('alamat_2'),
                'surat_pengantar' => $upload_data['file_name']
            );
            $this->mPengajuanSurat->insertKetLahir($data_ketlahir);
            redirect('Masyarakat/cKetLahir/status');
        }
    }
    public function status()
    {
        $data = array(
            'status' => $this->mStatusSurat->status()
        );
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vStatusKetKelahiran', $data);
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cKetLahir.php */
