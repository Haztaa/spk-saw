<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
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
        $data['krit'] = $this->db->get('kriteria')->result_array();
        $data['jumlah'] = $this->db->get('kriteria')->num_rows();
        $this->load->view('landing_templates/header', $data);
        $this->load->view('landing_templates/menu', $data);
        $this->load->view('landing/index', $data);
        $this->load->view('landing_templates/footer', $data);
    }
    public function bobot()
    {
        $size_arr = $this->input->post('bobot');
        $sum = array_sum($size_arr);
        if ($sum > '1.0') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                Nilai Total Semua Bobot Tidak Boleh Lebih dari 100%
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
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button> 
                Bobot berhasil Di Pilih, Silahkan Melihat Hasil!
            </div>');
        }
        redirect('landing');
    }
}
