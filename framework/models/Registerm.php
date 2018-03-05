<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of register
 *
 * @author king-thehacker
 */
class Registerm extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function remailcheck($data = '') {
        $email = $data;
        $q = $this->db->get_where('account', array('email' => $email));
        $re = $q->result();
        if ($re != null) {
            return 1;
        }else{
            return 0;
        }
    }
    public function signup($data = '') {
            $udata = array(
                'username' => $data[0],
                'email' => $data[1],
                'time_created' => mdate('%Y-%m-%d'),
                'password' => $data[2],
                'password_md5' =>hash('sha256',$data[2])
            );
            $this->db->where('email', $data[1]);
            $q = $this->db->insert('account',$udata);

            if ($q) {
                $message = "You Successfully Registered . You can login now .";
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/login';</script>";
            } else {
                $message = "Error updating record: " . $q->error;
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/register';</script>";
            }
    }
}
