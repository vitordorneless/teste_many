<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Permissoes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "permissoes/permissoes.js"
            )
        );
        $this->template->show('permissoes.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Permissoes_model");
        $colaboradores = $this->Many_Permissoes_model->get_data();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($colaboradores as $value) {
            $row = array();
            $row[] = $value->nome;
            $row[] = $value->colaborador == 1 ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-sign-do-not-enter"></i>';
            $row[] = $value->endcolaborador == 1 ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-sign-do-not-enter"></i>';
            $row[] = $value->fornecedor == 1 ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-sign-do-not-enter"></i>';
            $row[] = $value->produtos == 1 ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-sign-do-not-enter"></i>';
            $row[] = $value->compras == 1 ? '<i class="bi bi-check-lg"></i>' : '<i class="bi bi-sign-do-not-enter"></i>';
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'permissoes/redireciona?id=' . $value->id . '">Editar</a>';
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
            $this->load->model("Many_Colaborador_model");
            $colaboradores = $this->Many_Colaborador_model->get_data();
            $incluir = NULL;
            $dados = array();
            if ($id == '0') {
                $id = 0;
                $incluir = 1;
                $dados['id'] = '';
                $dados['id_many_colaborador'] = '';
                $dados['colaborador'] = '';
                $dados['endcolaborador'] = '';
                $dados['fornecedor'] = '';
                $dados['produtos'] = '';
                $dados['compras'] = '';                
            } else {
                $incluir = 2;
                $this->load->model("Many_Permissoes_model");
                $dadosend = $this->Many_Permissoes_model->get_data_only($id);
                $dados['id'] = $dadosend[0]->id;
                $dados['id_many_colaborador'] = $dadosend[0]->id_many_colaborador;
                $dados['colaborador'] = $dadosend[0]->colaborador;
                $dados['endcolaborador'] = $dadosend[0]->endcolaborador;
                $dados['fornecedor'] = $dadosend[0]->fornecedor;
                $dados['produtos'] = $dadosend[0]->produtos;
                $dados['compras'] = $dadosend[0]->compras;
            }
            $data = array(
                "scripts" => array(
                    "permissoes/permissoes_crud.js"
                ),
                "id" => $dados['id'],
                "incluir" => $incluir,
                "id_many_colaborador" => $dados['id_many_colaborador'],
                "colaborador" => $dados['colaborador'],
                "endcolaborador" => $dados['endcolaborador'],
                "fornecedor" => $dados['fornecedor'],
                "produtos" => $dados['produtos'],
                "colaboradores" => $colaboradores,
                "compras" => $dados['compras']
            );
            $this->template->show('permissoes_crud.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function salva_dados() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = array();
        $insert['id_many_colaborador'] = $this->input->post("id_many_colaborador");
        $insert['colaborador'] = $this->input->post("colaborador");
        $insert['endcolaborador'] = $this->input->post("endcolaborador");
        $insert['fornecedor'] = $this->input->post("fornecedor");
        $insert['produtos'] = $this->input->post("produtos");
        $insert['compras'] = $this->input->post("compras");

        $this->load->model("Many_Permissoes_model");
        if ($this->input->post("incluir") === '1') {
            $this->Many_Permissoes_model->insert($insert);
            echo 'salvo';
        } else {
            $this->Many_Permissoes_model->update($this->input->post("id"), $insert);
            echo 'salvo';
        }
    }

}
