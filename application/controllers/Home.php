<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {        
        parent::__construct();
    }

    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home.php');
        } else {
            $this->load->view('dash.php');
        }
    }

}
