<?php
class C_petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_petugas');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('msg_danger', 'Anda Harus Login Terlebih Dahulu!!!');
            redirect('C_login');
        }
    }

    public function index()
    {
        $compount['judul_halaman'] = 'Data Petugas';
        $compount['menu'] = ['mn_petugas' => "active"];
        $data['data_petugas'] = $this->M_petugas->getAll();
        $this->load->view('template/V_header', $compount);
        $this->load->view('petugas/V_list_petugas', $data);
        $this->load->view('template/V_footer');
    }


    public function add_petugas()
    {
        $compount['judul_halaman'] = 'Tambah Data petugas';
        $compount['menu'] = ['mn_petugas' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('petugas/V_add_petugas');
        $this->load->view('template/V_footer');
    }

    public function edit_petugas($id)
    {
        $compount['judul_halaman'] = 'Edit Data petugas';
        $compount['menu'] = ['mn_petugas' => "active"];
        $data['data_petugas'] = $this->M_petugas->getById($id);
        $this->load->view('template/V_header', $compount);
        $this->load->view('petugas/V_edit_petugas', $data);
        $this->load->view('template/V_footer');
    }

    public function save_petugas()
    {
        $this->form_validation->set_rules('id_anggota', 'Nama petugas', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal' => $this->input->post('tanggal'),
                'posisi' => $this->input->post('posisi')
            ];
            $this->db->insert('petugas', $data);

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_petugas/add_petugas');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_petugas/add_petugas');
        }
    }

    public function update_petugas()
    {
        $this->form_validation->set_rules('id_anggota', 'Nama petugas', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id_petugas = $this->input->post('id_petugas');
            $data_petugas = [
                'id_anggota' => $this->input->post('id_anggota'),
                'tanggal' => $this->input->post('tanggal'),
                'posisi' => $this->input->post('posisi')
            ];
            $this->db->where('id_petugas', $id_petugas);
            $this->db->update('petugas', $data_petugas);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_petugas/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_petugas/edit_petugas/' . $this->input->post('id_petugas'));
        }
    }

    public function delete_petugas()
    {
        $id_petugas = $this->input->post('id');
        $this->db->delete('petugas', array('id_petugas' => $id_petugas));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_petugas');
    }

    //end crud petugas

}
