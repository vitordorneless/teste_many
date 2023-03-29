<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Permissoes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data() {
        $this->db
                ->select('many_colaborador.nome,many_permissoes.colaborador,many_permissoes.endcolaborador,many_permissoes.fornecedor,many_permissoes.produtos,many_permissoes.compras')
                ->from('many_permissoes')
                ->join('many_colaborador', 'many_permissoes.id_many_colaborador = many_colaborador.id');
        return $this->db->get()->result();
    }    

    public function get_data_only($id) {
        $this->db
                ->from('many_permissoes')
                ->where('id', $id)
                ->order_by('id', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('many_permissoes', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('many_permissoes', $data);
    }

}
