<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDomisili extends CI_Controller
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
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Domisili/vDomisili', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function cetak($id_domisili)
    {
        $data_status = array(
            'stat_dom' => '1'
        );
        $this->db->where('id_domisili', $id_domisili);
        $this->db->update('domisili', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_domisili);
        $nama = $data_surat['domisili']->nama_lengkap;
        $jk = $data_surat['domisili']->jk;
        $ttl = $data_surat['domisili']->ttl;
        $agama = $data_surat['domisili']->agama;
        $alamat = $data_surat['domisili']->alamat;
        $no_surat = '00' . $data_surat['domisili']->no_surat_dom;
        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/DOMISILI.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#JK", $jk, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#NO", $no_surat, $document);
        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT DOMISILI.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cDomisili.php */
