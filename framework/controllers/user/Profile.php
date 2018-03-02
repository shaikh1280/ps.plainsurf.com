<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Profile 
 *
 * @author farhat
 */
class Profile extends CI_Controller {
    //put your code here
    public function index() {
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/profile',
            'pageName'=>'profile', 
            'pageTitle'=>'Profile'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();     
    }
}

