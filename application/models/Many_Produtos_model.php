<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Produtos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login_data($login, $pass) {
        $this->db
                ->select('id,nome')
                ->from('many_produtos')
                ->where('login', $login)
                ->where('pass', $pass);
        $result = $this->db->get();
        return $result->num_rows() > 0 ? 1 : 0;
    }

    public function get_data() {
        $this->db
                ->select('id,nome,unidade,valor_unitario,status')
                ->from('many_produtos')
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }

    public function get_data_active() {
        $this->db
                ->select('id,nome')
                ->from('many_produtos')
                ->where('status', 1)
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }

    public function get_data_only($id) {
        $this->db
                ->from('many_produtos')
                ->where('id', $id)
                ->order_by('nome', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('many_produtos', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('many_produtos', $data);
    }

}
