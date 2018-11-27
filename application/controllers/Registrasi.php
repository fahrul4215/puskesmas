<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataPasien');
		$this->load->model('DataPetugas');
		$this->load->model('DataPoli');
		$this->load->model('DataJenisKartu');
		$this->load->model('DataRegistrasi');
	}

	public function index()
	{
		
	}

	public function pasien()
	{
		// var_dump($this->db->select_max('id_dokter')->get('dokter')->result());
		if ($this->input->post('submit')) {
			$this->DataPasien->tambahPasien();
			// redirect('home');
		}
		$data['jenisKartu'] = $this->DataJenisKartu->getJenisKartu();
		$this->load->view('Registrasi/viewRegistrasiPasien', $data);
	}

	public function berobat()
	{
		if ($this->input->post('submit')) {
			$this->DataRegistrasi->tambahRegistrasi();
			// redirect('home');
		}
		$data['pasien'] = $this->DataPasien->getPasienBerobat();
		$data['poli'] = $this->DataPoli->getPoli();
		$data['petugas'] = $this->DataPetugas->getPetugas();
		$tgl = date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))));
		// echo $tgl;
		$lastRegistrasi = $this->DataRegistrasi->getRegistrasi('DESC', date('Y-m-d', strtotime('-6 days', strtotime(date('Y-m-d')))));
		// var_dump($lastRegistrasi);
		if (!is_null($lastRegistrasi)) {
			$lastRegToday = $this->DataRegistrasi->getRegistrasi('DESC', date('Y-m-d'));
			$data['no_antrian'] = @$lastRegToday[0]->no_antrian + 1;
		} else {
			$data['no_antrian'] = 1;
		}

		$this->load->view('Registrasi/viewRegistrasiBerobat', $data);
	}

}

/* End of file registrasi.php */
/* Location: ./application/controllers/registrasi.php */