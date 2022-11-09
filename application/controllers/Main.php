<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author zdrh
 */
class Main extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function page1() {
        $data["title"] = "Úvodní stránka";
        $data["main"] = "page1";
        $this->layout->generate($data);
    }
    
    function page2() {
        $data["title"] = "Úvodní stránka";
        $data["main"] = "page2";
        $this->layout->generate($data);
    }
    
    function page3() {
        $data["title"] = "Úvodní stránka";
        $data["main"] = "page3";
        $this->layout->generate($data);
    }
    
    function page4() {
        $data["title"] = "Úvodní stránka";
        $data["main"] = "page4";
        $this->layout->generate($data);
    }

}
