<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_bayar extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model', 'sm');
    }

    public function index()
    {
        $bulan = $this->uri->segment(4);
        $m     = $this->input->post('bulan');

        $data = array(
            'bulan'     => $m,
            'laporan'   => $this->sm->get_data_pembayaran_by_bulan($bulan)
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/laporan_bayar', $data);
        $this->load->view('templates/footer');
    }

    public function print_invoice()
    {
        $bulan = $this->uri->segment(4);

        ob_start();
        $data = array(
            'laporan'   => $this->sm->get_data_pembayaran_by_bulan($bulan)
        );
        $this->load->view('pembayaran/print/pdf_laporan_pembayaran', $data);
        $html = ob_get_contents();
        ob_end_clean();

        $this->load->library('pdf');
        $this->load->view('pembayaran/print/format_pdf', array("html" => $html, "filename" => "Invoice-" . $bulan));
    }
}
