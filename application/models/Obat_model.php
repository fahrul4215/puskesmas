<?php 

/**
 * summary
 */
class Obat_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataObatSemua () {
    	$query = $this->db->query("SELECT * from obat");
		return $query->result();
    }

    public function urutan() {
        $query = $this->db->query("SELECT MIN(jumlah_stok) as FROM barang");
        return $query->result();
    }

    public function insertObat() {
        if (!is_null($obat = $this->db->select_max('id_obat')->get('obat')->result())){
            $id_obat = $obat[0]->id_obat + 1;
        } else {
            $id_obat = 1;
        }
    	$data = array(
                'id_obat' => $id_obat,
    			'exp_date' => $this->input->post('exp_date'),
    			'jumlah' => $this->input->post('jumlah'),
    			'nama' => $this->input->post('nama'),
                'jenis_obat' => $this->input->post('jenis_obat'),
    		);
    	$this->db->insert('obat', $data);
    }

    public function getObat($id) {
    	$this->db->where('id_obat', $id);
    	$query = $this->db->get('obat');
    	return $query->result();
    }

    public function updateById($id) {
        if (!is_null($obat = $this->db->select_max('id_obat')->get('obat')->result())){
            $id_obat = $obat[0]->id_obat;
        } else {
            $id_obat = 1;
        }
    	$data = array(
    		    'id_obat' => $id_obat,
                'exp_date' => $this->input->post('exp_date'),
                'jumlah' => $this->input->post('jumlah'),
                'nama' => $this->input->post('nama'),
                'jenis_obat' => $this->input->post('jenis_obat'),
    		);

    	$this->db->where('id_obat', $id);
    	$this->db->update('obat', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id_obat', $id);
    	$this->db->delete('obat');
    }
}
 ?>