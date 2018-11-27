<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function index()
	{
		$this->load->view('Dokter/viewDiagnosaDokter');
	}

	public function uploadGambar()
	{
		if (!is_null($diagnosa = $this->db->select_max('diagnosa')->get('rekam_medis')->result())) {
			$id_diagnosa = $diagnosa[0]->id_diagnosa + 1;
		} else {
			$id_diagnosa = 1;
		}

		$upload_dir = "./assets/gambar/diagnosa/";
		$img = $_POST['hidden_data'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		// $file = $upload_dir . "Diagnosa-".$id_diagnosa.".png";
		$file = $upload_dir.$id_diagnosa.".png";
		$success = file_put_contents($file, $data);
		print $success ? $file : 'Unable to save the file.';
	}

	public function Diagnosa()
	{
		// var_dump($this->session->userdata('masuk'));
		// if () {
			
		// }
		$this->load->view('Dokter/viewDiagnosaDokter');
	}

}

/* End of file dokter.php */
/* Location: ./application/controllers/dokter.php */