<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMasyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mMasyarakat');
    }

    public function index()
    {
        $data = array(
            'masyarakat' => $this->mMasyarakat->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/vmasyarakat', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function insertMasyarakat()
    {
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama'),
            'ttl' => $this->input->post('ttl'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kel_desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'agama' => $this->input->post('agama'),
            'stat_kawin' => $this->input->post('stat_kawin'),
            'stat_dlm_kel' => 'Kepala Keluarga',
            'pekerjaan' => $this->input->post('pekerjaan'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu')
        );
        $this->mMasyarakat->insert($data);
        $this->session->set_flashdata('success', 'Data Masyarakat Berhasil Ditambahkan!');
        redirect('Admin/cMasyarakat', 'refresh');
    }
    public function updateMasyarakat($id)
    {
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama'),
            'ttl' => $this->input->post('ttl'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kel_desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'agama' => $this->input->post('agama'),
            'stat_kawin' => $this->input->post('stat_kawin'),
            'stat_dlm_kel' => 'Kepala Keluarga',
            'pekerjaan' => $this->input->post('pekerjaan'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu')
        );
        $this->mMasyarakat->update($id, $data);
        $this->session->set_flashdata('success', 'Data Masyarakat Berhasil Diperbaharui!');
        redirect('Admin/cMasyarakat', 'refresh');
    }
    public function delete($id)
    {
        $this->mMasyarakat->delete($id);
        $this->session->set_flashdata('success', 'Data Masyarakat Berhasil Dihapus!');
        redirect('Admin/cMasyarakat', 'refresh');
    }
    public function detail($no_kk)
    {
        $data = array(
            'no_kk' => $no_kk,
            'anggota' => $this->mMasyarakat->select_anggota($no_kk)
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/vDetailMasyarakat', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function insertAnggota()
    {
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama'),
            'ttl' => $this->input->post('ttl'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kel_desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'agama' => $this->input->post('agama'),
            'stat_kawin' => $this->input->post('stat_kawin'),
            'stat_dlm_kel' => $this->input->post('stat_dlm_kel'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu')
        );
        $this->mMasyarakat->insert($data);
        $this->session->set_flashdata('success', 'Data Anggota Masyarakat Berhasil Ditambahkan!');
        redirect('Admin/cMasyarakat/detail/' . $data['no_kk']);
    }
    public function deleteAnggota($id, $no_kk)
    {
        $this->mMasyarakat->delete($id);
        $this->session->set_flashdata('success', 'Data Anggota Keluarga Berhasil Dihapus!');
        redirect('Admin/cMasyarakat/detail/' . $no_kk);
    }
    public function updateAnggota($id)
    {
        $data = array(
            'no_kk' => $this->input->post('no_kk'),
            'nik' => $this->input->post('nik'),
            'nama_lengkap' => $this->input->post('nama'),
            'ttl' => $this->input->post('ttl'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kel_desa' => $this->input->post('desa'),
            'kec' => $this->input->post('kec'),
            'agama' => $this->input->post('agama'),
            'stat_kawin' => $this->input->post('stat_kawin'),
            'stat_dlm_kel' => $this->input->post('stat_dlm_kel'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu')
        );
        $this->mMasyarakat->update($id, $data);
        $this->session->set_flashdata('success', 'Data Anggota Keluarga Berhasil Diperbaharui!');
        redirect('Admin/cMasyarakat/detail/' . $data['no_kk']);
    }
}

/* End of file cMasyarakat.php */
