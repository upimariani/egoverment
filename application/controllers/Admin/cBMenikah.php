<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBMenikah extends CI_Controller
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
            'belum_kawin' => $this->mPengajuan->belum_kawin()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/BMenikah/vBMenikah', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function cetak($id_kawin)
    {
        $data_status = array(
            'stat_surat' => '1'
        );
        $this->db->where('id_kawin', $id_kawin);
        $this->db->update('belum_kawin', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_kawin);
        $no = '00' . $data_surat['kawin']->no_surat_kawin;
        $nama = $data_surat['kawin']->nama_lengkap;
        $ttl = $data_surat['kawin']->ttl;
        $agama = $data_surat['kawin']->agama;
        $alamat = $data_surat['kawin']->alamat;
        $status = $data_surat['kawin']->stat_kawin;
        $nik = $data_surat['kawin']->nik;
        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/KETKAWIN.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NO", $no, $document);
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#STATUS", $status, $document);
        $document = str_replace("#NIK", $nik, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT KETERANGAN STATUS KAWIN.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cBMenikah.php */
