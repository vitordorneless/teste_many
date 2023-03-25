<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Itens_Pedido_Compra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }    

    public function get_data() {
        $this->db
                ->select('id,id_pedido,id_fornecedor,obs,status')
                ->from('many_itens_pedido_compra')
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }
    
    public function get_data_all() {
        $this->db
                ->select('many_itens_pedido_compra.id,many_itens_pedido_compra.id_pedido,many_itens_pedido_compra.id_fornecedor,many_itens_pedido_compra.obs,many_itens_pedido_compra.status,many_fornecedor.nome')
                ->from('many_itens_pedido_compra')
                ->join('many_fornecedor', 'many_fornecedor.id = many_itens_pedido_compra.id_fornecedor')
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }

    public function get_data_only($id) {
        $this->db
                ->from('many_itens_pedido_compra')
                ->where('id_pedido', $id)
                ->order_by('id_pedido', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('many_itens_pedido_compra', $data);
    }
    
    public function insert_a_lot($data) {
        $this->db->insert_batch('many_itens_pedido_compra', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('many_itens_pedido_compra', $data);
    }

}
