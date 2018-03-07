
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author King-TheHacker
 */
class Reset extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function check($data = '') {
        $email = $data[0];
        $query = $this->db->get_where('account', array('email' => $email));
        $result = $query->result();
        if ($result != null) {
            // Create a unique salt. This will never leave PHP unencrypted.
            $encrypt_method = "AES-256-CBC";
            $secret_key = 'This is my secret key';
            $secret_iv = 'This is my secret iv';
            $key = hash('sha256', $secret_key);
            $iv = substr(hash('sha256', $secret_iv), 0, 16);
            $encryptkey = openssl_encrypt($email, $encrypt_method, $key, 0, $iv);
            $encodekey = base64_encode($encryptkey);
            $baseurl = base_url();            
            $pwrurl = $baseurl . "resetpassword?q=" . $encodekey;
            $query = $this->db->insert('temp_reset_link',array('email'=>$email,'reset_link'=>$pwrurl,'time'=>mdate('%Y-%m-%d %h:%i %a'),'status'=>'vaild','last_modifiy'=>NULL ));
            // Mail them their key
            $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
            //mail('akshay@plainsurf.com', "PlainSurf Password Reset Link", $mailbody);  //remove this comment when host
            //$message = "Your Reset Password Link is Successfully send to your mail ";
            // echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/session';</script>";
            header('Location:'.$pwrurl);
        } else {
            $message = "Your Enter mail it not in the Database. Plz Enter Registered Mail Id";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/forgetpassword';</script>";
        }
    }

    public function update($data = '') {
        $p1 = $data[0];
        $p2 = $data[1];
        $hash = $data[2];
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';        
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($hash), $encrypt_method, $key, 0, $iv);
        if ($p1 == $p2) {
            // Create connection
            $udata = array(
                'password' => $p1,
                'password_md5' =>hash('sha256',$p1)
            );
            $this->db->where('email', $output);
            $q = $this->db->update('account',$udata);
            if ($q) {
                $message = "Your Password is Successfully Changed . You can login now .";
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/login';</script>";
            } else {
                $message = "Error updating record: " . $q->error;
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/resetpassword?q=$hash';</script>";
            }
        } else {
            $message = "Your Enter Password are not match ";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/resetpassword?q=$hash';</script>";
        }
    }
    
    public function checkvaildlink() {
        $hash = $_GET['q'];
        $baseurl = base_url();            
        $pwrurl = $baseurl . "/resetpassword?q=" . $hash;
        $query = $this->db->get_where('temp_reset_link', array('reset_link' => $pwrurl,'time >=' .mdate('%Y-%m-%d %h:%i %a').'+ INTERVAL 1 DAY'));
        $result = $query->result();
        if ($result != null) {
            return 0;
        }else{
            return 1;
        }
    }
}
