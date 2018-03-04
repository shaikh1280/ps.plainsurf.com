<?php 

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting 
 *
 * @author faizan
 */
class Setting extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user/Set');
    }


    public function index($uid) {
        $result = $this->Set->index($uid);
        $viewConfig = array('data'=>array( 
            'fileName'=> '/user/setting',
            'pageName'=>'setting', 
            'pageTitle'=>'Setting',
            'result' => $result
        ));
        $this->load->library('viewTemplate',$viewConfig);
        $this->viewtemplate->render();
        }
}

