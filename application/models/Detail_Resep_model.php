<?php 

/**
 * summary
 */
class Detail_Resep_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataDetail_Resep () {
    	$query = $this->db->query("SELECT * FROM resep");
		return $query->result_array();
    }

    public function insertresep() {
    	$data = array(
    			'id_detail_resep' => $this->input->post('id_detail_resep'),
    			'id_obat' => $this->input->post('id_obat'),
    			'jumlah' => $this->input->post('jumlah'),

    		);
    	$this->db->insert('resep', $data);
    }

    public function getresep($id) {
    	$this->db->where('id_resep', $id);
    	$query = $this->db->get('resep');
    	return $query->result();
    }

    public function updateById($id) {
    	$data = array(
                'id_detail_resep' => $this->input->post('id_detail_resep'),
                'id_obat' => $this->input->post('id_obat'),
                'jumlah' => $this->input->post('jumlah'),
    		);

    	$this->db->where('id_resep', $id);
    	$this->db->update('resep', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id_resep', $id);
    	$this->db->delete('resep');
    }
}
 ?>