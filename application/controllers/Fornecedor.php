<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "fornecedor/fornecedor.js"
            )
        );
        $this->template->show('fornecedor.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Fornecedor_model");
        $fornecedores = $this->Many_Fornecedor_model->get_data();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($fornecedores as $value) {
            $row = array();
            $row[] = $value->nome;
            $row[] = $value->login;
            $row[] = $value->CNPJ;
            $row[] = $value->status == 1 ? 'Ativo' : 'Inativo';
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'fornecedor/redireciona?id=' . $value->id . '">Editar</a>';
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
            $dados_fornecedores = array();
            if ($id == '0') {
                $id = 0;
                $incluir = 1;
                $dados_fornecedores['id'] = '';
                $dados_fornecedores['nome'] = '';
                $dados_fornecedores['login'] = '';
                $dados_fornecedores['CNPJ'] = '';
                $dados_fornecedores['telefone'] = '';
                $dados_fornecedores['celular'] = '';
                $dados_fornecedores['status'] = '1';
            } else {
                $incluir = 2;
                $this->load->model("Many_Fornecedor_model");
                $dados = $this->Many_Fornecedor_model->get_data_only($id);
                $dados_fornecedores['id'] = $dados[0]->id;
                $dados_fornecedores['nome'] = $dados[0]->nome;
                $dados_fornecedores['login'] = $dados[0]->login;
                $dados_fornecedores['CNPJ'] = $dados[0]->CNPJ;
                $dados_fornecedores['telefone'] = $dados[0]->telefone;
                $dados_fornecedores['celular'] = $dados[0]->celular;
                $dados_fornecedores['status'] = $dados[0]->status;
            }
            $data = array(
                "scripts" => array(
                    "fornecedor/fornecedor_crud.js"
                ),
                "id" => $dados_fornecedores['id'],
                "incluir" => $incluir,
                "nome" => $dados_fornecedores['nome'],
                "login" => $dados_fornecedores['login'],
                "CNPJ" => $dados_fornecedores['CNPJ'],
                "telefone" => $dados_fornecedores['telefone'],
                "celular" => $dados_fornecedores['celular'],
                "status" => $dados_fornecedores['status']
            );
            $this->template->show('fornecedor_crud.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function salva_dados() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = array();
        $insert['nome'] = $this->input->post("nome");
        $insert['login'] = $this->input->post("login");
        $insert['CNPJ'] = $this->input->post("CNPJ");
        $insert['telefone'] = $this->input->post("telefone");
        $insert['celular'] = $this->input->post("celular");
        $insert['status'] = $this->input->post("status");

        $this->load->model("Many_Fornecedor_model");
        if ($this->input->post("incluir") === '1') {
            $insert['pass'] = md5(sha1('102030'));
            $this->Many_Fornecedor_model->insert($insert);
            echo 'salvo';
        } else {
            $this->Many_Fornecedor_model->update($this->input->post("id"), $insert);
            echo 'salvo';
        }
    }

}
