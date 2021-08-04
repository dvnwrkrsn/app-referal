<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_pembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');

        $this->load->helper(array(
            'pembulatan_rupiah'
        ));
    }

    public function index()
    {
        $data = array(
            'kelas'         => $this->sm->data_kelas(),
            'jenis_bayar'   => $this->sm->data_jenis_pembayaran()
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('jenis_pembayaran/jenis_pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function save_jenis_pembayaran()
    {
        $data = array(
            'id_kelas'  => $this->input->post('kelas'),
            'jumlah'    => str_replace(".", "", $this->input->get_post('jumlah'))
        );

        $this->db->insert('t_jenis_bayar', $data);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('jenis_pembayaran/jenis_pembayaran');
    }

    public function save_edit_bayar()
    {
        $id_jenis = $this->input->post('id_jenis');

        $update_data = array(
            'id_kelas'     => $this->input->post('kelas'),
            'jumlah'       => str_replace(".", "", $this->input->get_post('jumlah'))
        );

        $where = array(
            'id_jenis'  => $id_jenis
        );

        $this->sm->edit($where, $update_data, 't_jenis_bayar');
        $this->session->set_flashdata('update', 'Data berhasil diubah!');
        redirect('jenis_pembayaran/jenis_pembayaran');
    }

    public function delete_data_kelas()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_pembayaran($params);
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
