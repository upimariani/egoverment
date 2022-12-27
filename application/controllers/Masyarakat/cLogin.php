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
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vLogin');
        $this->load->view('Masyarakat/Layout/footer');
    }
    public function login()
    {
        $nik = $this->input->post('nik');
        $login = $this->mLogin->login_masyarakat($nik);
        if ($login) {
            $nik = $login->nik;
            $id_masyarakat = $login->id_masyarakat;
            $array = array(
                'nik' => $nik,
                'id_masyarakat' => $id_masyarakat
            );
            $this->session->set_userdata($array);
            redirect('masyarakat/cHalamanUtama');
        } else {
            $this->session->set_flashdata('error', 'Username dan Password Anda Salah!!!');

            redirect('masyarakat/cLogin');
        }
    }
    public function logout()
    {

        $this->session->unset_userdata('nik');
        redirect('masyarakat/clogin');
    }
}

/* End of file cLogin.php */
