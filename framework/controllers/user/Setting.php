<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting 
 *
 * @author farhat
 */
class Setting extends CI_Controller {
    //put your code here
    public function index() {
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/setting',
            'pageName'=>'setting', 
            'pageTitle'=>'Setting'
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();
    }
}

