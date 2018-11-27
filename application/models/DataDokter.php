<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataDokter extends CI_Model {

	public function getDokter()
	{
		return $this->db->get('dokter')->result();
	}

}

/* End of file dataDokter.php */
/* Location: ./application/controllers/dataDokter.php */