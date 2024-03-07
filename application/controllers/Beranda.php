<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        if ($this->session->userdata('level') == 'Pegawai') {
            redirect('retribusi');
        }
        date_default_timezone_set('Asia/Makassar');
    }
    public function index()
    {

        $data['title'] = 'Halaman Beranda';
        $data['kriteria'] = $this->db->get('kriteria')->num_rows();
        $data['monitor'] = $this->db->get('monitor')->num_rows();
        $data['alternatif'] = $this->db->get('alternatif')->num_rows();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('beranda/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function bulan()
    {
        $bulan = $this->input->post('bulan');
        $data =  [
            'bulan' => $bulan
        ];
        $this->db->where('id_bulan', '1');
        $this->db->update('bulan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Berhasil!
			 <a href="#" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">×</span>
			 </a>
		 </div>');
        redirect('Beranda_A');
    }
}
