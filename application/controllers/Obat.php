<?php 
/**
 * summary
 */
class Obat extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Obat_model');
        $data['obat_list'] = $this->Obat_model->getDataObatSemua();
        $this->load->view('obat', $data);
    }


    public function create() {
        $this->load->model('Obat_model');
        $this->form_validation->set_rules('exp_date', 'Tanggal Kadaluarsa', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'trim|required');

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view_obat');
        }else{
                $this->Obat_model->insertObat();
                redirect('obat','refresh');
            }
        }

    public function update($id) {
        $this->load->model('Obat_model');
        $this->form_validation->set_rules('exp_date', 'Tanggal Kadaluarsa', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('jenis_obat', 'Jenis Obat', 'trim|required');

        $data['obat']=$this->Obat_model->getObat($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view_obat', $data);
        }else {
            $this->Obat_model->updateById($id);
            redirect('obat','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Obat_model');

        $data['obat']=$this->Obat_model->getObat($id);
        $this->Obat_model->deleteById($id);
        redirect('obat','refresh');
    }
}
?>