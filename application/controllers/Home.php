<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('id_user') == '') {
			redirect('login/auth');
		}
	}

	public function index()
	{
		$this->load->view('login/login_page');
	}
}
