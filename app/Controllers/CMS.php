<?php

namespace App\Controllers;

use App\Models\UserModel;

Class CMS extends BaseController {

    public $data = [];
    public $session = null;


    public function __construct() {
        $this->session = session();

        helper('html');
        helper('Helpers\utilitys');
    }

    public function index() {
        return view('cms/login', $this->data);
    }

    public function login() {
        if (!$_POST):
            return false;
        endif;
        $data = $this->request->getPost();
        
        $userModel = new UserModel();
        if ($userModel->login($data["email"], $data["password"])) {
            return redirect()->to('./CMS/home');
        } else {
            $this->session->setFlashdata('msg_erro', "Ops, wrong credentials.");
            return redirect()->to('./CMS/index');
        }
    }

    public function home(){
        $userModel = new UserModel();
        if(!$userModel::is_logged_in()){
            $this->session->setFlashdata('msg_erro', "Ops, you need to login");
            return redirect()->to('./CMS/index');
        }

        $this->data["user"] = $this->session->get('user');
        return view('cms/home', $this->data); 
    }

    public function logout() {
        $this->session->remove('user');
        $this->session->setFlashdata('msg_erro', "Bye, see you later!");
        return redirect()->to('./CMS/index');
    }


}
