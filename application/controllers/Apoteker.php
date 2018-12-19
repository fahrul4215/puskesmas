<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DataRekamMedis');
		$this->load->model('DataRegistrasi');
		$this->load->model('Obat_model');
		// if (!$this->session->userdata('masuk')) {
		// 	$this->session->set_flashdata('gagal', 'Anda Belum Login, Silahkan Login terlebih dahulu');
		// 	redirect('login');
		// }
	}

	public function index()
	{
		$data['registrasi'] = $this->DataRegistrasi->getRegistrasiForApoteker();
		// var_dump($data['registrasi']);
		// die;
		$this->load->view('Apoteker/viewApoteker', $data);
	}

	public function tambah()
	{
		$id_rekam_medis = $this->uri->segment(3);
		if (isset($_POST['submit'])) {
			$id_obat = $this->input->post('id_obat');
			$jumlah_input = $this->input->post('jumlah');

			if (!is_null($detail_resep = $this->db->select_max('id_detail_resep')->get('detail_resep')->result())) {
				$id_detail_resep = $detail_resep[0]->id_detail_resep + 1;
			} else {
				$id_detail_resep = 1;
			}
			
			$dataDetailResep = array(
    			'id_detail_resep'	=> $id_detail_resep,
    			'id_rekam_medis'	=> $id_rekam_medis,
    			'id_obat'			=> $id_obat,
    			'jumlah'			=> $jumlah_input
    		);

    		// var_dump($data);

			$obat = $this->Obat_model->getObat($id_obat);
			var_dump($obat[0]->jumlah);
			echo '<br><br>';

			if ((int)$obat[0]->jumlah < (int)$jumlah_input) {
				$this->session->set_flashdata('hasil', 'Jumlah masukkan obat melebihi stok yang tersedia');
				redirect('Apoteker/tambah/'.$id_rekam_medis);
			}

			$stok_baru = (int)$obat[0]->jumlah - (int)$jumlah_input;
			// echo $stok_baru;

			$dataObat = array(
				'jumlah' => $stok_baru
			);

			$this->db->where('id_obat', $id_obat);
			$updateStok = $this->db->update('obat', $dataObat);

    		$insertDetailResep = $this->db->insert('detail_resep', $dataDetailResep);

    		if ($updateStok && $insertDetailResep) {
    			$this->session->set_flashdata('hasil', 'Obat Berhasil Ditambahkan ke Pasien');
    			redirect('Apoteker');
    		} else {
    			$this->session->set_flashdata('hasil', 'Obat Gagal Ditambahkan ke Pasien');
    		}
		}
		$data['obat'] = $this->Obat_model->getDataObatSemua();
		$this->load->view('Apoteker/viewTambah', $data);
	}

	public function selesai()
	{
		$id_registrasi = $this->uri->segment(3);
		$updateStatusAntrian = $this->DataRegistrasi->updateStatusAntrian($id_registrasi);
		// var_dump($updateStatusAntrian);
		// die();
		if ($updateStatusAntrian) {
			$this->session->set_flashdata('hasil', 'Antrian Sudah Selesai');
		} else {
			$this->session->set_flashdata('hasil', 'Gagal Mengakhiri Antrian');
		}
		redirect('Apoteker');
	}

}

/* End of file rekamMedis.php */
/* Location: ./application/controllers/rekamMedis.php */