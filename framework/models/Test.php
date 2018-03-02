
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

        $q = $this->db->query("SELECT ID,Email,Password FROM Reset where Email='$email'");

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

            $pwrurl = "localhost:8080/user/forgetpassword/resetpassword?q=" . $password;

            // Mail them their key
            $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.yoursitehere.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
            mail($email, "PlainSurf Password Reset Link", $mailbody);
            echo $pwrurl;
        } else {

            header("Location:Forgetpassword");
            $message = "Your Enter mail it not in the Database. Plz Enter Registered Mail Id";
            echo "<script type='text/javascript'>alert('$message');</script>";
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

                $q = $this->db->query("UPDATE Reset SET Password = '$p1' WHERE Email = '$output'");
                
                if ($q) {
                    echo "Record updated successfully";
                    header("Location:/user/login");
                } else {
                    echo "Error updating record: " . $q->error;
                    header("Location:/user/forgetpassword/resetpassword");
                }
            } else {
                header("Location:/user/forgetpassword/resetpassword");
            }
    }

}
?>
