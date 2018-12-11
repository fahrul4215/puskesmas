<?php 

/**
 * summary
 */
class Petugas_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct()
    {
        
    }

    public function getDataPetugasSemua () {
    	$query = $this->db->query("SELECT * from petugas");
		return $query->result();
    }

    public function urutan() {
        $query = $this->db->query("SELECT MIN(jumlah_stok) as FROM barang");
        return $query->result();
    }

    public function insertPetugas() {
    	if (!is_null($petugas = $this->db->select_max('id_petugas')->get('petugas')->result())){
            $id_petugas = $petugas[0]->id_petugas + 1;
        } else {
            $id_petugas = 1;
        }
        $data = array(
                'id_petugas' => $id_petugas,
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
        $this->db->insert('petugas', $data);
    }

    public function getPetugas($id) {
    	$this->db->where('id_petugas', $id);
        $query = $this->db->get('petugas');
        return $query->result();
    }

    public function updateById($id) {
    	if (!is_null($petugas = $this->db->select_max('id_petugas')->get('petugas')->result())){
            $id_petugas = $petugas[0]->id_petugas;
        } else {
            $id_petugas = 1;
        }
        $data = array(
            'id_petugas' => $id_petugas,
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            );

        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }

    public function deleteById($id) {
    	$this->db->where('id_petugas', $id);
    	$this->db->delete('petugas');
    }
}
 ?>