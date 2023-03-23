<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    public function ajax_login() {
        if (!$this->input->is_ajax_request())
            exit('Nenhum acesso permitido');

        $json = array();
        $json["status"] = 0;

        $login = $this->input->post("user");
        $pass = $this->input->post("pass");

        $this->load->model("Many_Colaborador_model");
        $result = $this->Many_Colaborador_model->login_data($login, md5(sha1($pass)));
        echo $this->input->ip_address();

        if ($result === 1) {
            $this->session->set_userdata('nome', $login);
            $this->session->set_userdata('tentativas', 0);
            $json["status"] = 1;
        } else {
            $contador = 1;
            $tentativas = $this->session->userdata('tentativas');
            $json["status"] = 0;
            $json["tentar_logar"] = bcadd($tentativas, $contador, 0);
            $this->session->set_userdata('tentativas', $json["tentar_logar"]);
        }
        echo json_encode($json);
    }

}
