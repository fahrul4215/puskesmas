<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataPasien');
		$this->load->model('DataJenisKartu');
	}

	public function index()
	{
		
	}

	public function pasien()
	{
		// var_dump($this->db->select_max('id_dokter')->get('dokter')->result());
		if ($this->input->post('submit')) {
			$this->DataPasien->tambahPasien();
			redirect('home');
		}
		$data['jenisKartu'] = $this->DataJenisKartu->getJenisKartu();
		$this->load->view('Registrasi/viewRegistrasiPasien', $data);
	}

	public function berobat()
	{
		
		$data['pasien'] = $this->DataPasien->getPasien();
		$this->load->view('Registrasi/viewRegistrasiBerobat', $data);
	}

}

/* End of file registrasi.php */
/* Location: ./application/controllers/registrasi.php */