<?php 

/**
 * summary
 */
class Resep_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataresep () {
        $query = $this->db->query("SELECT * FROM resep");
        return $query->result_array();
    }

    public function insertresep() {
        $data = array(
                'id_resep' => $this->input->post('id_resep'),
                'id_detail_resep' => $this->input->post('id_detail_resep'),
                'tanggal' => $this->input->post('tanggal'),

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
                'id_resep' => $this->input->post('id_resep'),
                'id_detail_resep' => $this->input->post('id_detail_resep'),
                'tanggal' => $this->input->post('tanggal'),
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