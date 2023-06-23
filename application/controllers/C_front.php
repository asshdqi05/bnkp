<?php
class C_front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('front/index');
    }


    public function save_anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.email]');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_anggota' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telepon'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'status' => "Menunggu Konfirmasi"
            ];
            $this->db->insert('anggota', $data);
            $id_anggota = $this->db->insert_id();

            $data_user = [
                'nama_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'level' => 5,
                'id_anggota' => $id_anggota
            ];
            $this->db->insert('user', $data_user);

            $this->session->set_flashdata('msg_success', 'Pendaftaran berhasil.');
            redirect('C_front');
        } else {
            $this->session->set_flashdata('msg_danger', 'Pendaftaran gagal: ' . validation_errors());
            redirect('C_front');
        }
    }

    public function tampil_data_petugas()
    {
        $data['id_kegiatan'] = $this->input->post('id_kegiatan');
        $this->load->view("front/V_data_petugas", $data);
    }
}
