<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Minds extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function index() {
        $this->load->model("Many_Colaborador_model");
        $this->load->model("Many_Permissoes_model");
        $id_user = $this->Many_Colaborador_model->get_data_login($this->session->userdata("nome"));
        $permissoes = $this->Many_Permissoes_model->get_data_only_user($id_user[0]->id);
        $this->session->set_userdata('colaborador', $permissoes[0]->colaborador);
        $this->session->set_userdata('endcolaborador', $permissoes[0]->endcolaborador);
        $this->session->set_userdata('fornecedor', $permissoes[0]->fornecedor);
        $this->session->set_userdata('produtos', $permissoes[0]->produtos);
        $this->session->set_userdata('compras', $permissoes[0]->compras);
        $this->template->show('dash.php');        
    }

}
