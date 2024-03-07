<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model', 'km');
        $this->load->model('Subkriteria_model');
        $this->load->model('Nilai_model', 'nm');
        $this->load->library('Form_validation');
        $this->load->library('m_db');
    }

    public function parameter($id_kriteria)
    {

        $data = array(
            'sub' => $this->db->get_where('subkriteria', ['id_kriteria' => $id_kriteria])->result_array(),
        );
        $data['kriteriaa'] = $id_kriteria ? "?kriteria=" . $id_kriteria : "";
        $data['kriteria'] = $id_kriteria;
        $data['title'] = 'Halaman Penilaian';
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('penilaian/parameter', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $ref = $this->input->get('kriteria');
        $data['title'] = 'Halaman Tambah Penilaian';
        $tes = $this->uri->segment(3);
        $data['cek'] = $this->db->query("SELECT nilai FROM subkriteria WHERE id_kriteria ='$tes'")->result();

        $data['kriteria'] = $this->uri->segment(3);
        $data['id'] = $tes;
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penilaian/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {



            $ref = $this->input->post('id_kriteria');


            $link = $ref ? "?kriteria=" . $ref : "";
            $id_kriteria = $this->input->post('id_kriteria');
            $id_nilai = $this->input->post('nilai');
            $ket = $this->input->post('ket');

            $data = [
                'id_kriteria' => $id_kriteria,
                'nilai' => $id_nilai,
                'nama' => $ket,
            ];

            $this->db->insert('subkriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil Berhasil
			</div>');
            redirect(base_url() . "penilaian/parameter/" . $ref);
            // }
        }
    }
    public function ubah($id, $krit)
    {
        $data['title'] = 'Halaman Ubah Penilaian';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['krit'] = $krit;
        $ref = $this->input->get('kriteria');
        $tes = $this->uri->segment(3);
        $data['cek'] = $this->db->query("SELECT nilai FROM subkriteria WHERE id_kriteria ='$tes'")->result();
        $data['var'] = $this->db->query("SELECT * FROM subkriteria WHERE id_subkriteria ='$id'")->row_array();

        $data['kriteria'] = $this->uri->segment(3);
        $data['id'] = $tes;
        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penilaian/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {



            $ref = $this->input->post('id_kriteria');


            $link = $ref ? "?kriteria=" . $ref : "";
            $id_kriteria = $this->input->post('id_kriteria');
            $id_nilai = $this->input->post('nilai');
            $ket = $this->input->post('ket');

            $data = [
                'nilai' => $id_nilai,
                'nama' => $ket,
            ];

            $this->db->where('id_subkriteria', $id);
            $this->db->update('subkriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Data Berhasil Berhasil
			</div>');
            redirect(base_url() . "penilaian/parameter/" . $krit);
            // }
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');
        $ref =  $this->input->post('idd');
        $this->db->where('id_subkriteria', $id);
        $this->db->delete('subkriteria');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data penilaian berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect(base_url() . "penilaian/parameter/" . $ref);
    }
    public function get($id)
    {
        $data = $this->db->get_where('subkriteria', ['id_subkriteria' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
