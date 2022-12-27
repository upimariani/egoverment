<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPindah extends CI_Controller
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
            'pindah' => $this->mPengajuan->pindah()
        );
        $this->load->view('Admin/Layout/head');
        $this->load->view('Admin/Layout/aside');
        $this->load->view('Admin/Pindah/vPindah', $data);
        $this->load->view('Admin/Layout/footer');
    }
    public function cetak($id_pindah)
    {
        $data_status = array(
            'stat_pindah' => '1'
        );
        $this->db->where('id_pindah', $id_pindah);
        $this->db->update('ket_pindah', $data_status);


        $data_surat = $this->mStatusSurat->cetak_surat($id_pindah);

        if ($data_surat['pindah']->type_pindah == '1') {
            $antar = 'Desa';
        } else if ($data_surat['pindah']->type_pindah == '2') {
            $antar = 'Kecamatan/Desa';
        } else {
            $antar = 'Provinsi';
        }
        $antar = $antar;
        $no_kk = $data_surat['pindah']->no_kk;
        $nama_kk = $data_surat['pindah']->nama_lengkap;
        $alamat = $data_surat['pindah']->alamat;
        $nik = $data_surat['pindah']->nik;
        $alasan = $data_surat['pindah']->alasan;
        $alamat_tuj = $data_surat['pindah']->alamat_tujuan;
        $rtt = $data_surat['pindah']->rt;
        $rwt = $data_surat['pindah']->rw;
        $desa_tujuan = $data_surat['pindah']->desa_kel;
        $kec = $data_surat['pindah']->kec;
        $kab = $data_surat['pindah']->kab;
        $prov = $data_surat['pindah']->prov;
        $kode_pos = $data_surat['pindah']->rt;


        $jenis_pindah = $data_surat['pindah']->jenis_pindah;
        $stat_kk_tidak = $data_surat['pindah']->stat_kk_iya;
        $stat_kk_iya = $data_surat['pindah']->stat_kk_tidak;


        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/PINDAH.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#ANTAR", $antar, $document);
        $document = str_replace("#NO_KK", $no_kk, $document);
        $document = str_replace("#NAMA_KK", $nama_kk, $document);
        $document = str_replace("#ALAMAT", $alamat, $document);
        $document = str_replace("#NIK", $nik, $document);
        $document = str_replace("#NAMA", $nama_kk, $document);

        $document = str_replace("#A", $alasan, $document);
        $document = str_replace("#ALAMAT", $alamat_tuj, $document);
        $document = str_replace("#RTT", $rtt, $document);
        $document = str_replace("#RWT", $rwt, $document);
        $document = str_replace("#DESA", $desa_tujuan, $document);
        $document = str_replace("#KEC", $kec, $document);
        $document = str_replace("#KOTA", $kab, $document);
        $document = str_replace("#PROV", $prov, $document);
        $document = str_replace("#KODE", $kode_pos, $document);
        $document = str_replace("#B", $jenis_pindah, $document);
        $document = str_replace("#C", $stat_kk_tidak, $document);
        $document = str_replace("#D", $stat_kk_iya, $document);

        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT PINDAH.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cPindah.php */
