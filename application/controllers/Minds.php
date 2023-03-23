<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Minds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        echo 'entrei no minds';
    }

}
