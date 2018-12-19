<?php 
/**
 * summary
 */
class Pasien extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
    	$this->load->model('Pasien_model');
    	$data['pasien_list'] = $this->Pasien_model->getDataPasien();
    	$this->load->view('Pasien', $data);

    }

    public function create() {
    	$this->load->model('Pasien_model');
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    	$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('id_jenis_kartu', 'id jenis kartu', 'trim|required');




        if ($this->form_validation->run()==FALSE) {
            $query = $this->db->get("jenis_kartu");
            $result = $query->result();

            $parser['jenis_kartu'] = $result;

            $this->load->view('input_data_view', $parser);
        }else{
            $this ->Pasien_model ->insertpasien();
            redirect('pasien','refresh');
        }
    }

    public function update($id) {
    	$this->load->model('Pasien_model');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
        $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
        $this->form_validation->set_rules('id_jenis_kartu', 'id_jenis_kartu', 'trim|required');

        $data['pasien']=$this->Pasien_model->getDataPasien1($id);

        $query = $this->db->get("jenis_kartu");
        $result = $query->result();

        $data['jenis_kartu'] = $result;

        if ($this->form_validation->run()==FALSE) {
          $this->load->view('edit_data_view', $data);
      }else {
          $this->Pasien_model->updateById($id);
          redirect('pasien','refresh');
      }
  }

  public function delete($id) {
   $this->load->model('Pasien_model');

   $data['pasien']=$this->Pasien_model->getDataPasien($id);
   $this->Pasien_model->deleteById($id);
   redirect('pasien','refresh');
}
}
?>