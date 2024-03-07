<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
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
        $data['data'] = $this->mod_alternatif->get_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('alternatif/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $d['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();
        $krit = $this->db->get('kriteria')->result();
        foreach ($krit as $kr) {
            $this->form_validation->set_rules('kriteria[' . $kr->id_kriteria . ']', 'Nilai Kriteria', 'required');
        }

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');
        if ($this->form_validation->run() == FALSE) {
            $d2 = $this->m_db->get_data('alternatif');
            if (!empty($d2)) {
                $listMonitor = "";
                foreach ($d2 as $r) {
                    $listMonitor .= $r->id_monitor . ",";
                }
                $listMonitor = substr($listMonitor, 0, -1);

                $sql = "Select * from monitor Where id_monitor NOT IN ($listMonitor)";
                $d['monitor'] = $this->m_db->get_query_data($sql);
                $d['kriteria'] = $this->mod_kriteria->kriteria_data();

                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $d);
                $this->load->view('alternatif/tambah', $d);
                $this->load->view('templates/footer');
            } else {

                $d['monitor'] = $this->db->get('monitor')->result();
                $d['kriteria'] = $this->mod_kriteria->kriteria_data();

                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $d);
                $this->load->view('alternatif/tambah', $d);
                $this->load->view('templates/footer');
            }
        } else {
            $id_monitor = $this->input->post('id_monitor');
            $kriteria = $this->input->post('kriteria');
            $this->mod_alternatif->alternatif_add($id_monitor, $kriteria);
        }
    }
    public function ubah($id)
    {
        $d['user'] = $this->db->get_where('user', ['id_user' =>
        $this->session->userdata('id_user')])->row_array();

        $ts = $this->db->query("SELECT * FROM alternatif JOIN monitor ON monitor.id_monitor=alternatif.id_monitor WHERE alternatif.id_alternatif ='$id'")->row();

        $d['tes'] = $ts;
        // $tess = $this->db->get_where('alternatif_nilai', ['id_alternatif' => $id])->result();
        // var_dump($tess);
        // die;
        $d['alt_nilai'] = $this->db->get_where('alternatif_nilai', ['id_alternatif' => $id])->result();
        $d['kriteria'] = $this->mod_kriteria->kriteria_data();
        $krit = $this->db->get('kriteria')->result();

        $d['idd'] = $id;



        foreach ($krit as $kr) {
            $this->form_validation->set_rules('kriteria[' . $kr->id_kriteria . ']', 'Nilai Kriteria', 'required');
        }

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $d);
            $this->load->view('alternatif/ubah', $d);
            $this->load->view('templates/footer');
        } else {

            $kriteria = $this->input->post('kriteria');
            $i = 0;

            foreach ($kriteria as $rK => $rV) {
                $i++;
                $tes = $this->input->post('id_alt_nilai' . $i);
                $d2 = array(
                    'id_alternatif' => $id,
                    'id_kriteria' => $rK,
                    'id_subkriteria' => $rV,


                );
                $sql = $this->db->query("SELECT * FROM alternatif_nilai WHERE id_kriteria = '$rK'")->num_rows();
                if ($sql > 0) {
                    $this->db->where('id_alternatif_nilai', $tes);
                    $this->db->update('alternatif_nilai', $d2);
                } else {
                    $this->db->insert('alternatif_nilai', $d2);
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Ubah Data Berhasil!
                <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </a>
            </div>');
            redirect(base_url('Alternatif'), 'refresh');
        }
    }
    function hapus()
    {
        $id = $this->input->post('hapus');
        if ($this->mod_alternatif->alternatif_delete($id) == TRUE) {
            $s = array(
                'id_alternatif' => $id,
            );
            $this->m_db->delete_row('alternatif_nilai', $s);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Hapus data berhasil!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('alternatif');
        } else {
            redirect('alternatif');
        }
    }
    public function get($id)
    {
        $data = $this->db->get_where('alternatif', ['id_alternatif' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
