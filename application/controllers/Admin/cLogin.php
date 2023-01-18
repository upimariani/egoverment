<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLogin');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('vLogin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $cek = $this->mLogin->login($username, $password);
            if ($cek) {
                if ($cek->level_admin == '1') {
                    redirect('Admin/cAdmin');
                } else if ($cek->level_admin == '2') {
                    redirect('Admin/cDomisili');
                } else if ($cek->level_admin == '3') {
                    redirect('Admin/cSktm');
                } else if ($cek->level_admin == '4') {
                    redirect('Admin/cKetLahir');
                }
            } else {
                $this->session->set_flashdata('error', 'Username dan Password Anda Salah!!!');
                redirect('Admin/cLogin');
            }
        }
    }
    public function logout()
    {
        $this->session->set_flashdata('success', 'Anda Berhasil Logout!!!');
        redirect('Admin/cLogin');
    }
}

/* End of file cLogin.php */
