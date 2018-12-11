<?php 

/**
 * summary
 */
class Kartu_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataKartuSemua () {
    	$query = $this->db->query("SELECT * from jenis_kartu");
		return $query->result();
    }

    public function urutan() {
        $query = $this->db->query("SELECT MIN(jumlah_stok) as FROM barang");
        return $query->result();
    }

    public function insertKartu() {
        if (!is_null($jenis_kartu = $this->db->select_max('id_jenis_kartu')->get('jenis_kartu')->result())){
            $id_jenis_kartu = $jenis_kartu[0]->id_jenis_kartu + 1;
        } else {
            $id_jenis_kartu = 1;
        }
    	$data = array(
                'id_jenis_kartu' => $id_jenis_kartu,
    			'nama_kartu' => $this->input->post('nama_kartu'),
    		);
    	$this->db->insert('jenis_kartu', $data);
    }

    public function getKartu($id) {
    	$this->db->where('id_jenis_kartu', $id);
    	$query = $this->db->get('jenis_kartu');
    	return $query->result();
    }

    public function updateById($id) {
        if (!is_null($jenis_kartu = $this->db->select_max('id_jenis_kartu')->get('jenis_kartu')->result())){
            $id_jenis_kartu = $jenis_kartu[0]->id_jenis_kartu;
        } else {
            $id_jenis_kartu = 1;
        }
    	$data = array(
    		'id_jenis_kartu' => $id_jenis_kartu,
    		'nama_kartu' => $this->input->post('nama_kartu'),
    		);

    	$this->db->where('id_jenis_kartu', $id);
    	$this->db->update('jenis_kartu', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id_jenis_kartu', $id);
    	$this->db->delete('jenis_kartu');
    }
}
 ?>