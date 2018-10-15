<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataPetugas');
		if ($this->uri->segment(2)) {
			return;
		}
		if ($this->session->userdata('masuk')) {
			$this->session->set_flashdata('dahLogin', 'Anda Sudah Login, klik logout untuk keluar');
			redirect('home');
		}
	}

	public function index()
	{
		if ($this->input->post('login')) {
			$petugas = $this->DataPetugas->getPetugas();
			foreach ($petugas as $p) {
				if ($this->input->post('username')==$p->username &&
					md5($this->input->post('password'))==$p->password) {
					$this->session->set_flashdata('dahLogin',
						'Anda Berhasil Login dengan username '.$p->username);
					$array = array(
						'id_petugas' => $p->id_petugas
					);					
					$this->session->set_userdata('masuk', $array);
					redirect('Home');
				}
			}
			$this->session->set_flashdata('gagal', 'Username atau Password Salah');
		}
		$this->load->view('Login/halamanLogin');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('masuk');
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */