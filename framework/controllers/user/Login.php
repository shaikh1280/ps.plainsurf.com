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
class Login extends CI_Controller {

    public function index() {
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/login',
            'pageName'=>'login', 
            'pageTitle'=>'Login'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();
    }
    public function logincheck() {
        $data = array(
        'email1' => $this->input->post('email'),
        'pass1' => hash('sha256', $this->input->post('pass1')) 
        );
        $this->load->model('loginm');
        $this->loginm->logincheck($data); 
    }
}

