<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    public function laporan_petugas()
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('anggota', 'anggota.id_anggota=petugas.id_anggota', 'left');
        return $this->db->get()->result();
    }

    public function uang_masuk_perbulan($bulan, $tahun)
    {
        $uang_masuk = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_masuk WHERE DATE_FORMAT(tanggal,'%c')='$bulan' AND DATE_FORMAT(tanggal,'%Y')='$tahun'");
        return $uang_masuk->row();
    }

    public function uang_keluar_perbulan($bulan, $tahun)
    {
        $uang_keluar = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_keluar WHERE DATE_FORMAT(tanggal,'%c')='$bulan' AND DATE_FORMAT(tanggal,'%Y')='$tahun'");
        return $uang_keluar->row();
    }

    public function uang_masuk_pertahun($tahun)
    {
        $uang_masuk = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_masuk WHERE DATE_FORMAT(tanggal,'%Y')='$tahun'");
        return $uang_masuk->row();
    }
    public function uang_keluar_pertahun($tahun)
    {
        $uang_keluar = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_keluar WHERE DATE_FORMAT(tanggal,'%Y')='$tahun'");
        return $uang_keluar->row();
    }

    public function uang_masuk()
    {
        $uang_masuk = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_masuk");
        return $uang_masuk->row();
    }
    public function uang_keluar()
    {
        $uang_keluar = $this->db->query("SELECT SUM(jumlah) as total ,tanggal FROM uang_keluar");
        return $uang_keluar->row();
    }

    public function uang_masuk_perperiode($tgl_awal, $tgl_akhir)
    {
        $uang_masuk = $this->db->query("SELECT * FROM uang_masuk WHERE tanggal BETWEEN '$tgl_awal' and'$tgl_akhir'");
        return $uang_masuk->result();
    }

    public function uang_keluar_perperiode($tgl_awal, $tgl_akhir)
    {
        $uang_keluar = $this->db->query("SELECT * FROM uang_keluar WHERE tanggal BETWEEN '$tgl_awal' and'$tgl_akhir'");
        return $uang_keluar->result();
    }

    public function kegiatan_perperiode($tgl_awal, $tgl_akhir)
    {
        $kegiatan = $this->db->query("SELECT * FROM kegiatan WHERE tanggal BETWEEN '$tgl_awal' and'$tgl_akhir'");
        return $kegiatan->result();
    }
}
