<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EnderecoColaborador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $data = array(
            "scripts" => array(
                "end_colaborador/end_colaborador.js"
            )
        );
        $this->template->show('end_colaborador.php', $data);
    }

    public function listagem() {
        if (!$this->input->is_ajax_request()) {
            exit('só ajax');
        }
        $this->load->model("Many_Colaborador_Enderecos_model");
        $colaboradores = $this->Many_Colaborador_Enderecos_model->get_data();
        $data = array();
        $tt = 1; //mostra contagem na datatable
        $tb = 0; //carrega campos de footer do datatable        
        foreach ($colaboradores as $value) {
            $row = array();
            $row[] = $value->nome;
            $row[] = $value->cep;
            $row[] = $value->rua;
            $row[] = $value->numero;
            $row[] = $value->cidade;
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'enderecoColaborador/redireciona?id=' . $value->id . '">Editar</a>';
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
                $dados['cep'] = '';
                $dados['rua'] = '';
                $dados['numero'] = '';
                $dados['cidade'] = '';
                $dados['status'] = '1';
            } else {
                $incluir = 2;
                $this->load->model("Many_Colaborador_Enderecos_model");
                $dadosend = $this->Many_Colaborador_Enderecos_model->get_data_only($id);
                $dados['id'] = $dadosend[0]->id;
                $dados['id_many_colaborador'] = $dadosend[0]->id_many_colaborador;
                $dados['cep'] = $dadosend[0]->cep;
                $dados['rua'] = $dadosend[0]->rua;
                $dados['numero'] = $dadosend[0]->numero;
                $dados['cidade'] = $dadosend[0]->cidade;
                $dados['status'] = $dadosend[0]->status;
            }
            $data = array(
                "scripts" => array(
                    "end_colaborador/end_colaborador_crud.js"
                ),
                "id" => $dados['id'],
                "incluir" => $incluir,
                "id_many_colaborador" => $dados['id_many_colaborador'],
                "cep" => $dados['cep'],
                "rua" => $dados['rua'],
                "numero" => $dados['numero'],
                "cidade" => $dados['cidade'],
                "colaboradores" => $colaboradores,
                "status" => $dados['status']
            );
            $this->template->show('end_colaborador_crud.php', $data);
        } else {
            $this->load->view('home.php');
        }
    }

    public function salva_dados() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $insert = array();
        $insert['id_many_colaborador'] = $this->input->post("id_many_colaborador");
        $insert['cep'] = $this->input->post("cep");
        $insert['rua'] = $this->input->post("rua");
        $insert['numero'] = $this->input->post("numero");
        $insert['cidade'] = $this->input->post("cidade");
        $insert['status'] = $this->input->post("status");

        $this->load->model("Many_Colaborador_Enderecos_model");
        if ($this->input->post("incluir") === '1') {
            $this->Many_Colaborador_Enderecos_model->insert($insert);
            echo 'salvo';
        } else {
            $this->Many_Colaborador_Enderecos_model->update($this->input->post("id"), $insert);
            echo 'salvo';
        }
    }

}
