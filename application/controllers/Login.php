<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author zdrh
 */
class Login extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function registerUser() {
        $data["title"] = "Registrace";
        $data["main"] = "register";
        $this->layout->generate($data);
    }

    function loginUser() {
        $data["title"] = "Přihlášení";
        $data["main"] = "login";
        $this->layout->generate($data);
    }

}
