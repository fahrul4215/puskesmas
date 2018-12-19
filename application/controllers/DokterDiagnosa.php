<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DokterDiagnosa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataRegistrasi');
		$this->load->model('DataRekamMedis');
	}

	public function index()
	{
		$data['registrasi'] = $this->DataRegistrasi->getRegistrasi('', date('Y-m-d'),false,true);
		// var_dump($data['registrasi']);
		// die();
		$this->load->view('Dokter/viewDiagnosaHome', $data);
	}

	public function simpanGambar()
	{
		// if (!is_null($diagnosa = $this->db->select_max('diagnosa')->get('rekam_medis')->result())) {
			// $id_diagnosa = $diagnosa[0]->diagnosa + 1;
		// } else {
			// $id_diagnosa = 1;
		// }
		// $diagnosa = $this->db->select_max('diagnosa')->get('rekam_medis')->result();
		// $id_diagnosa = substr($diagnosa[0]->diagnosa, 2, 1);

		// var_dump($diagnosa);

		// var_dump($id_diagnosa);

		// var_dump($this->session->userdata('masuk'));
		// echo '<br>';
		// die();


		if (count($_POST) && (strpos($_POST['img'], 'data:image/png;base64') === 0)) {
			$registrasi = $this->DataRegistrasi->getRegistrasiById($this->uri->segment(3));

			if (!is_null($diagnosa = $this->db->select_max('diagnosa')->get('rekam_medis')->result())) {
				$id_diagnosa = (int)$diagnosa[0]->diagnosa + 1;
			} else {
				$id_diagnosa = 1;
			}

			$dir = './assets/gambar/diagnosa/';
			$namaFile = $registrasi[0]->id_pasien.'-'.$id_diagnosa.'.png';

			$img = $_POST['img'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = $dir.$namaFile;

			if (!is_null($rekam_medis = $this->db->select_max('id_rekam_medis')->get('rekam_medis')->result())) {
				$id_rekam_medis = $rekam_medis[0]->id_rekam_medis + 1;
			} else {
				$id_pasien = 1;
			}

			$dataTambah = array(
				'id_rekam_medis'=> $id_rekam_medis,
				'id_pasien'		=> $registrasi[0]->id_pasien,
				'id_dokter'		=> $this->session->userdata('masuk')['id_dokter'],
				'diagnosa'		=> $namaFile,
				'tanggal'		=> date('Y-m-d')
			);

			// var_dump($data);
			// die();

			if (file_put_contents($file, $data)) {
				$this->DataRekamMedis->createRekamMedis($dataTambah);
				$this->DataRegistrasi->updateStatusDiagnosa($this->uri->segment(3));
				$this->session->set_flashdata('hasil', 'Diagnosa Berhasil Ditambahkan');
			} else {
				$this->session->set_flashdata('hasil', 'Diagnosa Gagal Ditambahkan');
			}
			redirect('DokterDiagnosa');
		}
	}

	public function Diagnosa()
	{
		// var_dump($this->session->userdata('masuk'));
		// if () {

		// }
		$this->load->view('Dokter/viewDiagnosaDokter');
	}

	public function Resep()
	{
		// var_dump($this->session->userdata('masuk'));
		// if () {

		// }
		$this->load->view('Dokter/viewResepDokter');
	}

	public function simpanResep()
	{
		// $registrasi = $this->DataRegistrasi->getRegistrasiById($this->uri->segment(3));
		// $rekam_medis = $this->DataRekamMedis->getRekamMedisByIdPasien($this->uri->segment(3));
			
		// var_dump($rekam_medis[0]->id_rekam_medis);

		// var_dump($this->session->userdata('masuk'));
		// echo '<br>';
		// die();


		if (count($_POST) && (strpos($_POST['img'], 'data:image/png;base64') === 0)) {
			$registrasi = $this->DataRegistrasi->getRegistrasiById($this->uri->segment(3));
			$rekam_medis = $this->DataRekamMedis->getRekamMedisByIdPasien($registrasi[0]->id_pasien);

			// var_dump($rekam_medis);
			// die();

			if (!is_null($resep = $this->db->select_max('resep')->get('rekam_medis')->result())) {
				$id_resep = (int)$resep[0]->resep + 1;
			} else {
				$id_resep = 1;
			}

			$dir = './assets/gambar/resep/';
			$namaFile = $registrasi[0]->id_pasien.'-'.$id_resep.'.png';

			$img = $_POST['img'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = $dir.$namaFile;

			if (file_put_contents($file, $data)) {
				$this->DataRekamMedis->tambahResepRekamMedis($rekam_medis[0]->id_rekam_medis, $namaFile);
				$this->DataRegistrasi->updateStatusResep($this->uri->segment(3));
				$this->session->set_flashdata('hasil', 'Diagnosa Berhasil Ditambahkan');
			} else {
				$this->session->set_flashdata('hasil', 'Diagnosa Gagal Ditambahkan');
			}
			redirect('DokterDiagnosa');
		}
	}

}

/* End of file dokter.php */
/* Location: ./application/controllers/dokter.php */