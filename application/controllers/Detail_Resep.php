<?php 
/**
 * summary
 */
class Detail_Resep extends CI_Controller
{
    /**
     * summary
     */
    public function index() {
        $this->load->model('Detail_Resep_model');
        $data['detail_resep_list'] = $this->Detail_Resep_model->getDataDetail_Resep();
        $this->load->view('Detail_Resep', $data);

    }

    public function create() {
        $this->load->model('Detail_Resep_model');
        $this->form_validation->set_rules('id_detail_resep', 'id_detail_resep', 'trim|required');
        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
                



        if ($this->form_validation->run()==FALSE) {
            $this->load->view('input_data_view');
        }else{
                $this ->Detail_Resep_model ->insertdetail_resep();
                redirect('detail_resep','refresh');
        }
    }

    public function update($id) {
        $this->load->model('Detail_Resep_model');
        $this->form_validation->set_rules('id_detail_resep', 'id_detail_resep', 'trim|required');
        $this->form_validation->set_rules('id_obat', 'id_obat', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
                
        $data['detail_resep']=$this->Detail_Resep_model->getDatadetail_resep($id);

        if ($this->form_validation->run()==FALSE) {
            $this->load->view('edit_data_view', $data);
        }else {
            $this->Detail_Resep_model->updateById($id);
            redirect('detail_resep','refresh');
        }
    }

    public function delete($id) {
        $this->load->model('Detail_Resep_model');

        $data['detail_resep']=$this->Detai_Resep_model->getDataPenyakit($id);
        $this->Detail_Resep_model->deleteById($id);
        redirect('penyakit','refresh');
    }
}
?>