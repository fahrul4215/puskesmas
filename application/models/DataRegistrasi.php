<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataRegistrasi extends CI_Model {

	public function getRegistrasi($sort='', $tgl='',$view=false,$joinPasien=false)
	{
		if ($sort!='') {
			$this->db->order_by('id_registrasi', 'desc');
		}
		if ($tgl!='') {
			$this->db->where('tanggal', $tgl);
		}
		if ($joinPasien) {
			$this->db->join('pasien p', 'registrasi.id_pasien = p.id_pasien', 'inner');
		}
		if ($view) {
			$this->db->select(
				'registrasi.id_registrasi, registrasi.tanggal, registrasi.no_antrian, pas.nama as nama_pasien, pol.nama as nama_poli, registrasi.status_antrian'
			);
			$this->db->join('pasien pas', 'registrasi.id_pasien = pas.id_pasien', 'left');
			$this->db->join('poli pol', 'registrasi.id_poli = pol.id_poli', 'left');
			// $this->db->join('petugas pet', 'registrasi.id_petugas = pet.id_petugas', 'left');
		}
		return $this->db->get('registrasi')->result();
	}

	public function getRegistrasiById($id_registrasi)
	{
		$this->db->where('id_registrasi', $id_registrasi);
		return $this->db->get('registrasi')->result();
	}

	public function getRegistrasiForApoteker()
	{
		$this->db->select('reg.id_registrasi, rm.id_rekam_medis, rm.resep, reg.no_antrian, pas.nama');
		$this->db->join('pasien pas', 'reg.id_pasien = pas.id_pasien', 'inner');
		$this->db->join('rekam_medis rm', 'pas.id_pasien = rm.id_pasien', 'inner');
		$this->db->where('reg.tanggal', date('Y-m-d'));
		$this->db->where('rm.tanggal', date('Y-m-d'));
		$this->db->where('reg.status_antrian', 'belum');
		return $this->db->get('registrasi reg')->result();
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
			'id_petugas'	=> $this->session->userdata('masuk')['id_petugas'],
			'tanggal'		=> date('Y-m-d'),
			'no_antrian'	=> $this->input->post('no_antrian')
		);
		$this->db->insert('registrasi', $data);
	}

	public function updateStatusDiagnosa($id_registrasi)
	{
		$data = array(
			'status_diagnosa' => 'sudah'
		);
		$this->db->where('id_registrasi', $id_registrasi);
		$this->db->update('registrasi', $data);
	}

	public function updateStatusResep($id_registrasi)
	{
		$data = array(
			'status_resep' => 'sudah'
		);
		$this->db->where('id_registrasi', $id_registrasi);
		$this->db->update('registrasi', $data);
	}

	public function updateStatusAntrian($id_registrasi)
	{
		$data = array(
			'status_antrian' => 'sudah'
		);
		$this->db->where('id_registrasi', $id_registrasi);
		$updateStatusAntrian = $this->db->update('registrasi', $data);
		return $updateStatusAntrian;
	}

}

/* End of file dataRegistrasi.php */
/* Location: ./application/models/dataRegistrasi.php */