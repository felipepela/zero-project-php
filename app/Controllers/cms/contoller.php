<?php

class Controlador extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        Usuario::logado();
        $usuario = $this->session->userdata("usuario");
        $this->data["usuario"] = $usuario;
    }

    public function index($entidade) {
        $this->data["lista"] = Entidade::listar($entidade);
        $this->data["entidade"] = Entidade::seleciona_entidade($entidade);

        $this->load->view('cms/views/listar', $this->data);
    }

    public function cadastro($entidade) {
        $entidade = Entidade::seleciona_entidade($entidade);

        foreach ($entidade as $obj):
            if ($obj->tipo == "lista"):
                $obj->lista = Entidade::seleciona_lista($obj->lista);
            endif;
        endforeach;

        $this->data["entidade"] = $entidade;
        $this->load->view('cms/views/cadastro', $this->data);
    }

    public function salvar() {
        if (!$_POST):
            return false;
        endif;
        $entidade = $this->input->post("entidade");
        $entidade = Entidade::seleciona_entidade($entidade);


        $dados = array();
        foreach ($entidade as $campo):
            if ($campo->tipo == 'video') {
                $dados[$campo->campo] = get_youtube_code($this->input->post($campo->campo));
            } else if ($campo->tipo == 'imagem') {
                if (!empty($_FILES[$campo->campo]["tmp_name"])):
                    $imagem = Entidade::adiciona_imagem($campo->campo);
                    if (is_array($imagem)):
                        $this->session->set_flashdata('msg_erro', $imagem["error"]);
                        redirect('cms/gerenciar/' . $entidade[0]->nome);
                    else:
                        $dados[$campo->campo] = $imagem;
                    endif;
                endif;
            } else if ($campo->tipo != 'imagem') {
                $dados[$campo->campo] = $this->input->post($campo->campo);
            }
        endforeach;

        unset($dados[$entidade[0]->campo]);
        Entidade::gravar($entidade, $dados);
        redirect('cms/gerenciar/' . $entidade[0]->nome);
    }

    public function editar($entidade, $ID) {
        $entidade = Entidade::seleciona_entidade($entidade);
        $objeto = Entidade::carregar_objeto($entidade[0]->nome, $ID, $entidade[0]->campo);

        foreach ($entidade as $obj):
            if ($obj->tipo == "lista"):
                $obj->lista = Entidade::seleciona_lista($obj->lista);
            endif;
        endforeach;

        $this->data["objeto"] = $objeto;
        $this->data["entidade"] = $entidade;
        $this->load->view('cms/views/editar', $this->data);
    }

    public function modificar() {
        if (!$_POST):
            return false;
        endif;
        $entidade = $this->input->post("entidade");
        $entidade = Entidade::seleciona_entidade($entidade);

        reset($_POST);
        $identificador = key($_POST);
        $ID = $this->input->post($identificador);
        foreach ($entidade as $campo):
            $dados = array();
            if ($campo->campo != $identificador):
                if ($campo->tipo != 'imagem'):
                    $dados[$campo->campo] = $this->input->post($campo->campo);
                    Entidade::modificar($entidade, $dados, $ID, $identificador);
                endif;
            endif;
            if ($campo->tipo == 'imagem'):
                if (!empty($_FILES[$campo->campo]["tmp_name"])):
                    $imagem = Entidade::adiciona_imagem($campo->campo);
                    if (is_array($imagem)):
                        $this->session->set_flashdata('msg_erro', $imagem["error"]);
                        redirect('cms/gerenciar/' . $entidade[0]->nome);
                    else:
                        $dados[$campo->campo] = $imagem;
                    endif;
                    Entidade::modificar($entidade, $dados, $ID, $identificador);
                endif;
            endif;

            if ($campo->tipo == 'video'):
                $video = $dados[$campo->campo];
                $dados[$campo->campo] = get_youtube_code($video);
                Entidade::modificar($entidade, $dados, $ID, $identificador);
            endif;
        endforeach;
        redirect('cms/gerenciar/' . $entidade[0]->nome);
    }

    public function remover($entidade, $ID) {
        $entidade = Entidade::seleciona_entidade($entidade);
        $objeto = Entidade::carregar_objeto($entidade[0]->nome, $ID, $entidade[0]->campo);
        $this->data["objeto"] = $objeto;
        $this->data["entidade"] = $entidade;
        $dados["removido"] = 1;
        Entidade::modificar($entidade, $dados, $ID, $entidade[0]->campo);

        redirect('cms/gerenciar/' . $entidade[0]->nome);
    }

}
