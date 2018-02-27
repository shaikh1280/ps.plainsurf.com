<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author farhat
 */
class ViewTemplate {
    private $controller;
    private $fileName; 
    private $data;
    private $extra;
    function __construct($viewConfig) {
        $this->controller  = &get_instance(); 
        $this->fileName = $viewConfig['data']['fileName'];
        $this->data = $viewConfig['data'];
        $this->extra = isset($viewConfig['extra'])? $viewConfig['extra'] : array();
    }

    public function render() {
        $this->controller->load->view('index', $this->data);
    }
    public function render1() {
        $this->controller->load->view('login', $this->data);
    }
}
