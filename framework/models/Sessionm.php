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
class Sessionm extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function logincheck($data = '') {
        $query = $this->db->get_where('account', array('email' => $data['email1'], 'password_md5' => $data['pass1']));        
        $result = $query->result()[0];
        if ($result != NULL) {
            session_start();
            $ip = $_SERVER['REMOTE_ADDR'];
            $location = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
            $infojson = array(
                'ip' => $ip,
                'location' => $location,
                'browser_agent' => $_SERVER['HTTP_USER_AGENT'],
                'start_time' => mdate('%Y-%m-%d %h:%i %a'),
                'end_time' => '',
                'logout_reason' => ''
            );
            $finaldata = array(
                'id' => NULL,
                'device_info' => json_encode($infojson),
                'uid' => $result->id,
                'flag' => 'logged_in'
            );
            $this->db->insert('session',$finaldata);
            $_SESSION['uid']=$result->id;
            $_SESSION['sid']=$this->db->insert_id();
            $_SESSION['username']=$result->username;
            $_SESSION['mail']=$result->email;
            header('location:/main');
        } else {
            $message = "Your mail Or password are not correct";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/session';</script>";
        }
    }
    
    public function logout() {
            session_start();
            $query = $this->db->get_where('session', array('id' => $_SESSION['sid']));
            $result = $query->result()[0];
            if($result != NULL ){
            $temp = json_decode($result->device_info);
            $info = array(
                'ip' => $temp->ip,
                'location' => $temp->location,
                'browser_agent' => $temp->browser_agent,
                'start_time' => $temp->start_time,
                'end_time' => mdate('%Y-%m-%d %h:%i %a'),
                'logout_reason' => 'user_logout'
            );
            $finaldata = array(
                'device_info' => json_encode($info),
                'flag' => 'logged_out'
            );
            $this->db->where('id', $_SESSION['sid']);
            $query = $this->db->update('session',$finaldata);
            $message = "You Successfully logout .";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/main';</script>";
            } else {
            $message = "User is not login .";
            echo "<script type='text/javascript'>alert('$message');</script>";
            }
            session_destroy();
            header('location:/main');
    }
}
