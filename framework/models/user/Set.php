<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of setting
 *
 * @author faizan
 */
class Set extends CI_Model{
    //put your code here
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index($uid) {
        $query = $this->db->get_where('session',['uid'=>$uid]);
        return $query->result();
        //$this->load->view('/user/setting',$data);
    }
}
