<?php
class C_kegiatan extends CI_Controller
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
        $compount['judul_halaman'] = 'Data kegiatan';
        $compount['menu'] = ['mn_kegiatan' => "active"];
        $data['data_kegiatan'] = $this->db->get('kegiatan')->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('kegiatan/V_list_kegiatan', $data);
        $this->load->view('template/V_footer');
    }


    public function add_kegiatan()
    {
        $compount['judul_halaman'] = 'Tambah Data kegiatan';
        $compount['menu'] = ['mn_kegiatan' => "active"];
        $data['data_petugas'] = $this->M_petugas->getAll();
        $this->load->view('template/V_header', $compount);
        $this->load->view('kegiatan/V_add_kegiatan', $data);
        $this->load->view('template/V_footer');
    }

    public function edit_kegiatan($id)
    {
        $compount['judul_halaman'] = 'Edit Data kegiatan';
        $compount['menu'] = ['mn_kegiatan' => "active"];
        $data['data_kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id])->row();
        $data['data_petugas'] = $this->M_petugas->getAll();
        $this->load->view('template/V_header', $compount);
        $this->load->view('kegiatan/V_edit_kegiatan', $data);
        $this->load->view('template/V_footer');
    }

    public function save_temp_kegiatan()
    {
        $data = [
            'id_petugas' => $this->input->post('id_petugas'),
            'nama' => $this->input->post('nama'),
            'posisi' => $this->input->post('posisi'),
        ];
        $this->db->insert('temp_petugas_kegiatan', $data);
        $this->load->view("kegiatan/V_temp_kegiatan");
    }

    public function delete_temp_kegiatan()
    {
        $id = $this->input->post('id');
        $this->db->delete('temp_petugas_kegiatan', array('id' => $id));
?>
        <script>
            alert("Data Berhasil Di hapus");
        </script>
    <?php
        $this->load->view("kegiatan/V_temp_kegiatan");
    }


    public function save_kegiatan()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('tata_ibadah', 'Tata Ibadah', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'tata_ibadah' => $this->input->post('tata_ibadah')
            ];
            $this->db->insert('kegiatan', $data);
            $id_kegiatan = $this->db->insert_id();

            $this->db->query("INSERT INTO petugas_kegiatan (id_kegiatan,id_petugas,nama,posisi)SELECT '$id_kegiatan',id_petugas,nama,posisi from temp_petugas_kegiatan");
            $this->db->empty_table('temp_petugas_kegiatan');

            $this->session->set_flashdata('msg_success', 'Data berhasil Disimpan.');
            redirect('C_kegiatan/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_kegiatan/add_kegiatan');
        }
    }

    public function update_kegiatan()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('tata_ibadah', 'Tata Ibadah', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id_kegiatan = $this->input->post('id_kegiatan');
            $data_kegiatan = [
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'tata_ibadah' => $this->input->post('tata_ibadah')
            ];
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('kegiatan', $data_kegiatan);

            $this->session->set_flashdata('msg_success', 'Data berhasil Diupdate.');
            redirect('C_kegiatan/');
        } else {
            $this->session->set_flashdata('msg_danger', 'Input data gagal: ' . validation_errors());
            redirect('C_kegiatan/edit_kegiatan/' . $this->input->post('id_kegiatan'));
        }
    }

    public function delete_kegiatan()
    {
        $id_kegiatan = $this->input->post('id');
        $this->db->delete('petugas_kegiatan', array('id_kegiatan' => $id_kegiatan));
        $this->db->delete('kegiatan', array('id_kegiatan' => $id_kegiatan));
        $this->session->set_flashdata('msg_info', 'Data berhasil Dihapus.');
        redirect('C_kegiatan');
    }

    //end crud kegiatan

    public function tampil_petugas()
    {
        $data['id_kegiatan'] = $this->input->post('id_kegiatan');
        $this->load->view("kegiatan/V_edit_petugas", $data);
    }

    public function save_petugas()
    {
        $data = [
            'id_petugas' => $this->input->post('id_petugas'),
            'nama' => $this->input->post('nama'),
            'posisi' => $this->input->post('posisi'),
            'id_kegiatan' =>  $this->input->post('id_kegiatan')
        ];
        $this->db->insert('petugas_kegiatan', $data);
        $this->load->view("kegiatan/V_edit_petugas", $data);
    }

    public function edit_petugas()
    {
        $idl['id_kegiatan'] = $this->input->post('id_l');
        $data = [
            'id_petugas' => $this->input->post('id_petugas')
        ];
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->update('petugas_kegiatan', $data);

        $this->load->view("kegiatan/V_edit_petugas", $idl);
    }

    public function delete_petugas()
    {
        $id = $this->input->post('id');
        $this->db->delete('petugas_kegiatan', array('id' => $id));
        $data['id_kegiatan'] =  $this->input->post('id_kegiatan');
    ?>
        <script>
            alert("Data Berhasil Di hapus");
        </script>
<?php
        $this->load->view("kegiatan/V_edit_petugas", $data);
    }
}
