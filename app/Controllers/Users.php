<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ConfigModel;

Class Users extends BaseController {
    public $data;
    public $session;

    public function __construct() {
        $this->session = session();
        helper('html');
        helper('Helpers\utilitys');

        $this->data["menu"] = "users";
        $this->data["user"] = $this->session->get('user');
    } 

    public function index() {
        $users = new UserModel();
        $this->data["users"] = $users->asObject()->findAll();
        return view('cms/users/users', $this->data);
    }

    public function add() {
        return view("cms/users/add", $this->data);
    }

    public function save() {
        $data = $this->request->getPost();

        $picture = $this->request->getFile('picture');
        if($picture->isValid()){
            $newName = $picture->getRandomName();
            $picture->move('uploads/users/', $newName);
            $data["picture"] = $newName;
        }

        $userModel = new UserModel();
        $userModel->save($data);
        $userID = $userModel->getInsertID();
        $this->session->setFlashdata('msg_acerto', 'User added successfully');
        return redirect()->to('users/modify/' . $userID);        
    }

    public function modify($userID = NULL) {
        if($userID):
            $userModel = new UserModel();
            $user = $userModel->asObject()->find($userID);
            $this->data["user"] = $user;
            return view("cms/users/modify", $this->data);
        else:
            $data = $this->request->getPost();
            
            if (empty($data["password"])):
                unset($data["password"]);
            endif;

            $picture = $this->request->getFile('picture');
            if($picture->isValid()){
                $newName = $picture->getRandomName();
                $picture->move('uploads/users/', $newName);
                $data["picture"] = $newName;
            }

            $userModel = new UserModel();
            if($userModel->save($data)){
                $this->session->setFlashdata('msg_acerto', 'User modified successfully');
            } else {
                $this->session->setFlashdata('msg_erro', "Ops, try again please.");
            }
            return redirect()->to("./users/modify/" . $data["userID"]);
        endif;
    }

    public function remove($userID) {
        $userModel = new UserModel();
        $userModel->delete($userID);
        $this->session->setFlashdata('msg_acerto', 'User deleted successfully');
        return redirect()->to("users");
    }

}
