<?php 
/**
 * summary
 */
class Kartu extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Kartu_model');
        $data['kartu_list'] = $this->Kartu_model->getDataKartuSemua();
        $this->load->view('kartu', $data);
    }


    public function create() {
        $this->load->model('Kartu_model');
        $this->form_validation->set_rules('nama_kartu', 'Nama Kartu', 'trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view_kartu');
        }else{
                $this->Kartu_model->insertKartu();
                redirect('kartu','refresh');
            }
        }

    public function update($id) {
        $this->load->model('Kartu_model');
        $this->form_validation->set_rules('nama_kartu', 'Nama Kartu', 'trim|required');

        $data['jenis_kartu']=$this->Kartu_model->getKartu($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view_kartu', $data);
        }else {
            $this->Kartu_model->updateById($id);
            redirect('kartu','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Kartu_model');

        $data['jenis_kartu']=$this->Kartu_model->getKartu($id);
        $this->Kartu_model->deleteById($id);
        redirect('kartu','refresh');
    }
}
?>