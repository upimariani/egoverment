<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKetLahir extends CI_Controller
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
            'ket_kelahiran' => $this->mPengajuan->ket_kelahiran()
        );
        $this->load->view('Pelayanan/Layout/head');
        $this->load->view('Pelayanan/Layout/aside');
        $this->load->view('Admin/KetKelahiran/vKetKelahiran', $data);
        $this->load->view('Pelayanan/Layout/footer');
    }
    public function cetak($id_ket_kelahiran)
    {
        $data_status = array(
            'stat_lahir' => '1'
        );
        $this->db->where('id_ket_kelahiran', $id_ket_kelahiran);
        $this->db->update('ket_kelahiran', $data_status);



        $data_surat = $this->mStatusSurat->cetak_surat($id_ket_kelahiran);

        $istri = $this->db->query("SELECT * FROM `masyarakat` WHERE no_kk='" . $data_surat['ketlahir']->no_kk . "' AND stat_dlm_kel='Istri';")->row();

        $no_kk = $data_surat['ketlahir']->no_kk;
        $nama = $data_surat['ketlahir']->nama_lengkap;
        $nik = $data_surat['ketlahir']->nik;
        $ttl = $data_surat['ketlahir']->ttl;
        $alamat = $data_surat['ketlahir']->alamat;
        $pekerjaan = $data_surat['ketlahir']->pekerjaan;

        $nikibu = $istri->nik;
        $namaibu = $istri->nama_lengkap;
        $ttl_ibu = $istri->ttl;
        $pekerjaan_ibu = $istri->pekerjaan;

        $nama_bayi =  $data_surat['ketlahir']->nama_bayi;
        $jk_bayi = $data_surat['ketlahir']->jk_bayi;
        $tempat_dilahirkan = $data_surat['ketlahir']->tempat_dilahirkan;
        $tempat_kel = $data_surat['ketlahir']->tempat_kel;
        $ttl_bayi = $data_surat['ketlahir']->hari_tgl_lahir;
        $pukul = $data_surat['ketlahir']->pukul;
        $jenis_kel = $data_surat['ketlahir']->jenis_kel;
        $kelahiran_ke = $data_surat['ketlahir']->kelahiran_ke;
        $penolong_kel = $data_surat['ketlahir']->penolong_kel;
        $berat = $data_surat['ketlahir']->berat;
        $panjang = $data_surat['ketlahir']->panjang;
        $tgl_perkawinan = $data_surat['ketlahir']->tgl_perkawinan;

        $nik_satu = $data_surat['ketlahir']->nik_saksi_satu;
        $nama_satu = $data_surat['ketlahir']->nama_saksi_satu;
        $umur_satu = $data_surat['ketlahir']->umur_saksi_satu;
        $pekerjaan_satu = $data_surat['ketlahir']->pekerjaan_saksi_satu;
        $alamat_satu = $data_surat['ketlahir']->alamat_saksi_satu;

        $nik_dua = $data_surat['ketlahir']->nik_saksi_satu;
        $nama_dua = $data_surat['ketlahir']->nama_saksi_dua;
        $umur_dua = $data_surat['ketlahir']->umur_saksi_dua;
        $pekerjaan_dua = $data_surat['ketlahir']->pekerjaan_saksi_dua;
        $alamat_dua = $data_surat['ketlahir']->alamat_saksi_dua;


        $date = date('Y-m-d');

        // memanggil dan membaca template dokumen yang telah kita buat
        $document = file_get_contents(base_url('asset/surat/KET_LAHIR.rtf'));

        // isi dokumen dinyatakan dalam bentuk string
        $document = str_replace("#NAMA_KK", $nama, $document);
        $document = str_replace("#NO_KK", $no_kk, $document);
        $document = str_replace("#BAYI", $nama_bayi, $document);
        $document = str_replace("#A", $jk_bayi, $document);
        $document = str_replace("#B", $tempat_dilahirkan, $document);
        $document = str_replace("#TEMPAT_KELAHIRAN", $tempat_kel, $document);
        $document = str_replace("#TTL_BAYI", $ttl_bayi, $document);
        $document = str_replace("#PUKUL", $pukul, $document);
        $document = str_replace("#C", $jenis_kel, $document);
        $document = str_replace("#D", $kelahiran_ke, $document);
        $document = str_replace("#E", $penolong_kel, $document);
        $document = str_replace("#BERAT", $berat, $document);
        $document = str_replace("#PANJANG", $panjang, $document);

        $document = str_replace("#NIK_IBU", $nikibu, $document);
        $document = str_replace("#NAMA_IBU", $namaibu, $document);
        $document = str_replace("#TTL_IBU", $ttl_ibu, $document);
        $document = str_replace("#PEKERJAAN_IBU", $pekerjaan_ibu, $document);

        $document = str_replace("#TANGGAL_KAWIN", $tgl_perkawinan, $document);

        $document = str_replace("#NIK_AYAH", $nik, $document);
        $document = str_replace("#NAMA_AYAH", $nama, $document);
        $document = str_replace("#TTL_AYAH", $ttl, $document);
        $document = str_replace("#PEKERJAAN_AYAH", $pekerjaan, $document);
        $document = str_replace("#ALAMAT_AYAH", $alamat, $document);

        $document = str_replace("#NIK_SATU", $nik_satu, $document);
        $document = str_replace("#NAMA_SATU", $nama_satu, $document);
        $document = str_replace("#UMUR_SATU", $umur_satu, $document);
        $document = str_replace("#PEKERJAAN_SATU", $pekerjaan_satu, $document);
        $document = str_replace("#SATU", $alamat_satu, $document);
        $document = str_replace("#NIK_DUA", $nik_dua, $document);
        $document = str_replace("#NAMA_DUA", $nama_dua, $document);
        $document = str_replace("#UMUR_DUA", $umur_dua, $document);
        $document = str_replace("#PEKERJAAN_DUA", $pekerjaan_dua, $document);
        $document = str_replace("#DUA", $alamat_dua, $document);

        $document = str_replace("#DATE", $date, $document);

        // header untuk membuka file output RTF dengan MS. Word

        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=SURAT KETERANGAN LAHIR.doc");
        header("Content-length: " . strlen($document));
        echo $document;
        redirect('Admin/cDomisili', 'refresh');
    }
}

/* End of file cKetLahir.php */
