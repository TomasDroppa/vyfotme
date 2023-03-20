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
class Zobraz_cenik extends CI_Controller {

    public function index(){
        $this->load->model('Zobraz_cenik_model');
        $rows = $this->Zobraz_cenik_model->all();
        $data['rows'] = $rows;
        $this->load->view('zobraz_cenik/cenik', $data);
    }
     

}


?>
