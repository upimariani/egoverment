<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mStatusSurat extends CI_Model
{
    public function status()
    {
        $data['domisili'] = $this->db->query("SELECT * FROM `domisili` JOIN masyarakat ON domisili.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['ket_lahir'] = $this->db->query("SELECT * FROM `ket_kelahiran` JOIN masyarakat ON ket_kelahiran.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['pindah'] = $this->db->query("SELECT * FROM `ket_pindah` JOIN masyarakat ON ket_pindah.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['sktm'] = $this->db->query("SELECT * FROM `sktm` JOIN masyarakat ON sktm.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['sku'] = $this->db->query("SELECT * FROM `sku` JOIN masyarakat ON sku.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['kematian'] = $this->db->query("SELECT * FROM `kematian` JOIN masyarakat ON kematian.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['bmr'] = $this->db->query("SELECT * FROM `blm_mmlk_rumah` JOIN masyarakat ON blm_mmlk_rumah.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        $data['menikah'] = $this->db->query("SELECT * FROM `belum_kawin` JOIN masyarakat ON belum_kawin.id_masyarakat=masyarakat.id_masyarakat WHERE nik=" . $this->session->userdata('nik'))->result();
        return $data;
    }

    public function cetak_surat($id)
    {
        $data['domisili'] = $this->db->query("SELECT * FROM `domisili` JOIN masyarakat ON domisili.id_masyarakat=masyarakat.id_masyarakat WHERE id_domisili=" . $id . ";")->row();
        $data['ketlahir'] = $this->db->query("SELECT * FROM `ket_kelahiran` JOIN masyarakat ON ket_kelahiran.id_masyarakat=masyarakat.id_masyarakat WHERE id_ket_kelahiran=" . $id . ";")->row();
        $data['pindah'] = $this->db->query("SELECT * FROM `ket_pindah` JOIN masyarakat ON ket_pindah.id_masyarakat=masyarakat.id_masyarakat WHERE id_pindah=" . $id . ";")->row();
        $data['sku'] = $this->db->query("SELECT * FROM `sku` JOIN masyarakat ON sku.id_masyarakat=masyarakat.id_masyarakat WHERE id_sku=" . $id . ";")->row();
        $data['kematian'] = $this->db->query("SELECT * FROM `kematian` JOIN masyarakat ON kematian.id_masyarakat=masyarakat.id_masyarakat WHERE id_kematian=" . $id . ";")->row();
        $data['kawin'] = $this->db->query("SELECT * FROM `belum_kawin` JOIN masyarakat ON belum_kawin.id_masyarakat=masyarakat.id_masyarakat WHERE id_kawin=" . $id . ";")->row();
        $data['rumah'] = $this->db->query("SELECT * FROM `blm_mmlk_rumah` JOIN masyarakat ON blm_mmlk_rumah.id_masyarakat=masyarakat.id_masyarakat WHERE id_rumah=" . $id . ";")->row();
        $data['sktm'] = $this->db->query("SELECT * FROM `sktm` JOIN masyarakat ON sktm.id_masyarakat=masyarakat.id_masyarakat WHERE id_sktm=" . $id . ";")->row();
        return $data;
    }
}

/* End of file mStatusSurat.php */
