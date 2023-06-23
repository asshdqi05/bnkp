<?php
class C_uang_masuk extends CI_Controller
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
        $compount['judul_halaman'] = 'Data uang masuk';
        $compount['menu'] = ['mn_uang_masuk' => "active"];
        $data['data_uang_masuk'] = $this->db->get('uang_masuk')->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_masuk/V_list_uang_masuk', $data);
        $this->load->view('template/V_footer');
    }


    public function add_uang_masuk()
    {
        $compount['judul_halaman'] = 'Tambah Data uang masuk';
        $compount['menu'] = ['mn_uang_masuk' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_masuk/V_add_uang_masuk');
        $this->load->view('template/V_footer');
    }

    public function edit_uang_masuk($id)
    {
        $compount['judul_halaman'] = 'Tambah Data uang masuk';
        $compount['menu'] = ['mn_uang_masuk' => "active"];
        $data['data_uang_masuk'] = $this->db->get_where('uang_masuk', ['id_uang_masuk' => $id])->row();
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_masuk/V_edit_uang_masuk', $data);
        $this->load->view('template/V_footer');
    }

    public function save_uang_masuk()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'tanggal' => $this->input->post('tanggal'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('uang_masuk', $data);

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_uang_masuk/add_uang_masuk');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_uang_masuk/add_uang_masuk');
        }
    }

    public function update_uang_masuk()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id_uang_masuk = $this->input->post('id_uang_masuk');
            $data_uang_masuk = [
                'tanggal' => $this->input->post('tanggal'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->where('id_uang_masuk', $id_uang_masuk);
            $this->db->update('uang_masuk', $data_uang_masuk);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_uang_masuk/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_uang_masuk/edit_uang_masuk/' . $this->input->post('id_uang_masuk'));
        }
    }

    public function delete_uang_masuk()
    {
        $id_uang_masuk = $this->input->post('id');
        $this->db->delete('uang_masuk', array('id_uang_masuk' => $id_uang_masuk));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_uang_masuk');
    }

    //end crud uang_masuk

}
