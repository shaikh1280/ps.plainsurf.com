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
class Session extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
    }
    public function index() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pass1', 'password', 'required');
        if ($this->form_validation->run('') == FALSE) {
            if(validation_errors()==NULL){
                
            }else{
             echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';   
            }
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/login',
            'pageName'=>'login', 
            'pageTitle'=>'Login'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();
        }else{
            $this->logincheck();
        }
    }
    public function logincheck() {
        $data = array(
        'email1' => $this->input->post('email'),
        'pass1' => hash('sha256', $this->input->post('pass1')) 
        );
        $this->load->model('sessionm');
        $this->sessionm->logincheck($data);
    }
    public function logout() {
        $this->load->model('sessionm');
        $this->sessionm->logout();
    }
}

