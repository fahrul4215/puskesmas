<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRekamMedis extends CI_Model {

	public function getRekamMedis($order="")
	{
		if ($order=="") {
			$order = 'asc';
			$this->db->order_by('id_rekam_medis', $order);
		} else {
			$this->db->order_by('id_rekam_medis', $order);
		}
		return $this->db->get('rekam_medis')->result();
	}

	public function createRekamMedis()
	{
		if (!empty($rekamMedis = $this->getRekamMedis('desc'))) {
			$id_rekam_medis = $rekamMedis[0]->id_rekam_medis + 1;
		} else {
			$id_rekam_medis = 1;
		}
		$data = array(
			'id_rekam_medis'=> $id_rekam_medis,
			'id_pasien'		=> $this->input->post('id_pasien'),
			'id_dokter'		=> $this->input->post('id_dokter'),
			'id_resep' 		=> $this->input->post('id_resep'),
			'diagnosa'		=> $this->input->post('diagnosa'),
			'tanggal'		=> date('Y-m-d')
		);
		echo var_dump($data);
		$this->db->insert('rekam_medis', $data);
		redirect($this->uri->segment(2));
	}

}

/* End of file dataRekamMedis.php */
/* Location: ./application/models/dataRekamMedis.php */