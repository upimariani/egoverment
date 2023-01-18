<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAdmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mAdmin');
    }


    public function index()
    {
        $data = array(
            'admin' => $this->mAdmin->select()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/vAdmin', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function insertAdmin()
    {
        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'alamat_admin' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_admin' => $this->input->post('level')
        );
        $this->mAdmin->insert($data);
        $this->session->set_flashdata('success', 'Data Admin Berhasil Ditambahkan!');
        redirect('Admin/cAdmin', 'refresh');
    }
    public function updateAdmin($id)
    {
        $data = array(
            'nama_admin' => $this->input->post('nama'),
            'alamat_admin' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_admin' => $this->input->post('level')
        );
        $this->mAdmin->update($id, $data);
        $this->session->set_flashdata('success', 'Data Admin Berhasil Diperbaharui!');
        redirect('Admin/cAdmin', 'refresh');
    }
    public function delete($id)
    {
        $this->mAdmin->delete($id);
        $this->session->set_flashdata('success', 'Data Admin Berhasil Dihapus!');
        redirect('Admin/cAdmin', 'refresh');
    }
}

/* End of file cAdmin.php */
