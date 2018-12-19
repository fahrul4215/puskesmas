<?php 
/**
 * summary
 */
class Pasien_model extends CI_Model
{
    /**
     * summary
     */
    public function __construct(){

    }

    public function getDataPasien() {
        $query = $this->db->query("SELECT * FROM pasien");
        return $query->result_array();
    }

    public function getDataPasien1($id) {
        $this->db->where('id_pasien', $id);
        $query = $this->db->get('pasien');
        return $query->result();
    }

    public function insertpasien() {
        $ldata = $this->db->order_by("id_pasien", "DESC");
        $ldata = $this->db->limit(1);
        $ldata = $this->db->get("pasien");
        $rdata = $ldata->result();

        if($ldata->num_rows() > 0) {
            $last_id = $rdata[0]->id_pasien + 1;
        } else {
            $last_id = 1;
        }

        $data = array(
            'id_pasien' => $last_id,
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_jenis_kartu' => $this->input->post('id_jenis_kartu')
            );
        $this->db->insert('pasien', $data);
    }

    public function updateById($id) {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'id_jenis_kartu' => $this->input->post('id_jenis_kartu')    

            );

        $this->db->where('id_pasien', $id);
        $this->db->update('pasien', $data);
    }

    public function deleteById($id) {
        $this->db->where('id_pasien', $id);
        $this->db->delete('pasien');
    }
}

?>