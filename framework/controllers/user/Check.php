<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author farhat
 */
class Check extends CI_Controller {

    public function index() {
        $this->load->model('test');
        $this->test->check();
       //$this->load->view('/user/check'); 
    }
}