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
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/register',
            'pageName'=>'forgetpassword', 
            'pageTitle'=>'forgetpassword'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();  
    }
    
    public function registration() {
        $data = array(
        $this->input->post('name'),
        $this->input->post('email'),
        $this->input->post('pass1'),
        $this->input->post('pass2'),
        $this->input->post('C1')    
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
