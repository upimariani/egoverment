<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mLaporan');
    }
    public function index()
    {
        $data = array(
            'laporan' => $this->mLaporan->laporan()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/vLaporan', $data);
        $this->load->view('Admin/Layout/footer');
    }
}

/* End of file cLaporan.php */


/* End of file cLaporan.php */
