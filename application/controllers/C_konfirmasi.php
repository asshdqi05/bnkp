<?php
class C_konfirmasi extends CI_Controller
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
        $compount['judul_halaman'] = 'Konfirmasi Anggota';
        $compount['menu'] = ['mn_konfirmasi' => "active"];
        $data['data_anggota'] = $this->db->get_where('anggota', ['status' => "Menunggu Konfirmasi"])->result();
        $this->load->view('template/V_header', $compount);
        $this->load->view('anggota/V_list_konfirmasi', $data);
        $this->load->view('template/V_footer');
    }

    public function konfirmasi_anggota()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');

        $tglaktif = date("d-m-Y H:i:s");
        $subject      = 'Pemberitahuan Jemaat BNKP';
        $message      = "<html><body>Halooo! <b> " . $nama . "</b> ... 
        <br> Hari ini pada tanggal <span style='color:red'>$tglaktif</span> Pendaftaran Jemaat BNKP Anda Sudah Dikonfirmasi.	
        <br> Anda Sudah Resmi Tergabung Kedalam Jemaat BNKP.		
        <br>Terimakasih.
					</body></html> \n";


        $config = array(
            'useragent' => 'CodeIgniter',
            'protocol'  => 'smtp',
            'mailpath'  => '/usr/sbin/sendmail',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'laiaririn27@gmail.com',
            'smtp_pass' => 'susdimalafrederikakarenkatherinelaia',
            'smtp_keepalive' => TRUE,
            'smtp_crypto' => 'SSL',
            'wordwrap'  => TRUE,
            'wrapchars' => 80,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'validate'  => TRUE,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        );


        //load library email dan konfigurasinya
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        //Kirim email
        //email dan nama pengirim 

        $this->email->from("laiaririn27@gmail.com", "BNKP Padang");
        //email penerima 

        $this->email->to($email);

        //subject email
        $this->email->subject($subject);

        //isi email
        $this->email->message($message);

        $this->email->send();

        $data = ['status' => "Aktif"];
        $this->db->update('anggota', $data, array('id_anggota' => $id));

        $this->session->set_flashdata('msg_success', 'Anggota berhasil Dikonfirmasi.');
        redirect('C_konfirmasi');
    }
}
