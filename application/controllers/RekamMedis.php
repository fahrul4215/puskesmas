<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RekamMedis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataRekamMedis');
		if (!$this->session->userdata('masuk')) {
			$this->session->set_flashdata('gagal', 'Anda Belum Login, Silahkan Login terlebih dahulu');
			redirect('login');
		}
	}

	public function index()
	{
		$data['RekamMedis'] = $this->DataRekamMedis->getRekamMedis();
		$this->load->view('RekamMedis/viewRekamMedis', $data);
	}

	public function create()
	{
		if ($this->input->post("submit")) {
			$this->DataRekamMedis->createRekamMedis();			
		} else {
			$this->load->view('RekamMedis/createRekamMedis');
		}
	}

}

/* End of file rekamMedis.php */
/* Location: ./application/controllers/rekamMedis.php */