<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('login/V_login');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|trim',
            [
                'required' => 'Username Tidak Boleh kosong!!',
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Tidak Boleh kosong!!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('msg_danger', 'Login gagal: ' . validation_errors());
            redirect('C_login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['level'] == 5) {
                    $cek = $this->db->get_where('anggota', ['id_anggota' => $user['id_anggota']])->row();
                    if ($cek->status != "Aktif") {
                        $this->session->set_flashdata('msg_danger', 'Login Gagal.Akun Anda Belum Aktif!.');
                        redirect('C_login');
                    }
                }
                $data = [
                    'id_user' => $user['id_user'],
                    'nama_user' => $user['nama_user'],
                    'username' => $user['username'],
                    'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                redirect('C_admin');
            } else {
                $this->session->set_flashdata('msg_danger', 'Password Salah.');
                redirect('C_login');
            }
        } else {
            $this->session->set_flashdata('msg_danger', 'Username Salah atau Tidak terdaftar!!.');
            redirect('C_login');
        }
    }


    function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');
        redirect('C_login');
    }
}
        
    /* End of file  C_login.php */
