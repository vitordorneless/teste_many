<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "colaborador/colaborador.js"
            )
        );
        $this->template->show('colaborador.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Colaborador_model");
        $colaboradores = $this->Many_Colaborador_model->get_data();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($colaboradores as $value) {
            $row = array();
            $row[] = $value->nome;
            $row[] = $value->login;
            $row[] = $value->CPF;
            $row[] = $value->status == 1 ? 'Ativo' : 'Inativo';
            $row[] = $value->status == 1 ? '<a class="btn btn-primary" href="' . base_url() . 'colaborador/redireciona?id=' . $value->id . '">Editar</a>' : '<strong>Não pode Alterar</strong>';
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
            $dados_colaboradores = array();
            if ($id == '0') {
                $id = 0;
                $incluir = 1;
                $dados_colaboradores['id'] = '';
                $dados_colaboradores['nome'] = '';
                $dados_colaboradores['login'] = '';
                $dados_colaboradores['CPF'] = '';
                $dados_colaboradores['genero'] = '';
                $dados_colaboradores['estado_civil'] = '';
                $dados_colaboradores['status'] = '1';
            } else {
                $incluir = 2;
                $this->load->model("Many_Colaborador_model");
                $dados = $this->Many_Colaborador_model->get_data_only($id);
                $dados_colaboradores['id'] = $dados[0]->id;
                $dados_colaboradores['nome'] = $dados[0]->nome;
                $dados_colaboradores['login'] = $dados[0]->login;
                $dados_colaboradores['CPF'] = $dados[0]->CPF;
                $dados_colaboradores['genero'] = $dados[0]->genero;
                $dados_colaboradores['estado_civil'] = $dados[0]->estado_civil;
                $dados_colaboradores['status'] = $dados[0]->status;
            }
            $data = array(
                "scripts" => array(
                    "colaborador/colaborador_crud.js"
                ),
                "id" => $dados_colaboradores['id'],
                "incluir" => $incluir,
                "nome" => $dados_colaboradores['nome'],
                "login" => $dados_colaboradores['login'],
                "CPF" => $dados_colaboradores['CPF'],
                "genero" => $dados_colaboradores['genero'],
                "estado_civil" => $dados_colaboradores['estado_civil'],
                "status" => $dados_colaboradores['status']
            );
            $this->template->show('colaborador_crud.php', $data);
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
        $insert['CPF'] = $this->input->post("CPF");
        $insert['genero'] = $this->input->post("genero");
        $insert['estado_civil'] = $this->input->post("estado_civil");
        $insert['status'] = $this->input->post("status");

        $this->load->model("Many_Colaborador_model");
        if ($this->input->post("incluir") === '1') {
            $insert['pass'] = md5(sha1('102030'));
            $this->Many_Colaborador_model->insert($insert);
            echo 'salvo';
        } else {
            $this->Many_Colaborador_model->update($this->input->post("id"), $insert);
            echo 'salvo';
        }
    }

}
