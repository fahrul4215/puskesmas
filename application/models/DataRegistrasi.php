<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRegistrasi extends CI_Model {

	public function getRegistrasi($sort='', $tgl='')
	{
		if ($sort!='') {
			$this->db->order_by('id_registrasi', 'desc');
		}
		if ($tgl!='') {
			$this->db->where('tanggal', $tgl);
		}
		return $this->db->get('registrasi')->result();
	}

	public function tambahRegistrasi()
	{
		if (!is_null($registrasi = $this->db->select_max('id_registrasi')->get('registrasi')->result())) {
			$id_registrasi = $registrasi[0]->id_registrasi + 1;
		} else {
			$id_registrasi = 1;
		}

		$data = array(
			'id_registrasi'	=> $id_registrasi,
			'id_pasien'		=> $this->input->post('id_pasien'),
			'id_poli'		=> $this->input->post('id_poli'),
			'id_petugas'	=> $this->input->post('id_petugas'),
			'tanggal'		=> date('Y-m-d'),
			'no_antrian'	=> $this->input->post('no_antrian'),
		);
		$this->db->insert('registrasi', $data);
	}

}

/* End of file dataRegistrasi.php */
/* Location: ./application/models/dataRegistrasi.php */