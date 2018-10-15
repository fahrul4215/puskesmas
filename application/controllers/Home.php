<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('Home/index');
		if (!$this->session->userdata('masuk')) {
			$this->session->set_flashdata('gagal', 'Anda Belum Login, Silahkan Login terlebih dahulu');
			redirect('login');
		}
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */