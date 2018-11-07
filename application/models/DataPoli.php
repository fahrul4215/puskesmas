<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPoli extends CI_Model {

	public function getPoli()
	{
		return $this->db->get('poli')->result();
	}

}

/* End of file dataPetugas.php */
/* Location: ./application/models/dataPetugas.php */