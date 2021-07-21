<?php


namespace App\Models;

use CodeIgniter\Model;

class DynamicModel extends Model {
    protected $table      = 'entities';
    protected $primaryKey = 'entityID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["entityID","name","field","label","type","list","mandatory","sequence","listable","visible"];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function list($entity) {
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM $entity WHERE deleted_at IS NULL")->getResult();
        if (!$data):
            return false;
        endif;
        return $data;
    }

    public function return_list($entity) {
        $data = $this->list($entity);
        return $data;
    }

    public function record_data($entity, $data) {
        $db = \Config\Database::connect();
        if($db->table($entity)->insert($data)){
            return true;
        }
    }

    public function validate_data($entity, $data){
        $dynamicModel = new DynamicModel();
        $entityModel = $dynamicModel->where('name', $entity)->asObject()->findAll();
        
        foreach($entityModel as $key => $row){
            if($row->mandatory == 1){
                if(!array_key_exists($row->field, $data)){
                    return false;
                }    
            }
            
        }
        return true;
        
    }



    public function load_object($entity, $ID, $fieldID) {
        $db = \Config\Database::connect();
        $data = $db->query("SELECT * FROM $entity WHERE $fieldID = $ID")->getRowObject();
        if($data){
            return $data;    
        }
        return false;
    }

    public function return_fieldID($entity){
        $db = \Config\Database::connect();
        $data = $db->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS`  WHERE `TABLE_SCHEMA`='zero_project' AND `TABLE_NAME`='$entity';")->getRowObject();
        if($data){
            return $data->COLUMN_NAME;  
        }
        return false;
    }
    
    public function change($entity_name, $data, $ID, $refID) {
        $db = \Config\Database::connect();
        $data["updated_at"] = date('Y/m/d h:i:s');
        if($db->table($entity_name)->where($refID, $ID)->update($data)){
            return true;
        }
    }



    public function busca($entity, $fields, $search) {
        $db = \Config\Database::connect();
        $builder = $db->table('entities');

        foreach ($fields as $field):
            $db->where($field, $search);
        endforeach;
        $data = $db->get();

        if(!$data){
            return false;
        }
        return $data;
    }

    public static function listar($entidade, $limit = NULL, $offset = NULL, $campo_ordenacao = NULL) {
        $CI = & get_instance();
        $objs = Entidade::seleciona_entidade($entidade);
        foreach ($objs as $obj):
            if ($obj->tipo == 'id'):
                $ID = $obj->campo;
            endif;
        endforeach;

        $CI->db->select("*")->from($entidade)->where("removido", 0);
        if ($limit):
            $CI->db->limit($limit, $offset);
        endif;
        if ($campo_ordenacao):
            $CI->db->order_by($campo_ordenacao, "ASC");
        else:
            $CI->db->order_by($ID, "DESC");
        endif;

        $lista = $CI->db->get()->result();
        return $lista;
    }

    public static function seleciona_lista_randomico($entidade, $quantos) {
        $CI = & get_instance();
        $lista = $CI->db->select("*")->from($entidade)->where("removido", 0)->order_by("ativo", "random")->limit($quantos)->get()->result();
        return $lista;
    }

}
