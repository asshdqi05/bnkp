<?php
class C_laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_laporan');

        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('msg_danger', 'Anda Harus Login Terlebih Dahulu!!!');
            redirect('C_login');
        }
    }

    public function index()
    {
        $compount['judul_halaman'] = 'Laporan';
        $compount['menu'] = ['mn_laporan' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan');
        $this->load->view('template/V_footer');
    }

    public function laporan_keuangan()
    {
        $compount['judul_halaman'] = 'Laporan Keuangan';
        $compount['menu'] = ['mn_laporan_keuangan' => "active"];
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_keuangan');
        $this->load->view('template/V_footer');
    }

    public function laporan_data_anggota()
    {
        $compount['judul_halaman'] = 'Laporan Data Anggota';
        $compount['menu'] = ['mn_laporan' => "active"];
        $data['laporan'] = $this->db->get('anggota')->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_data_anggota', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_data_petugas()
    {
        $compount['judul_halaman'] = 'Laporan Data Petugas';
        $compount['menu'] = ['mn_laporan' => "active"];
        $data['laporan'] = $this->M_laporan->laporan_petugas();
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_data_petugas', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_kegiatan()
    {
        $compount['judul_halaman'] = 'Laporan Kegiatan';
        $compount['menu'] = ['mn_laporan' => "active"];
        $data['tgl_awal'] = $this->input->post('tgl_awal');
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['laporan'] = $this->M_laporan->kegiatan_perperiode($this->input->post('tgl_awal'), $this->input->post('tgl_akhir'));
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_kegiatan', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_uang_masuk()
    {
        $compount['judul_halaman'] = 'Laporan Uang Masuk';
        $compount['menu'] = ['mn_laporan' => "active"];
        $data['tgl_awal'] = $this->input->post('tgl_awal');
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['laporan'] = $this->M_laporan->uang_masuk_perperiode($this->input->post('tgl_awal'), $this->input->post('tgl_akhir'));
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_uang_masuk', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_uang_keluar()
    {
        $compount['judul_halaman'] = 'Laporan Uang Keluar';
        $compount['menu'] = ['mn_laporan' => "active"];
        $data['tgl_awal'] = $this->input->post('tgl_awal');
        $data['tgl_akhir'] = $this->input->post('tgl_akhir');
        $data['laporan'] = $this->M_laporan->uang_keluar_perperiode($this->input->post('tgl_awal'), $this->input->post('tgl_akhir'));
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_uang_keluar', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_kas_perbulan()
    {
        $compount['judul_halaman'] = 'Laporan Kas Perbulan';
        $compount['menu'] = ['mn_laporan' => "active"];
        $uang_masuk = $this->M_laporan->uang_masuk_perbulan($this->input->post('bulan'), $this->input->post('tahun'));
        $uang_keluar = $this->M_laporan->uang_keluar_perbulan($this->input->post('bulan'), $this->input->post('tahun'));
        $data['tanggal'] = $uang_masuk->tanggal;
        $data['uang_masuk'] = $uang_masuk->total;
        $data['uang_keluar'] = $uang_keluar->total;
        $data['tahun'] = $this->input->post('tahun');
        $data['bulan'] = $this->input->post('bulan');
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_kas_perbulan', $data);
        $this->load->view('template/V_footer');
    }
    public function laporan_kas_pertahun()
    {
        $compount['judul_halaman'] = 'Laporan Kas Pertahun';
        $compount['menu'] = ['mn_laporan' => "active"];
        $uang_masuk = $this->M_laporan->uang_masuk_pertahun($this->input->post('tahun'));
        $uang_keluar = $this->M_laporan->uang_keluar_pertahun($this->input->post('tahun'));
        $data['uang_masuk'] = $uang_masuk->total;
        $data['uang_keluar'] = $uang_keluar->total;
        $data['tahun'] = $this->input->post('tahun');
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_kas_pertahun', $data);
        $this->load->view('template/V_footer');
    }

    public function laporan_kas()
    {
        $compount['judul_halaman'] = 'Laporan Kas';
        $compount['menu'] = ['mn_laporan' => "active"];
        $uang_masuk = $this->M_laporan->uang_masuk();
        $uang_keluar = $this->M_laporan->uang_keluar();
        $data['uang_masuk'] = $uang_masuk->total;
        $data['uang_keluar'] = $uang_keluar->total;
        $this->load->view('template/V_header', $compount);
        $this->load->view('laporan/V_laporan_kas', $data);
        $this->load->view('template/V_footer');
    }
}
