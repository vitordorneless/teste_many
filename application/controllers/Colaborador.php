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
            $row[] = '<a class="btn btn-primary" href="' . base_url() . 'colaborador/resgate?id=' . $value->id . '">Editar</a>';
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

}
