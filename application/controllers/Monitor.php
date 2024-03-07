<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitor extends CI_Controller
{


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['title'] = 'Halaman Monitor';
        $data['monitor'] = $this->db->get('monitor')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('monitor/index', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Halaman Tambah monitor';
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('nama_monitor', 'Nama monitor', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('monitor/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_monitor = $this->input->post('nama_monitor');

            $data = [
                'nama_monitor' => $nama_monitor,
            ];
            $this->db->insert('monitor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Tambah Data Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
            redirect('monitor');
        }
    }
    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $data['title'] = 'Halaman Ubah monitor';
        $data['val'] = $this->db->query("SELECT * FROM  monitor WHERE id_monitor = '$id'")->row_array();

        $this->form_validation->set_rules('nama_monitor', 'Nama monitor', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('monitor/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_monitor = $this->input->post('nama_monitor');

            $data = [
                'nama_monitor' => $nama_monitor,

            ];
            $this->db->where('id_monitor', $id);
            $this->db->update('monitor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Ubah Data Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
            redirect('monitor');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_monitor', $id);
        $this->db->delete('monitor');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data monitor berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
        redirect('monitor');
    }
    public function get($id)
    {
        $data = $this->db->get_where('monitor', ['id_monitor' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
