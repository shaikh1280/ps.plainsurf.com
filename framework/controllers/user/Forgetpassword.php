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

    public function index() {
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/forgetpassword',
            'pageName'=>'forgetpassword', 
            'pageTitle'=>'forgetpassword'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();            
    }
    
    public function check(){
        $this->load->model('test');
        $this->test->check();
    }
    
    public function update() {
        $this->load->model('test');
        $this->test->update();
    }
    
    public function resetpassword() {
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/reset',
            'pageName'=>'reset', 
            'pageTitle'=>'reset'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render(); 
    }
}
