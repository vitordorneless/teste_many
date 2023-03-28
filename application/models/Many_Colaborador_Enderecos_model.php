<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Colaborador_Enderecos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login_data($login, $pass) {
        $this->db
                ->select('id,nome')
                ->from('many_colaborador_enderecos')
                ->where('login', $login)
                ->where('pass', $pass);
        $result = $this->db->get();
        return $result->num_rows() > 0 ? 1 : 0;
    }

    public function get_data() {
        $this->db
                ->select('many_colaborador.nome,many_colaborador_enderecos.id,many_colaborador_enderecos.cep,many_colaborador_enderecos.rua,many_colaborador_enderecos.numero,many_colaborador_enderecos.cidade')
                ->from('many_colaborador_enderecos')                
                ->join('many_colaborador_enderecos', 'many_colaborador_enderecos.id_many_colaborador = many_colaborador.id')
                ->where('many_colaborador_enderecos.status',1)
                ->order_by('many_colaborador_enderecos.id_many_colaborador', 'ASC')
                ->order_by('many_colaborador_enderecos.rua', 'ASC');

        return $this->db->get()->result();
    }

    public function get_data_only($id) {
        $this->db
                ->from('many_colaborador_enderecos')
                ->where('id', $id)
                ->order_by('nome', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('many_colaborador_enderecos', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('many_colaborador_enderecos', $data);
    }

}
