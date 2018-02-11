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
class Resetpassword extends CI_Controller {

    public function index() {
        $viewConfig = array('fileName'=>'main', 'data'=>array(
            'pageName'=>'main', 'pageTitle'=>'Home'
            ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();
       $this->load->view('user/reset'); 
    }
}
