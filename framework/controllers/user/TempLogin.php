<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TempLogin
 *
 * @author faizan
 */
class TempLogin extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('user/TempLoginModel');
    }
    
    public function index(){
        $this->load->view('user/tempLoginView');
    }
    
    public function login_check(){
            $data = array(
                'username'=>  $this->input->post('username'),
                'password'=> $this->input->post('password'),
                'flag'=>'logged_in'
            );
            $result = $this->TempLoginModel->login($data);
            if($result == TRUE){
                $ip=$_SERVER['REMOTE_ADDR'];
                $location=json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
                echo 'login successful';
                $this->session->set_userdata($data);
                $info = array(
                    'IP'=>$ip,
                    'Location'=>$location,
                    'Browser_Agent'=>$_SERVER['HTTP_USER_AGENT'],
                    'Start_Time'=>'',
                    'End_Time'=>'',
                    'Logout_Reason'=>''
                );
                $this->TempLoginModel->createSession($info,$result);
               echo "<script>window.location.href='/user/Setting/index/$result';</script>";
            }else{
                echo 'login unsuccessful';
            }
    }
}
