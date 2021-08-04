<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_umum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');
    }

    public function index()
    {
        $data = array(
            'akun'          => $this->sm->get_data_akun(),
            'jurnal'        => $this->sm->get_jurnal(),
            'kas'           => $this->sm->get_data_kas()->row_array(),
            'pendapatan'    => $this->sm->get_data_pendapatan()->row_array()
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('jurnal/jurnal_umum', $data);
        $this->load->view('templates/footer');
    }

    public function get_last_no_referensi()
    {
        $tahun = date("y");
        $bulan = date("m");
        $spp_last_id = $this->sm->get_last_no_referensi($bulan, date("Y"));

        if ($spp_last_id->num_rows()) {
            $row_last_id   = $spp_last_id->row_array();
            $last_id       = substr($row_last_id['no_referensi'], 4) + 1;
            $id_registrasi = $tahun . $bulan . sprintf("%05d", $last_id);
        } else {
            $id_registrasi = $tahun . $bulan . sprintf("%05d", 1);
        }

        return $id_registrasi;
    }

    public function save_jurnal()
    {
        $no_pembayaran = $this->get_last_no_referensi();
        $debit = $this->input->post('debit');
        $kredit = $this->input->post('kredit');
        $akun = $this->input->post('akun');

        if ($akun == 'A-1110') {
            $data_kas = array(
                'no_referensi'  => $no_pembayaran,
                'bulan'         => $this->input->post('bulan'),
                'kode_akun'     => $this->input->post('akun'),
                'debet'         => str_replace(".", "", $kredit),
                'kredit'        => str_replace(".", "", $debit),
                'tanggal'       => date('Y-m-d')
            );

            $data_pendapatan = array(
                'no_referensi'  => $no_pembayaran,
                'bulan'         => $this->input->post('bulan'),
                'kode_akun'     => 'B-1200',
                'debet'         => str_replace(".", "", $debit),
                'kredit'        => str_replace(".", "", $kredit),
                'tanggal'       => date('Y-m-d')
            );
        } else if ($akun == 'B-1200') {
            $data_kas = array(
                'no_referensi'  => $no_pembayaran,
                'bulan'         => $this->input->post('bulan'),
                'kode_akun'     => 'A-1110',
                'debet'         => str_replace(".", "", $debit),
                'kredit'        => str_replace(".", "", $kredit),
                'tanggal'       => date('Y-m-d')
            );

            $data_pendapatan = array(
                'no_referensi'  => $no_pembayaran,
                'bulan'         => $this->input->post('bulan'),
                'kode_akun'     => $this->input->post('akun'),
                'debet'         => str_replace(".", "", $kredit),
                'kredit'        => str_replace(".", "", $debit),
                'tanggal'       => date('Y-m-d')
            );
        }


        $this->db->insert('t_detail_jurnal', $data_kas);
        $this->db->insert('t_detail_jurnal', $data_pendapatan);
        $this->session->set_flashdata('add', 'Data berhasil ditambah!');
        redirect('jurnal/jurnal_umum');
    }

    public function delete_data_jurnal()
    {
        $this->output->enable_profiler(false);

        $params['id'] = $this->input->post('id', true);
        $spp_delete = $this->sm->delete_data_jurnal($params);
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
