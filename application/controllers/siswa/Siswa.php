<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');
    }

    public function index()
    {
        $data = array(
            'data_siswa'    => $this->sm->data_siswa(),
            'kelas'         => $this->sm->data_kelas()
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('siswa/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function save_data_siswa()
    {
        $data = array(
            'nis'               => $this->input->post('nis'),
            'nama_siswa'        => $this->input->post('nama_siswa'),
            'id_kelas'          => $this->input->post('kelas'),
            'jenis_kelamin'     => $this->input->post('jk'),
            'alamat'            => $this->input->post('alamat')
        );

        $this->db->insert('t_siswa', $data);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('siswa/siswa');
    }

    public function save_edit_siswa()
    {
        $id_kelas = $this->input->post('id');

        $update_data = array(
            'nis'               => $this->input->post('nis'),
            'nama_siswa'        => $this->input->post('nama_siswa'),
            'id_kelas'          => $this->input->post('kelas'),
            'jenis_kelamin'     => $this->input->post('jk'),
            'alamat'            => $this->input->post('alamat')
        );

        $where = array(
            'id_siswa'      => $id_kelas
        );

        $this->sm->edit($where, $update_data, 't_siswa');
        $this->session->set_flashdata('update', 'Data berhasil diubah!');
        redirect('siswa/siswa');
    }

    public function delete_data_siswa()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_siswa($params);
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
