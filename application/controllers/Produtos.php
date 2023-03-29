<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "produtos/produtos.js"
            )
        );
        $this->template->show('produtos.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Produtos_model");
        $produtoses = $this->Many_Produtos_model->get_data();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($produtoses as $value) {
            $row = array();
            $row[] = $value->nome;
            $row[] = $value->unidade;
            $row[] = 'R$' . ' ' . number_format($value->valor_unitario, 2, ",", ".");
            $row[] = $value->status == 1 ? 'Ativo' : 'Inativo';
            $row[] = $value->status == 1 ? '<a class="btn btn-primary" href="' . base_url() . 'produtos/redireciona?id=' . $value->id . '">Editar</a>' : '<strong>Não pode Alterar</strong>';
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
            $id = $this->input->get('id');
            $incluir = NULL;
            $dados_produtos = array();
            $this->load->model("Many_Fornecedor_model");

            if ($id == '0') {
                $id = 0;
                $incluir = 1;
                $dados_produtos['id'] = '';
                $dados_produtos['nome'] = '';
                $dados_produtos['unidade'] = '';
                $dados_produtos['valor_unitario'] = '';
                $dados_produtos['id_fornecedor'] = '';
                $dados_produtos['status'] = '1';
            } else {
                $incluir = 2;
                $this->load->model("Many_Produtos_model");
                $dados = $this->Many_Produtos_model->get_data_only($id);
                $dados_produtos['id'] = $dados[0]->id;
                $dados_produtos['nome'] = $dados[0]->nome;
                $dados_produtos['unidade'] = $dados[0]->unidade;
                $dados_produtos['valor_unitario'] = $dados[0]->valor_unitario;
                $dados_produtos['id_fornecedor'] = $dados[0]->id_fornecedor;
                $dados_produtos['status'] = $dados[0]->status;
            }
            $data = array(
                "scripts" => array(
                    "produtos/produtos_crud.js"
                ),
                "id" => $dados_produtos['id'],
                "incluir" => $incluir,
                "nome" => $dados_produtos['nome'],
                "unidade" => $dados_produtos['unidade'],
                "valor_unitario" => $dados_produtos['valor_unitario'],
                "id_fornecedor" => $dados_produtos['id_fornecedor'],
                "fornecedor" => $this->Many_Fornecedor_model->get_data(),
                "status" => $dados_produtos['status']
            );
            $this->template->show('produtos_crud.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function salva_dados() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $valor_unit = str_replace('.', '', $this->input->post("valor_unitario"));
        $valor_unitario = str_replace(',', '.', $valor_unit);

        $insert = array();
        $insert['nome'] = $this->input->post("nome");
        $insert['unidade'] = $this->input->post("unidade");
        $insert['valor_unitario'] = $valor_unitario;
        $insert['id_fornecedor'] = $this->input->post("id_fornecedor");
        $insert['status'] = $this->input->post("status");

        unset($valor_unit);
        unset($valor_unitario);

        $this->load->model("Many_Produtos_model");
        if ($this->input->post("incluir") === '1') {
            $this->Many_Produtos_model->insert($insert);
            echo 'salvo';
        } else {
            $this->Many_Produtos_model->update($this->input->post("id"), $insert);
            echo 'salvo';
        }
    }

}
