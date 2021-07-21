<?php

class login extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->data["configs"] = Configuracao::seleciona_configuracoes_site();
        $usuario = $this->session->userdata("usuario");
        $this->data["usuario"] = $usuario;
    }

    public function index() {
        $this->load->view('cms/login', $this->data);
    }

    public function esqueci_a_senha() {
        $this->load->view('cms/esqueci_a_senha', $this->data);
    }

  

}
