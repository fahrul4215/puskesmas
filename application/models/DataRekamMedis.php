<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRekamMedis extends CI_Model {

	public function getRekamMedis()
	{
		return $this->db->get('rekam_medis')->result();
	}

	public function createRekamMedis()
	{
		if (!is_null($rekam_medis = $this->db->select_max('id_rekam_medis')->get('rekam_medis')->result())) {
			$id_rekam_medis = $rekam_medis[0]->id_rekam_medis + 1;
		} else {
			$id_pasien = 1;
		}
		$data = array(
			'id_rekam_medis'=> $id_rekam_medis,
			'id_pasien'		=> $this->input->post('id_pasien'),
			'id_dokter'		=> $this->input->post('id_dokter'),
			'id_resep' 		=> $this->input->post('id_resep'),
			'diagnosa'		=> $this->input->post('diagnosa'),
			'tanggal'		=> date('Y-m-d')
		);
		// echo var_dump($data);
		$this->db->insert('rekam_medis', $data);
		redirect('RekamMedis');
	}

}

/* End of file dataRekamMedis.php */
/* Location: ./application/models/dataRekamMedis.php */