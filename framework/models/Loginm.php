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
        $this->load->library('session');
    }

    public function logincheck($data = '') {
        $q = $this->db->get_where('account', array('email' => $data['email1'], 'password_md5' => $data['pass1']));        
        $re = $q->result()[0];
        if ($re != NULL) {
            $ip = $_SERVER['REMOTE_ADDR'];
            $location = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            $info = array(
                'IP' => $ip,
                'Location' => $location,
                'Browser_Agent' => $_SERVER['HTTP_USER_AGENT'],
                'Start_Time' => mdate('%Y-%m-%d %h:%i %a'),
                'End_Time' => '',
                'Logout_Reason' => ''
            );
            $finaldata = array(
                'id' => NULL,
                'device_info' => json_encode($info),
                'uid' => $re->id,
                'flag' => 'logged_in'
            );
            
            $this->db->insert('session',$finaldata);
            
            $usersession = array(
                'uid' => $re->id,
                'sid' => $this->db->insert_id(),
                'username' => $re->username,
                'mail' => $re->email
            );
            
            $this->session->set_userdata($usersession);
            
            echo "<script type='text/javascript'>window.location.href = '/user/setting';</script>";
        } else {
            $message = "Your mail Or password are not correct";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/login';</script>";
        }
    }

}
