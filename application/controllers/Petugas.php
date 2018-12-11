<?php 
/**
 * summary
 */
class Petugas extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Petugas_model');
        $data['petugas_list'] = $this->Petugas_model->getDataPetugasSemua();
        $this->load->view('petugas', $data);
    }


    public function create() {
        $this->load->model('Petugas_model');
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view_petugas');
        }else{
                $this->Petugas_model->insertPetugas();
                redirect('petugas','refresh');
            }
        }

    public function update($id) {
        $this->load->model('Petugas_model');
        $this->form_validation->set_rules('nama', 'Nama Petugas', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        $data['petugas']=$this->Petugas_model->getPetugas($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view_petugas', $data);
        }else {
            $this->Petugas_model->updateById($id);
            redirect('petugas','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Petugas_model');

        $data['petugas']=$this->Petugas_model->getPetugas($id);
        $this->Petugas_model->deleteById($id);
        redirect('petugas','refresh');
    }
}
?>