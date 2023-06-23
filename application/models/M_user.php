<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'level_user.id=user.level', 'left');
        return $this->db->get()->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('level_user', 'level_user.id=user.level', 'left');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }
}
