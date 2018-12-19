<?php 
/**
 * summary
 */
class Dokter extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
    	$this->load->model('dokter_model');
    	$data['dokter_list'] = $this->dokter_model->getDataDokter();
    	$this->load->view('dokter', $data);

    }

    public function create() {
    	$this->load->model('dokter_model');
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('spesialis', 'spesialis', 'trim|required');

    	if ($this->form_validation->run()==FALSE) {
    		$this->load->view('input_data_view_dokter');
        }else{
                $this->dokter_model->insertdokter();
                redirect('dokter','refresh');
        }
    }

    public function update($id) {
    	$this->load->model('dokter_model');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('spesialis', 'spesialis', 'trim|required');
       
        $data['dokter']=$this->dokter_model->getdokter($id);

    	if ($this->form_validation->run()==FALSE) {
    		$this->load->view('edit_data_view_dokter', $data);
    	}else {
    		$this->dokter_model->updateById($id);
    		redirect('dokter','refresh');
    	}
    }

    public function delete($id) {
    	$this->load->model('dokter_model');

    	$data['dokter']=$this->dokter_model->getdokter($id);
    	$this->dokter_model->deleteById($id);
    	redirect('dokter','refresh');
    }
}
?>