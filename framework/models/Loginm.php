<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Loginm
 *
 * @author king-thehacker
 */
class Loginm extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function logincheck($data = '') {
        $udata = array(
                $data[0],
                hash('sha256',$data[1])
            );
        $q = $this->db->get_where('account', array('email' => $udata[0],'password_md5' => $udata[1]));
        $re = $q->result();
        if ($re != null) {
            echo "<script type='text/javascript'>window.location.href = '/user/setting';</script>";
        }else{
            $message = "Your mail Or password are not correct";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/login';</script>";
        }
    }
}
