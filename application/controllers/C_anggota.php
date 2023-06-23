<?php
class C_anggota extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('msg_danger', 'Anda Harus Login Terlebih Dahulu!!!');
            redirect('C_login');
        }
    }

    public function index()
    {
        $compount['judul_halaman'] = 'Data Anggota';
        $compount['menu'] = ['mn_anggota' => "active"];
        $data['data_anggota'] = $this->db->get_where('anggota', ['status' => "Aktif"])->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('anggota/V_list_anggota', $data);
        $this->load->view('template/V_footer');
    }


    public function add_anggota()
    {
        $compount['judul_halaman'] = 'Tambah Data anggota';
        $compount['menu'] = ['mn_anggota' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('anggota/V_add_anggota');
        $this->load->view('template/V_footer');
    }

    public function edit_anggota($id)
    {
        $compount['judul_halaman'] = 'Tambah Data anggota';
        $compount['menu'] = ['mn_anggota' => "active"];
        $data['data_anggota'] = $this->db->get_where('anggota', ['id_anggota' => $id])->row();
        $this->load->view('template/V_header', $compount);
        $this->load->view('anggota/V_edit_anggota', $data);
        $this->load->view('template/V_footer');
    }

    public function save_anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_anggota' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telepon'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'status' => "Aktif"
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

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_anggota/add_anggota');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_anggota/add_anggota');
        }
    }

    public function update_anggota()
    {
        $this->form_validation->set_rules('nama', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.email]');

        if ($this->form_validation->run() == TRUE) {
            $id_anggota = $this->input->post('id_anggota');
            $data_anggota = [
                'nama_anggota' => $this->input->post('nama'),
                'no_telepon' => $this->input->post('no_telepon'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email')
            ];
            $this->db->where('id_anggota', $id_anggota);
            $this->db->update('anggota', $data_anggota);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_anggota/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_anggota/edit_anggota/' . $this->input->post('id_anggota'));
        }
    }

    public function delete_anggota()
    {
        $id_anggota = $this->input->post('id');
        $this->db->delete('anggota', array('id_anggota' => $id_anggota));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_anggota');
    }

    //end crud anggota

}
