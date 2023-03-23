<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        if ($this->session->userdata('tentativas') == 0 or empty($this->session->userdata('tentativas'))) {
            $this->session->set_userdata('tentativas', 1);
        }

        $this->load->view('home.php');
    }

}
