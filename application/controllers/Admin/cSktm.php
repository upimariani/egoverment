<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSktm extends CI_Controller
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
            'sktm' => $this->mPengajuan->sktm()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/SKTM/vSktm', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function cetak($id_sktm)
    {
        $data_status = array(
            'stat_sktm' => '1'
        );
        $this->db->where('id_sktm', $id_sktm);
        $this->db->update('sktm', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_sktm);
        $nama = $data_surat['sktm']->nama_lengkap;
        $nik = $data_surat['sktm']->nik;
        $jk = $data_surat['sktm']->jk;
        $ttl = $data_surat['sktm']->ttl;
        $agama = $data_surat['sktm']->agama;
        $alamat = $data_surat['sktm']->alamat;
        $status = $data_surat['sktm']->stat_dlm_kel;
        $no_surat = '00' . $data_surat['sktm']->no_surat_sktm;
        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/SKTM.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#NIK", $nik, $document);
        $document = str_replace("#JK", $jk, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#STATUS", $status, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#NO", $no_surat, $document);
        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT KETERANGAN TIDAK MAMPU.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cSktm', 'refresh');
    }
}

/* End of file cSktm.php */
