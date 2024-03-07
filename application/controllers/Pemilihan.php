<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->model('Kriteria_model', 'mod_kriteria');
        $this->load->model('Alternatif_model', 'mod_alternatif');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['krit'] = $this->db->get('kriteria')->result_array();
        $data['jumlah'] = $this->db->get('kriteria')->num_rows();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pemilihan/index', $data);
        $this->load->view('templates/footer');
    }
    public function bobot()
    {
        $size_arr = $this->input->post('bobot');
        $sum = array_sum($size_arr);
        if ($sum > '1.0') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Nilai Total Semua Bobot Tidak Boleh Lebih dari 100%
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        } else {
            $i = 0;
            foreach ($size_arr as $v) {
                $i++;
                $tes = $this->input->post('id' . $i);
                $data = [
                    'bobot'            => $v
                ];
                $this->db->where('id_kriteria', $tes);
                $this->db->update('kriteria', $data);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Bobot berhasil Di Pilih, Silahkan Melihat Hasil!
               <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </a>
           </div>');
        }
        redirect('pemilihan');
    }
}
