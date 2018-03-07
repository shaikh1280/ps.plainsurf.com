<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author King-TheHacker
 */
class Forgetpassword extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->form_validation->set_rules('u_email', 'email', 'required');
        if ($this->form_validation->run('') == FALSE) {
            if(validation_errors()==NULL){
                
            }else{
             echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';   
            }
            $viewConfig = array('data' => array(
                    'fileName' => '/user/forgetpassword',
                    'pageName' => 'forgetpassword',
                    'pageTitle' => 'forgetpassword'
            ));
            $this->load->library('viewTemplate', $viewConfig);
            $this->viewtemplate->render();
        } else {
            $this->check();
        }
    }

    public function check() {
        $data = array(
            $this->input->post('u_email')
        );
        $this->load->model('reset');
        $this->reset->check($data);
        
    }

    public function update() {
        $data = array(
            $this->input->post('pass1'),
            $this->input->post('pass1'),
            $this->input->GET['q']
        );
        $this->load->model('reset');
        $this->reset->update($data);
    }

    public function resetpassword() {
        
        $this->form_validation->set_rules('pass1', 'password0', 'required');
        $this->form_validation->set_rules('pass2', 'password1', 'required');
        if ($this->form_validation->run('') == FALSE) {
            if(validation_errors()==NULL){
                
            }else{
             echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';   
            }
        $viewConfig = array('data' => array(
                'fileName' => '/user/reset',
                'pageName' => 'reset',
                'pageTitle' => 'reset'
        ));
        $this->load->library('viewTemplate', $viewConfig);
        $this->viewtemplate->render();
        }else{
            $this->update();
        }
    }

}
