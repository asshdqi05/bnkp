<?php
class C_uang_keluar extends CI_Controller
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
        $compount['judul_halaman'] = 'Data uang Keluar';
        $compount['menu'] = ['mn_uang_keluar' => "active"];
        $data['data_uang_keluar'] = $this->db->get('uang_keluar')->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_keluar/V_list_uang_keluar', $data);
        $this->load->view('template/V_footer');
    }


    public function add_uang_keluar()
    {
        $compount['judul_halaman'] = 'Tambah Data uang keluar';
        $compount['menu'] = ['mn_uang_keluar' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_keluar/V_add_uang_keluar');
        $this->load->view('template/V_footer');
    }

    public function edit_uang_keluar($id)
    {
        $compount['judul_halaman'] = 'Tambah Data uang keluar';
        $compount['menu'] = ['mn_uang_keluar' => "active"];
        $data['data_uang_keluar'] = $this->db->get_where('uang_keluar', ['id_uang_keluar' => $id])->row();
        $this->load->view('template/V_header', $compount);
        $this->load->view('uang_keluar/V_edit_uang_keluar', $data);
        $this->load->view('template/V_footer');
    }

    public function save_uang_keluar()
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
            $this->db->insert('uang_keluar', $data);

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_uang_keluar/add_uang_keluar');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_uang_keluar/add_uang_keluar');
        }
    }

    public function update_uang_keluar()
    {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id_uang_keluar = $this->input->post('id_uang_keluar');
            $data_uang_keluar = [
                'tanggal' => $this->input->post('tanggal'),
                'jumlah' => $this->input->post('jumlah'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->where('id_uang_keluar', $id_uang_keluar);
            $this->db->update('uang_keluar', $data_uang_keluar);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_uang_keluar/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_uang_keluar/edit_uang_keluar/' . $this->input->post('id_uang_keluar'));
        }
    }

    public function delete_uang_keluar()
    {
        $id_uang_keluar = $this->input->post('id');
        $this->db->delete('uang_keluar', array('id_uang_keluar' => $id_uang_keluar));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_uang_keluar');
    }

    //end crud uang_keluar

}
