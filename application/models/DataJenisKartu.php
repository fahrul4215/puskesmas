<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataJenisKartu extends CI_Model {

	public function getJenisKartu()
	{
		return $this->db->get('jenis_kartu')->result();
	}

}

/* End of file dataJenisKartu.php */
/* Location: ./application/models/dataJenisKartu.php */