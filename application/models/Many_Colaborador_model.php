<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Colaborador_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login_data($login, $pass) {
        $this->db
                ->select('id,nome')
                ->from('many_colaborador')
                ->where('login', $login)
                ->where('pass', $pass);
        $result = $this->db->get();
        return $result->num_rows() > 0 ? 1 : 0;
    }

}
