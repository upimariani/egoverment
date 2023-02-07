<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSku extends CI_Controller
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
            'sku' => $this->mPengajuan->sku()
        );
        $this->load->view('Kesejahteraan/Layout/head');
        $this->load->view('Kesejahteraan/Layout/aside');
        $this->load->view('Admin/SKU/vSku', $data);
        $this->load->view('Kesejahteraan/Layout/footer');
    }
    public function cetak($id_sku)
    {
        $data_status = array(
            'stat_usaha' => '2'
        );
        $this->db->where('id_sku', $id_sku);
        $this->db->update('sku', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_sku);
        $no = '00' . $data_surat['sku']->no_surat_sku;
        $nama = $data_surat['sku']->nama_lengkap;
        $nik = $data_surat['sku']->nik;
        $jk = $data_surat['sku']->jk;
        $ttl = $data_surat['sku']->ttl;
        $agama = $data_surat['sku']->agama;
        $alamat = $data_surat['sku']->alamat;
        $agama = $data_surat['sku']->agama;

        $jenis_usaha = $data_surat['sku']->jenis_usaha;
        $nama_usaha = $data_surat['sku']->nama_usaha;

        $date = date('Y-m-d');


        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/SKU.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NO", $no, $document);
        $document = str_replace("#NAMA", $nama, $document);
        $document = str_replace("#NIK", $nik, $document);
        $document = str_replace("#JK", $jk, $document);
        $document = str_replace("#TTL", $ttl, $document);
        $document = str_replace("#AGAMA", $agama, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#JENIS_USAHA", $jenis_usaha, $document);
        $document = str_replace("#NM_USH", $nama_usaha, $document);
        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT SKU.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cSku.php */
