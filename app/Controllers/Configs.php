<?php

namespace App\Controllers;

use App\Models\configModel;
use App\Models\UserModel;

Class Configs extends BaseController {
    public $data;
    public $session;

    public function __construct() {
        $this->session = session();
        helper('html');
        helper('Helpers\utilitys');

        $this->data["menu"] = "configs";
        $this->data["user"] = $this->session->get('user');
    } 

    public function index() {
        $configModel = new configModel();
        $this->data["configs"] = $configModel->asObject()->findAll();        
        return view('cms/configs/configs', $this->data);
    }

    public function add() {
        return view("cms/configs/add", $this->data);
    }

    public function save() {
        $data = $this->request->getPost();
        $configModel = new configModel();
        $configModel->save($data);
        $configID = $configModel->getInsertID();
        $this->session->setFlashdata('msg_acerto', 'Config created successfully');
        return redirect()->to('configs/modify/' . $configID);
    }

    public function modify($configID = NULL) {
        if($configID):
            $configModel = new configModel();
            $config = $configModel->asObject()->find($configID);
            $this->data["config"] = $config;
            return view("cms/configs/modify", $this->data);
        else:
            $data = $this->request->getPost();
            
            if($data["type"] === "image"){
                $image = $this->request->getFile('value');
                if($image->isValid()){
                    $newName = $image->getRandomName();
                    $image->move('uploads/', $newName);
                    $data["value"] = $newName;
                }
            }
            
            $configModel = new configModel();
            if($configModel->save($data)){
                $this->session->setFlashdata('msg_acerto', 'Config modified successfully');
            } else {
                $this->session->setFlashdata('msg_erro', "Ops, try again please.");
            }
            return redirect()->to("./configs/modify/" . $data["configID"]);
        endif;
    }

    public function remove($configID) {
        $configModel = new configModel();
        $configModel->delete($configID);
        $this->session->setFlashdata('msg_acerto', 'config deleted successfully');
        return redirect()->to("configs");
    }

}
