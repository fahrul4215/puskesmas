<?php 

/**
 * summary
 */
class Poli_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataPoliSemua () {
    	$query = $this->db->query("SELECT * from poli");
      return $query->result();
  }

  public function urutan() {
    $query = $this->db->query("SELECT MIN(jumlah_stok) as FROM barang");
    return $query->result();
}

public function insertPoli() {
   if (!is_null($poli = $this->db->select_max('id_poli')->get('poli')->result())){
    $id_poli = $poli[0]->id_poli + 1;
} else {
    $id_poli = 1;
}
$data = array(
    'id_poli' => $id_poli,
    'nama' => $this->input->post('nama')
);
$this->db->insert('poli', $data);
}

public function getPoli($id) {
   $this->db->where('id_poli', $id);
   $query = $this->db->get('poli');
   return $query->result();
}

public function updateById($id) {
   $data = array(
      'nama' => $this->input->post('nama')
  );

   $this->db->where('id_poli', $id);
   $this->db->update('poli', $data);
}

public function deleteById($id) {
   $this->db->where('id_poli', $id);
   $this->db->delete('poli');
}
}
?>