<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tempLoginModel
 *
 * @author faizan
 */
class TempLoginModel extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function login($data){
        $query = $this->db->get_where('account',['username'=>$data['username'], 'password'=>$data['password']]);
        foreach ($query->result() as $row){
            if($query->num_rows()==1){
                return $row->uid;
            }else{
                return false;
            }
        }
    }
    
    public function createSession($info,$uid){
        $data = array(
            'id'=>NULL,
            'device_info'=>  json_encode($info),
            'uid'=>$uid,
            'flag'=>'logged_in'
        );
        $this->db->insert('session',$data);
    }
}
