<?php

class Newsletters extends CI_Controller
{

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('newsletter');
        $this->data["configs"] = Configuracao::seleciona_configuracoes_site();
    }

    public function exportar() {
        $this->data['newsletter'] = Newsletter::todos();
        $this->load->view('cms/newsletter/xls', $this->data);
    }



}