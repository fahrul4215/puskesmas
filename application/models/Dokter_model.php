<?php 

/**
 * summary
 */
class Dokter_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDatadokter () {
    	$query = $this->db->query("SELECT * FROM dokter");
		return $query->result_array();
    }

    public function insertdokter() {
        $ldata = $this->db->order_by("id_dokter", "DESC");
        $ldata = $this->db->limit(1);
        $ldata = $this->db->get("dokter");
        $rdata = $ldata->result();

        if($ldata->num_rows() > 0) {
            $last_id = $rdata[0]->id_dokter + 1;
        } else {
            $last_id = 1;
        }

    	$data = array(
                'id_dokter' => $last_id,
    			'nama' => $this->input->post('nama'),
    			'spesialis' => $this->input->post('spesialis')

    		);
    	$this->db->insert('dokter', $data);
    }

    public function getdokter($id) {
    	$this->db->where('id_dokter', $id);
    	$query = $this->db->get('dokter');
    	return $query->result();
    }

    public function updateById($id)
    {
        if (!is_null($dokter = $this->db->select_max('id_dokter')->get('dokter')->result())){
            $id_dokter = $dokter[0]->id_dokter + 1;
    } else {

        $id_dokter = 1;
    }

    	$data = array(
                'id_dokter' => $id_dokter,
                'nama' => $this->input->post('nama'),
                'spesialis' => $this->input->post('spesialis'),
    		);

    	$this->db->where('id_dokter', $id);
    	$this->db->update('dokter', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id_dokter', $id);
    	$this->db->delete('dokter');
    }
}
 ?>