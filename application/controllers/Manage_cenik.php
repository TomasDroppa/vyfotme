<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * 
 */
class Manage_cenik extends CI_Controller {


    public function index(){
        $this->load->model('Cenik_model');
        $rows = $this->Cenik_model->all();
        $data['rows'] = $rows;
        $this->load->view('manage_cenik/list', $data);
       
    }

    function showCreateForm(){

        $html = $this->load->view('manage_cenik/create','',true);
        $response['html'] = $html;
        echo json_encode($response);
    }
    
    function saveModel(){

        $this->load->model('Cenik_model');

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('sluzba', 'Sluzba', 'required');
        $this->form_validation->set_rules('cena', 'Cena', 'required');
        $this->form_validation->set_rules('delka_foceni', 'Delka_foceni', 'required');

        if($this->form_validation->run() == true) {

            $formArray = array();
            $formArray['sluzba'] = $this->input->post('sluzba');
            $formArray['cena'] = $this->input->post('cena');
            $formArray['delka_foceni'] = $this->input->post('delka_foceni');

            $id = $this->Cenik_model->create($formArray);

            $row = $this->Cenik_model->getRow($id);
            $vData['row'] = $row;
            $rowHtml = $this->load->view('manage_cenik/cenik_row',$vData,true);

            $response['row'] = $rowHtml;
            $response['status'] = 1;
            $response['message'] = "<div class=\"alert alert-success\">Nová služba byla úspěšně vytvořena.</div>";

        } else {

            $response['status'] = 0;
            $response['sluzba'] = strip_tags(form_error('sluzba'));
            $response['cena'] = strip_tags(form_error('cena'));
            $response['delka_foceni'] = strip_tags(form_error('delka_foceni'));


        }

        echo json_encode($response);

    }
    
    // úprava
    function getCenikModel($id) {
        $this->load->model('Cenik_model');
        $row = $this->Cenik_model->getRow($id);
        $data['row'] = $row;

        $html = $this->load->view('manage_cenik/edit',$data,true);
        $response['html'] = $html;
        echo json_encode($response);

    }

    function updateModel(){

        $this->load->model('Cenik_model');
        $id = $this->input->post('id');
        $row = $this->Cenik_model->getRow($id);
        
        if (empty($row)) {
            $response['msg'] = "Záznam byl již smazána, nebo nenalezen v databázi";
            $response['status'] = 100;
            json_encode($response);
            exit;
        }

        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('sluzba', 'Sluzba', 'required');
        $this->form_validation->set_rules('cena', 'Cena', 'required');
        $this->form_validation->set_rules('delka_foceni', 'Delka_foceni', 'required');

        if($this->form_validation->run() == true) {
            //updated record

            $formArray = array();
            $formArray['sluzba'] = $this->input->post('sluzba');
            $formArray['cena'] = $this->input->post('cena');
            $formArray['delka_foceni'] = $this->input->post('delka_foceni');

            $id = $this->Cenik_model->update($id,$formArray);
            $row = $this->Cenik_model->getRow($id);

 
            $response['row'] = $row;
            $response['status'] = 1;
            $response['message'] = "<div class=\"alert alert-success\">Nová služba byla úspěšně upravena.</div>";

        } else {

            $response['status'] = 0;
            $response['sluzba'] = strip_tags(form_error('sluzba'));
            $response['cena'] = strip_tags(form_error('cena'));
            $response['delka_foceni'] = strip_tags(form_error('delka_foceni'));

        }

        echo json_encode($response);

    }

    function deleteModel($id) {
        $this->load->model('Cenik_model');
        $row = $this->Cenik_model->getRow($id);
        
        if (empty($row)) {
            $response['msg'] = "<div class=\"alert alert-warning\">Either record already deleted or not found in DB.</div>";
            $response['status'] = 0;
            echo json_encode($response);
            exit;
        } else {
            $this->Cenik_model->delete($id);
            $response['msg'] = "<div class=\"alert alert-success\">Záznam byl úspěšně smazán.</div>";
            $response['status'] = 1;
            echo json_encode($response);
            
        }
    }

}


?>
