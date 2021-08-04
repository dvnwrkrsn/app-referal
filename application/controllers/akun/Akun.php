<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');
    }

    public function index()
    {
        $data = array(
            'data_akun'     => $this->sm->get_data_akun()
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('akun/akun', $data);
        $this->load->view('templates/footer');
    }

    public function save_data_akun()
    {
        $data = array(
            'kode_akun'     => $this->input->post('kode_akun'),
            'nama_akun'     => $this->input->post('nama_akun'),
            'saldo_normal'  => $this->input->post('saldo_normal'),
            'jenis_akun'    => $this->input->post('jenis_akun'),
        );

        $this->db->insert('t_akun', $data);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('akun/akun');
    }

    public function save_edit_akun()
    {
        $id_akun = $this->input->post('id_akun');

        $update_data = array(
            'kode_akun'      => $this->input->post('kode_akun'),
            'nama_akun'      => $this->input->post('nama_akun'),
            'saldo_normal'   => $this->input->post('saldo_normal'),
            'jenis_akun'     => $this->input->post('jenis_akun'),
        );

        $where = array(
            'id_akun'      => $id_akun
        );

        $this->sm->edit($where, $update_data, 't_akun');
        $this->session->set_flashdata('update', 'Data berhasil diubah!');
        redirect('akun/akun');
    }

    public function delete_data_akun()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_akun($params);
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
