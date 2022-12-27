<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHalamanUtama extends CI_Controller
{

    public function index()
    {
        $this->load->view('Masyarakat/Layout/head');
        $this->load->view('Masyarakat/vHalamanUtama');
        $this->load->view('Masyarakat/Layout/footer');
    }
}

/* End of file cHalamanUtama.php */
