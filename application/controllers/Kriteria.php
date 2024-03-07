<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{


    public function index()
    {
        $data['title'] = 'Halaman Kriteria';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kriteria/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Kriteria';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $this->form_validation->set_rules('nama_kriteria', 'Nama kriteria', 'required');
        $this->form_validation->set_rules('jenis_kriteria', 'Jenis kriteria', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kriteria/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_kriteria = $this->input->post('nama_kriteria');
            $jenis_kriteria = $this->input->post('jenis_kriteria');

            $data = [
                'nama_kriteria' => $nama_kriteria,
                'jenis_kriteria' => $jenis_kriteria,
                'bobot' => 0
            ];
            $this->db->insert('kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Tambah Data Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
            redirect('kriteria');
        }
    }
    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $data['title'] = 'Halaman Ubah kriteria';
        $data['val'] = $this->db->query("SELECT * FROM  kriteria WHERE id_kriteria = '$id'")->row_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama kriteria', 'required');
        $this->form_validation->set_rules('jenis_kriteria', 'Jenis kriteria', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kriteria/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_kriteria = $this->input->post('nama_kriteria');

            $jenis_kriteria = $this->input->post('jenis_kriteria');

            $data = [
                'nama_kriteria' => $nama_kriteria,
                'jenis_kriteria' => $jenis_kriteria
            ];
            $this->db->where('id_kriteria', $id);
            $this->db->update('kriteria', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Ubah Data Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
            redirect('kriteria');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data kriteria berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect('kriteria');
    }
    public function get($id)
    {
        $data = $this->db->get_where('kriteria', ['id_kriteria' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
