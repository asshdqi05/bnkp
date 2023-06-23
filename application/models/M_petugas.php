<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('anggota', 'anggota.id_anggota=petugas.id_anggota', 'left');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('anggota', 'anggota.id_anggota=petugas.id_anggota', 'left');
        $this->db->where('id_petugas', $id);
        return $this->db->get()->row();
    }
}
