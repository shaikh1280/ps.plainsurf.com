
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author king-thehacker
 */
class Functions extends CI_Controller {

    //put your code here

    public function login1() {
     $p1 = $_POST['name1'];
     $p2 = $_POST['pass1'];
     
     if ($p1=='Akshay' && $p2='123'){
         header("Location:/user/dashboard");
     }else{
         header("Location:/user/login");
     }
    }
}
