<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataLogin');
	}

	public function index()
	{
		$this->load->view('login/halamanLogin');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */