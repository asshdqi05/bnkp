<?php
class C_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_user');

        if (!$this->session->userdata('username') && !$this->session->userdata('nama_user')) {
            $this->session->set_flashdata('msg_danger', 'Anda Harus Login Sebagai Admin Terlebih Dahulu!!!');
            redirect('C_login');
        }
    }

    public function index()
    {
        $compount['judul_halaman'] = 'Dashboards';
        $compount['menu'] = ['mn_dashboard' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('template/V_home');
        $this->load->view('template/V_footer');
    }

    public function user()
    {
        $compount['judul_halaman'] = 'Data user';
        $compount['menu'] = ['mn_user' => "active"];
        $data['data_user'] = $this->M_user->getAll();
        $this->load->view('template/V_header', $compount);
        $this->load->view('user/V_list_user', $data);
        $this->load->view('template/V_footer');
    }

    public function add_user()
    {
        $compount['judul_halaman'] = 'Tambah Data user';
        $compount['menu'] = ['mn_user' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('user/V_add_user');
        $this->load->view('template/V_footer');
    }

    public function edit_user($id)
    {
        $compount['judul_halaman'] = 'Tambah Data user';
        $compount['menu'] = ['mn_user' => "active"];
        $data['data_user'] = $this->M_user->getById($id);
        $this->load->view('template/V_header', $compount);
        $this->load->view('user/V_edit_user', $data);
        $this->load->view('template/V_footer');
    }

    public function save_user()
    {
        $this->form_validation->set_rules('nama', 'nama user', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data_user = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama_user' => $this->input->post('nama'),
                'level' => $this->input->post('level')
            ];
            $this->db->insert('user', $data_user);

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_admin/add_user');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_admin/add_user');
        }
    }

    public function update_user()
    {
        $this->form_validation->set_rules('nama', 'nama user', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id_user = $this->input->post('id_user');

            if ($this->input->post('password') == "") {
                $pw = $this->input->post('password_old');
            } else {
                $pw = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            $data_user = [
                'username' => $this->input->post('username'),
                'password' => $pw,
                'nama_user' => $this->input->post('nama'),
                'level' => $this->input->post('level')
            ];
            $this->db->where('id_user', $id_user);
            $this->db->update('user', $data_user);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_admin/user');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_admin/edit_user/' . $this->input->post('id_user'));
        }
    }

    public function delete_user()
    {
        $id_user = $this->input->post('id');
        $this->db->delete('user', array('id_user' => $id_user));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_admin/user');
    }

    //end crud admin

}
