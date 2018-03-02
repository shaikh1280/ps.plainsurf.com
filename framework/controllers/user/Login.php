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
}

