<?php


namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model {
    protected $table      = 'menu';
    protected $primaryKey = 'menuID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["menuID", "name", "route", "bunch", "order"];
    protected $useTimestamps = true;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public static function return_menu($bunch = NULL) {
        $db = \Config\Database::connect();
        if ($bunch):
            $data = $db->query("SELECT * FROM menu WHERE bunch = '$bunch'")->getResult();
        else:
            $data = $db->query("SELECT * FROM menu")->getResult();
        endif;

        if (!$data):
            return false;
        endif;
        return $data;
    }

}
