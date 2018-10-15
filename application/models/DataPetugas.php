<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPetugas extends CI_Model {

	public function getPetugas()
	{
		return $this->db->get('petugas')->result();
	}

}

/* End of file dataPetugas.php */
/* Location: ./application/models/dataPetugas.php */