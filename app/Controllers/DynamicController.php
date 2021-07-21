<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ConfigModel;
use App\Models\DynamicModel;

Class DynamicController extends BaseController {

    public $data;
    public $session;

    public function __construct() {
        $this->session = session();
        helper('html');
        helper('Helpers\utilitys');

        $this->data["user"] = $this->session->get('user');
    }

    public function index($entity) {
        $dynamicModel = new DynamicModel();
        $this->data["data"] = $dynamicModel->list($entity);
        $this->data["entity"] = $dynamicModel->where('name', $entity)->asObject()->findAll();

        if(!$this->data["entity"]){
            $this->session->setFlashdata('msg_erro', "The entity was not created in database.");
            return redirect()->to('cms/home');
        }

        return view('cms/DynamicViews/list', $this->data);
    }

    public function add($entity) {
        $dynamicModel = new DynamicModel();
        $entity = $dynamicModel->where('name', $entity)->asObject()->findAll();
        

        foreach ($entity as $obj):
            if ($obj->type == "list"):
                if(!$obj->list){
                    $this->session->setFlashdata('msg_erro', "The list object was no set in database");
                    return redirect()->to('DynamicController/index/'.$entity);
                }
                $obj->list = $dynamicModel->return_list($obj->list);
            endif;
        endforeach;

        $this->data["entity"] = $entity;
        return view('cms/DynamicViews/add', $this->data);
    }

    
    public function save() {
        if (!$_POST):
            return false;
        endif;

        $entity_name = $this->request->getPost("entity");
        $dynamicModel = new DynamicModel();
        $entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();

        $data = array();
        foreach ($entity as $field):
            if ($field->type == 'video') {
                $data[$field->field] = get_youtube_code($this->request->getPost($field->field));
            } else if ($field->type == 'image') {
                $picture = $this->request->getFile($field->field);
                if($picture->isValid()){
                    $newName = $picture->getRandomName();
                    $picture->move('uploads/', $newName);
                    $data[$field->field] = $newName;
                }
            } else if ($field->type != 'image') {
                $data[$field->field] = $this->request->getPost($field->field);
            }
        endforeach;

        $dynamicModel->record_data($entity_name, $data);
        return redirect()->to('manage/' . $entity_name);
    }

    
    public function modify($entity_name, $ID) {
        $dynamicModel = new DynamicModel();
        $entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();

        $object = $dynamicModel->load_object($entity_name, $ID, $entity[0]->field);

        foreach ($entity as $obj):
            if ($obj->type == "list"):
                if(!$obj->list){
                    $this->session->setFlashdata('msg_erro', "The list object was no set in database");
                    return redirect()->to('DynamicController/index/'.$entity);
                }
                $obj->list = $dynamicModel->return_list($obj->list);
            endif;
        endforeach;

        $this->data["object"] = $object;
        $this->data["entity"] = $entity;
        return view('cms/DynamicViews/modify', $this->data);
    }

    
    public function edit() {
        if (!$_POST):
            return false;
        endif;

        $dynamicModel = new DynamicModel();
        $entity_name = $this->request->getPost("entity");
        $entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();

        
        reset($_POST);
        $refID = key($_POST);
        $ID = $this->request->getPost($refID);
        foreach ($entity as $field):
            $data = array();
            if ($field->field != $refID):
                if ($field->type != 'image'):
                    $data[$field->field] = $this->request->getPost($field->field);
                    $dynamicModel->change($entity_name, $data, $ID, $refID);
                endif;
            endif;
            if ($field->type == 'image'):
                $picture = $this->request->getFile($field->field);
                if($picture->isValid()){
                    $newName = $picture->getRandomName();
                    $picture->move('uploads/', $newName);
                    $data[$field->field] = $newName;
                    $dynamicModel->change($entity_name, $data, $ID, $refID);
                }
            endif;

            if ($field->type == 'video'):
                $video = $data[$field->field];
                $data[$field->field] = get_youtube_code($video);
                $dynamicModel->change($entity_name, $data, $ID, $refID);
            endif;
        endforeach;
        return redirect()->to('manage/' . $entity_name);
    }

    public function delete($entity_name, $ID) {
        $dynamicModel = new DynamicModel();
        $entity = $dynamicModel->where('name', $entity_name)->asObject()->findAll();
        $data["deleted_at"] = date('Y/m/d h:i:s');
        $dynamicModel->change($entity_name, $data, $ID, $entity[0]->field);

        return redirect()->to('manage/' . $entity_name);
    }
    
}
