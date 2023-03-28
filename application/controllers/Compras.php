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
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'compras/redireciona_pedido?id=' . $value->id . '">Editar</a>';
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
    
    public function redireciona_item() {
        if ($this->session->userdata("ip")) {
            $id = $this->input->get('id');
            
            $this->load->model("Many_Produtos_model");            
            $this->load->model("Many_Itens_Pedido_Compra_model");
            $id_pedido = $this->Many_Itens_Pedido_Compra_model->get_data_only_item($id)->result_array()[0];

            $data = array(
                "scripts" => array(
                    "compras/itens_editar.js"
                ),
                "id" => $id_pedido['id'],
                "id_pedido" => $id_pedido['id_pedido'],
                "quantidade" => $id_pedido['quantidade'],
                "valor_unitario" => $id_pedido['valor_unitario']
            );
            $this->template->show('itens_editar.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function redireciona_pedido() {
        if ($this->session->userdata("ip")) {
            $id = $this->input->get('id');
            $this->load->model("Many_Fornecedor_model");
            $this->load->model("Many_Produtos_model");
            $this->load->model("Many_Pedidos_Compra_model");
            $this->load->model("Many_Itens_Pedido_Compra_model");
            $id_pedido = $this->Many_Pedidos_Compra_model->get_data_only_edit($id)->result_array()[0];

            $data = array(
                "scripts" => array(
                    "compras/compras_editar.js"
                ),
                "id" => $id_pedido['id'],
                "id_pedido" => $id_pedido['id_pedido'],
                "id_fornecedor" => $id_pedido['id_fornecedor'],
                "obs" => $id_pedido['obs'],
                "status" => $id_pedido['status'],
                "fornecedor" => $this->Many_Fornecedor_model->get_data_active(),
                "itens" => $this->Many_Itens_Pedido_Compra_model->get_data_only($id_pedido['id_pedido']),
                "produtos" => $this->Many_Produtos_model->get_data_active()
            );
            $this->template->show('compras_editar.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function redireciona() {
        if ($this->session->userdata("ip")) {
            $this->load->model("Many_Fornecedor_model");
            $this->load->model("Many_Produtos_model");
            $this->load->model("Many_Pedidos_Compra_model");
            $id_pedido = $this->Many_Pedidos_Compra_model->get_next_id()->result_array()[0];

            $data = array(
                "scripts" => array(
                    "compras/compras_crud.js"
                ),
                "id_pedido" => $id_pedido['id_pedido'],
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
            $insert_pedido['id_produto'] = $value;
            $insert_pedido['quantidade'] = $this->input->post("quantidade")[$i];
            $valor_unit = str_replace('.', '', $this->input->post("valor"))[$i];
            $valor_unitario = str_replace(',', '.', $valor_unit);
            $insert_pedido['valor_unitario'] = $valor_unitario;
            array_push($pedido_insere, $insert_pedido);
            ++$i;
        }

        $this->Many_Itens_Pedido_Compra_model->insert_a_lot($pedido_insere);
        unset($insert);
        unset($insert_pedido);
        unset($pedido_insere);
        echo 'salvo';
    }

    public function salva_dados_edit() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = $insert_pedido = $pedido_insere = array();
        $insert['id_pedido'] = $this->input->post("id_pedido");
        $insert['id_fornecedor'] = $this->input->post("id_fornecedor");
        $insert['obs'] = $this->input->post("obs");
        $insert['status'] = $this->input->post("status");
        $this->load->model("Many_Pedidos_Compra_model");
        $this->Many_Pedidos_Compra_model->update($this->input->post("id"), $insert);
        echo 'salvo';
    }
    
    public function salva_item_edit() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = array();
        $insert['id_pedido'] = $this->input->post("id_pedido");        
        $insert['quantidade'] = $this->input->post("quantidade");
        $valor_unit = str_replace('.', '', $this->input->post("valor_unitario"));
        $valor_unitario = str_replace(',', '.', $valor_unit);
        $insert['valor_unitario'] = $valor_unitario;        
        $this->load->model("Many_Itens_Pedido_Compra_model");
        $this->Many_Itens_Pedido_Compra_model->update($this->input->post("id"), $insert);
        echo 'salvo';
    }

}
