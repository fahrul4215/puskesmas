<?php 
/**
 * summary
 */
class Resep extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Resep_model');
        $data['resep_list'] = $this->Resep_model->getDataResep();
        $this->load->view('Resep', $data);

    }

    public function create() {
        $this->load->model('Resep_model');
        $this->form_validation->set_rules('id_resep', 'id_resep', 'trim|required');
        $this->form_validation->set_rules('id_detail_resep', 'id_detail_resep', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

                



        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view_resep');
        }else{
                $this ->Resep_model ->insertResep();
                redirect('resep','refresh');
        }
    }

    public function update($id) {
        $this->load->model('Resep_model');
        $this->form_validation->set_rules('id_resep', 'id_resep', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('id_detail_resep', 'id_detail_resep', 'trim|required');
                
        $data['resep']=$this->Resep_model->getDataResep($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view', $data);
        }else {
            $this->Resep_model->updateById($id);
            redirect('resep','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Resep_model');

        $data['resep']=$this->Resep_model->getDataResep($id);
        $this->Resep_model->deleteById($id);
        redirect('resep','refresh');
    }
}
?>