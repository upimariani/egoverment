<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKematian extends CI_Controller
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
            'kematian' => $this->mPengajuan->kematian()
        );
        $this->load->view('Pelayanan/Layout/head');
        $this->load->view('Pelayanan/Layout/aside');
        $this->load->view('Admin/Kematian/vKematian', $data);
        $this->load->view('Pelayanan/Layout/footer');
    }
    public function cetak($id_kematian)
    {
        $data_status = array(
            'stat_kematian' => '1'
        );
        $this->db->where('id_kematian', $id_kematian);
        $this->db->update('kematian', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_kematian);
        $nama = $data_surat['kematian']->nama_lengkap;
        $ttl = $data_surat['kematian']->ttl;
        $agama = $data_surat['kematian']->agama;
        $pekerjaan = $data_surat['kematian']->pekerjaan;
        $alamat = $data_surat['kematian']->alamat;
        $tempat = $data_surat['kematian']->tempat;
        $tgl_meninggal = $data_surat['kematian']->tgl_meninggal;
        $akibat = $data_surat['kematian']->akibat;
        $binti = $data_surat['kematian']->nama_ibu;
        $no_surat = '00' . $data_surat['kematian']->no_surat_kematian;
        $date = date('Y-m-d');


        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/KEMATIAN.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NO", $no_surat, $document);
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#BINTI", $data_surat['kematian']->nama_ibu, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#PEKERJAAN", $pekerjaan, $document);
        $document = str_replace("#TEMPAT", $alamat, $document);
        $document = str_replace("#TANGGAL", $tgl_meninggal, $document);
        $document = str_replace("#SEBAB", $akibat, $document);
        $document = str_replace("#DI", $data_surat['kematian']->tempat, $document);
        $document = str_replace("#WAKTU", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT KEMATIAN.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cKematian.php */
