<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Endereco_Colaborador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "end_colaborador/end_colaborador.js"
            )
        );
        $this->template->show('end_colaborador.php', $data);
    }

}
