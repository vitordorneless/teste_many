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
        $this->session->set_userdata('ip', $this->pegar_ip());
        $this->load->model("Many_Colaborador_model");        
        $result = $this->Many_Colaborador_model->login_data($login, md5(sha1($pass)));        

        if ($result === 1) {
            if ($this->tentativas() >= 3) {
                $this->session->set_userdata('tentativas', 0);
                $bloqueio = $this->bloqueio();
                $agora = new DateTime();
                $fim = new DateTime($bloqueio['fim']);
                if ($fim <= $agora) {
                    $json["status"] = 1;
                    $json["inicio_bloqueio"] = $bloqueio['inicio'];
                    $json["fim_bloqueio"] = $bloqueio['fim'];
                } else {
                    $json["status"] = 2;
                    $json["inicio_bloqueio"] = 0;
                    $json["fim_bloqueio"] = 0;
                }
            } else {
                $this->session->set_userdata('nome', $login);
                $json["status"] = 1;
            }
        } else {
            $json["status"] = 0;
            $json["tentar_logar"] = $this->tentativas();
            $this->session->set_userdata('tentativas', $json["tentar_logar"]);
            $this->session->set_userdata('ip', $this->pegar_ip());
        }
        echo json_encode($json);
    }

    public function tentativas() {
        $contador = 1;
        $tentativas = $this->session->userdata('tentativas');
        return bcadd($tentativas, $contador, 0);
    }

    public function pegar_ip() {
        return $this->input->ip_address();
    }

    public function bloqueio() {
        $inicio = new DateTime();
        $fim = $inicio->add(new DateInterval('PT45M'));
        $bloqueio = array();
        $bloqueio['inicio'] = $inicio;
        $bloqueio['fim'] = $fim;
        return $bloqueio;
    }

}
