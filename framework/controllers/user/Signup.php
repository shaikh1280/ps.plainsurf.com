<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Signup 
 *
 * @author farhat
 */
class Signup extends CI_Controller {
    
    //put your code here
    public function index() {
        $viewConfig = array('data'=>array( 
            'fileName'=> 'user/signup',
            'pageName'=>'signup', 
            'pageTitle'=>'Signup'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();     
    }
}
