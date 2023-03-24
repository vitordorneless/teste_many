<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Many_Pedidos_Compra_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }    

    public function get_data() {
        $this->db
                ->select('id,id_pedido,id_fornecedor,obs,status')
                ->from('many_pedidos_compra')
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }
    
    public function get_data_all() {
        $this->db
                ->select('many_pedidos_compra.id,many_pedidos_compra.id_pedido,many_pedidos_compra.id_fornecedor,many_pedidos_compra.obs,many_pedidos_compra.status,many_fornecedor.nome')
                ->from('many_pedidos_compra')
                ->join('many_fornecedor', 'many_fornecedor.id = many_pedidos_compra.id_fornecedor')
                ->order_by('nome', 'ASC');

        return $this->db->get()->result();
    }

    public function get_data_only($id) {
        $this->db
                ->from('many_pedidos_compra')
                ->where('id', $id)
                ->order_by('id_pedido', 'ASC');
        return $this->db->get()->result();
    }
    
    public function get_next_id() {
        $this->db
                ->select('if (MAX(id_pedido) <> NULL,MAX(id_pedido),0) as id_pedido')
                ->from('many_pedidos_compra')
                
                ->order_by('id_pedido', 'ASC');
        return $this->db->get()->result();
    }

    public function insert($data) {
        $this->db->insert('many_pedidos_compra', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('many_pedidos_compra', $data);
    }

}
