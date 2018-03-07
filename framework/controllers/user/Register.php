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
class Register extends CI_Controller {
    public function index() {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('pass1', 'password', 'required');
        $this->form_validation->set_rules('pass2', 'password', 'required');
        $this->form_validation->set_rules('C1', 'Select team and condition', 'required');
        if ($this->form_validation->run('') == FALSE) {
            if(validation_errors()==NULL){
                
            }else{
             echo '<script> alert("'.str_replace(array("\r","\n"), '\n', validation_errors()).'"); </script>';   
            }
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/register',
            'pageName'=>'forgetpassword', 
            'pageTitle'=>'forgetpassword'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();  
        }else{
            $this->registration();
        }
    }
    
    public function registration() {
        $data = array(
        $this->input->post('name'),
        $this->input->post('email'),
        $this->input->post('pass1'),
        $this->input->post('pass2'),   
        );
        $this->load->model('registerm');
        $ch = $this->registerm->remailcheck($data[1]); 
        if($ch == 0){
            if($data[2] == $data[3]){
             $this->registerm->signup($data);   
            }else{
            $message = "Your Enter Password Does Not match";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/register';</script>";
            }
        }else{
            $message = "This Mail is Already Registered";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/register';</script>";
        }
        //echo print_r($data);
    }
}
