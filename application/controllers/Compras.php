<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "compras/compras.js"
            )
        );
        $this->template->show('compras.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Pedidos_Compra_model");
        $comprases = $this->Many_Pedidos_Compra_model->get_data_all();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($comprases as $value) {
            $row = array();
            $row[] = $value->id_pedido;
            $row[] = $value->nome;
            $row[] = $value->status == 1 ? 'Ativo' : 'Inativo';
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'compras/redireciona?id=' . $value->id . '">Editar</a>';
            $data[] = $row;
            ++$tt;
            ++$tb;
        }
        $json = array(
            "recordsTotal" => $tb,
            "recordsFiltered" => $tb,
            "data" => $data
        );
        echo json_encode($json);
    }

    public function redireciona() {
        if ($this->session->userdata("ip")) {
            $this->load->model("Many_Fornecedor_model");
            $this->load->model("Many_Produtos_model");
            $this->load->model("Many_Pedidos_Compra_model");
            $data = array(
                "scripts" => array(
                    "compras/compras_crud.js"
                ),
                "id_pedido" => bcadd(1000, (int) $this->Many_Pedidos_Compra_model->get_next_id(), 0),
                "fornecedor" => $this->Many_Fornecedor_model->get_data_active(),
                "produtos" => $this->Many_Produtos_model->get_data_active()
            );
            $this->template->show('compras_crud.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function salva_dados() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = $insert_pedido = $pedido_insere = array();
        $insert['id_pedido'] = $this->input->post("id_pedido");
        $insert['id_fornecedor'] = $this->input->post("id_fornecedor");
        $insert['obs'] = $this->input->post("obs");
        $insert['status'] = $this->input->post("status");
        $this->load->model("Many_Pedidos_Compra_model");
        $this->load->model("Many_Itens_Pedido_Compra_model");
        $this->Many_Pedidos_Compra_model->insert($insert);
        $i = 0;

        foreach ($this->input->post("id_produto") as $value) {
            $insert_pedido['id_pedido'] = $insert['id_pedido'];
            $insert_pedido['id_produto'] = $value[$i];
            $insert_pedido['quantidade'] = $this->input->post("quantidade")[$i];
            $valor_unit = str_replace('.', '', $this->input->post("valor"))[$i];
            $valor_unitario = str_replace(',', '.', $valor_unit);
            $insert_pedido['valor_unitario'] = $valor_unitario;
            array_push($pedido_insere, $insert_pedido);
        }

        $this->Many_Itens_Pedido_Compra_model->insert_a_lot($pedido_insere);
        echo 'salvo';
    }

}
