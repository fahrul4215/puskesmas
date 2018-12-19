<?php 
/**
 * summary
 */
class Poli extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Poli_model');
        $data['poli_list'] = $this->Poli_model->getDataPoliSemua();
        $this->load->view('poli', $data);
    }


    public function create() {
        $this->load->model('Poli_model');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view_poli');
        }else{
            $this ->Poli_model ->insertPoli();
            redirect('poli','refresh');
        }        
    }

    public function update($id) {
        $this->load->model('Poli_model');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');

        $data['poli']=$this->Poli_model->getPoli($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view_poli', $data);
        }else {
            $this->Poli_model->updateById($id);
            redirect('poli','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Poli_model');

        $data['puskesmas']=$this->Poli_model->getPoli($id);
        $this->Poli_model->deleteById($id);
        redirect('poli','refresh');
    }
}
?>