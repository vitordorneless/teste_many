<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $this->template->show('colaborador.php');        
    }

}
