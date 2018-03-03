
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
class Test extends CI_Controller {

    //put your code here

    public function check() {
        $email = $_POST['email1'];
        $this->load->database();

        $q = $this->db->get_where('account', array('email' => $email));

        $re = $q->result();

        if ($re != null) {
            // Create a unique salt. This will never leave PHP unencrypted.

            $encrypt_method = "AES-256-CBC";
            $secret_key = 'This is my secret key';
            $secret_iv = 'This is my secret iv';

            $key = hash('sha256', $secret_key);

            $iv = substr(hash('sha256', $secret_iv), 0, 16);

            $output = openssl_encrypt($email, $encrypt_method, $key, 0, $iv);
            $password = base64_encode($output);

            $baseurl = base_url();
            $pwrurl = $baseurl . "user/forgetpassword/resetpassword?q=" . $password;

            // Mail them their key
            $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
            //mail('akshay@plainsurf.com', "PlainSurf Password Reset Link", $mailbody);  //remove this comment when host
            //$message = "Your Reset Password Link is Successfully send to your mail ";
            // echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/login';</script>";
            echo $pwrurl;   // do comment when host this code
        } else {
            $message = "Your Enter mail it not in the Database. Plz Enter Registered Mail Id";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/forgetpassword';</script>";
        }
    }

    public function update() {
        $p1 = $_POST['pass1'];
        $p2 = $_POST['pass2'];
        $hash = $_GET['q'];


        $encrypt_method = "AES-256-CBC";
        $secret_key = 'This is my secret key';
        $secret_iv = 'This is my secret iv';
        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        $output = openssl_decrypt(base64_decode($hash), $encrypt_method, $key, 0, $iv);
        if ($p1 == $p2) {
            // Create connection
            $this->load->database();

            $udata = array(
                'password' => $p1,
                'password_md5' =>hash('sha256',$p1),
            );
            $this->db->where('email', $output);
            $q = $this->db->update('account',$udata);

            if ($q) {
                $message = "Your Password is Successfully Changed . You can login now .";
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/login';</script>";
            } else {
                $message = "Error updating record: " . $q->error;
                echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/forgetpassword/resetpassword?q=$hash';</script>";
            }
        } else {
            $message = "Your Enter Password are not match ";
            echo "<script type='text/javascript'>alert('$message');window.location.href = '/user/forgetpassword/resetpassword?q=$hash';</script>";
        }
    }

}
