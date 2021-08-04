<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');

        $this->load->helper(array(
            'pembulatan_rupiah',
            'spp_helper'
        ));
    }

    public function index()
    {
        $id_siswa   = $this->uri->segment(4);

        $data['pembayaran'] = $this->sm->data_pembayaran($id_siswa)->row_array();
        $data['detail']     = $this->sm->get_data_pembayaran($id_siswa);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pembayaran/pembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function get_last_no_transaksi()
    {
        $tahun = date("y");
        $bulan = date("m");
        $rs_last_id = $this->sm->get_last_no_pembayaran($bulan, date("Y"));

        if ($rs_last_id->num_rows()) {
            $row_last_id   = $rs_last_id->row_array();
            $last_id       = substr($row_last_id['no_pembayaran'], 4) + 1;
            $id_registrasi = $tahun . $bulan . sprintf("%05d", $last_id);
        } else {
            $id_registrasi = $tahun . $bulan . sprintf("%05d", 1);
        }

        return $id_registrasi;
    }

    public function save_pembayaran()
    {
        $no_pembayaran = $this->get_last_no_transaksi();
        $id_siswa   = $this->input->post('id_siswa');

        $data = array(
            'no_pembayaran'     => $no_pembayaran,
            'nis'               => $this->input->post('nis'),
            'bulan'             => $this->input->post('bulan'),
            'id_siswa'          => $this->input->post('id_siswa'),
            'tgl_bayar'         => date('Y-m-d'),
            'jumlah'            => str_replace(".", "", $this->input->get_post('jumlah'))
        );

        $this->db->insert('t_pembayaran', $data);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('pembayaran/pembayaran/index/' . $id_siswa);
    }

    public function delete_data_pembayaran()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_transaksi($params);
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

    public function print_invoice()
    {
        $id = $this->uri->segment(4);

        ob_start();
        $data = array(
            'kwitansi'      => $this->sm->get_data_pembayaran_by_no($id)->row_array()
        );
        $this->load->view('pembayaran/print/invoice', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $this->load->library('pdf');
        $this->load->view('pembayaran/print/format_pdf', array("html" => $html, "filename" => "Invoice-" . $id));
    }

    public function print_all_payment()
    {
        $nis = $this->uri->segment(4);

        ob_start();
        $data = array(
            'kwitansi'      => $this->sm->get_all_data_pembayaran_by_no($nis)
        );
        $this->load->view('pembayaran/print/all_payment', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $this->load->library('pdf');
        $this->load->view('pembayaran/print/format_pdf', array("html" => $html, "filename" => "Invoice-" . $nis));
    }
}
