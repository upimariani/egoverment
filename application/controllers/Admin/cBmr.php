<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBmr extends CI_Controller
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
            'rumah' => $this->mPengajuan->blm_mmlk_rumah()
        );
        $this->load->view('Pemerintahan/Layout/head');
        $this->load->view('Pemerintahan/Layout/aside');
        $this->load->view('Admin/Bmr/vBmr', $data);
        $this->load->view('Pemerintahan/Layout/footer');
    }
    public function cetak($id_rumah)
    {
        $data_status = array(
            'stat_rumah' => '1'
        );
        $this->db->where('id_rumah', $id_rumah);
        $this->db->update('blm_mmlk_rumah', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_rumah);
        $no = '00' . $data_surat['rumah']->no_surat_rumah;
        $nama = $data_surat['rumah']->nama_lengkap;
        $jk = $data_surat['rumah']->jk;
        $ttl = $data_surat['rumah']->ttl;
        $agama = $data_surat['rumah']->agama;
        $alamat = $data_surat['rumah']->alamat;
        $nik = $data_surat['rumah']->nik;
        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/BMR.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NO", $no, $document);
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#JK", $jk, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#NIK", $nik, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT KETERANGAN BELUM MEMILIKI RUMAH.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cBmr.php */
