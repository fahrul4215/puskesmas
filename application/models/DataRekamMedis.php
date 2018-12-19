<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRekamMedis extends CI_Model {

	public function getRekamMedis()
	{
		return $this->db->get('rekam_medis')->result();
	}

	public function getRekamMedisByIdPasien($id_pasien)
	{
		$this->db->select('id_rekam_medis');
		$this->db->where('id_pasien', $id_pasien);
		$this->db->where('resep', '');
		return $this->db->get('rekam_medis')->result();
	}

	public function createRekamMedis($data)
	{
		$this->db->insert('rekam_medis', $data);
	}

	public function tambahResepRekamMedis($id_rekam_medis, $namaFile)
	{
		$data = array(
			'resep' => $namaFile
		);

		$this->db->where('id_rekam_medis', $id_rekam_medis);
		$this->db->update('rekam_medis', $data);
	}

}

/* End of file dataRekamMedis.php */
/* Location: ./application/models/dataRekamMedis.php */