<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');
    }

    public function index()
    {
        $data = array(
            'data_kelas'    => $this->sm->data_kelas()
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kelas/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function save_data_kelas()
    {
        $data = array(
            'nama_kelas'    => $this->input->post('kelas'),
            'tahun_ajaran'  => $this->input->post('tahun_ajar')
        );

        $this->db->insert('t_kelas', $data);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('kelas/kelas');
    }

    public function save_edit_kelas()
    {
        $id_kelas = $this->input->post('id_kelas');

        $update_data = array(
            'nama_kelas'     => $this->input->post('kelas'),
            'tahun_ajaran'   => $this->input->post('tahun_ajar')
        );

        $where = array(
            'id_kelas'  => $id_kelas
        );

        $this->sm->edit($where, $update_data, 't_kelas');
        $this->session->set_flashdata('update', 'Data berhasil diubah!');
        redirect('kelas/kelas');
    }

    public function delete_data_kelas()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_kelas($params);
        $response  = new stdClass();
        $response->metaData = new stdClass();
        if ($spp_delete) {
            $response->metaData->code = 200;
            $response->metaData->message = "Data Berhasil dihapus.";
        } else {
            $response->metaData->code = 505;
            $response->metaData->message = "Data Gagal dihapus!";
        }
        echo json_encode($response);
    }
}
