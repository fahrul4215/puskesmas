<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPasien extends CI_Model {

	public function getPasien($id='')
	{
		if ($id!='') {
			$this->db->where('id_pasien', $id);
		}

		return $this->db->get('pasien')->result();
	}

	public function getPasienBerobat()
	{
		$query = $this->db->query("SELECT * FROM pasien p WHERE p.id_pasien NOT IN (SELECT r.id_pasien FROM registrasi r WHERE tanggal = '".date('Y-m-d')."')");
		return $query->result();
	}

	public function tambahPasien()
	{
		if (!is_null($pasien = $this->db->select_max('id_pasien')->get('pasien')->result())) {
			$id_pasien = $pasien[0]->id_pasien + 1;
		} else {
			$id_pasien = 1;
		}
		$data = array(
			'id_pasien'		=> $id_pasien,
			'nama'			=> $this->input->post('nama'),
			'alamat'		=> $this->input->post('alamat'),
			'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
			'pekerjaan'		=> $this->input->post('pekerjaan'),
			'tgl_lahir'		=> date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
			'id_jenis_kartu'=> $this->input->post('id_jenis_kartu')
		);
		// echo var_dump($data);
		$this->db->insert('pasien', $data);
		$this->session->set_flashdata('berhasil', 'Data Pasien Berhasil Disimpan');
		redirect('home');
	}

}

/* End of file dataPasien.php */
/* Location: ./application/models/dataPasien.php */