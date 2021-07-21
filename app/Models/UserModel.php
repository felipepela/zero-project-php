<?php


namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table      = 'users';
    protected $primaryKey = 'userID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ["userID", "name", "email", "picture", "token", "password"];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function login($email, $password) {
        $db = \Config\Database::connect();

        $data = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->getRowObject();
        if($data){
            $session = session();
            $session->set('user', $data);
            return true;
        } else {
            return false;
        }
    }

    public function API_login($email, $password) {
        $db = \Config\Database::connect();
        $user = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'")->getRowObject();
        if($user){

            /*
            $token = openssl_random_pseudo_bytes(16);
            $token = bin2hex($token);
            $data["token"] = $token;

            $user->token = $token;

            $userModel = new UserModel();
            $userModel->save($user);
            */

            return $user;
        } else {
            return false;
        }
    }

    public static function is_token_actived($token) {
        $db = \Config\Database::connect();
        $user = $db->query("SELECT * FROM users WHERE token = '$token'")->getRowObject();
        if($user){
            return $user;
        }
        return false;
    }

    public static function is_logged_in() {
        $session = session();
        if ($session->get("user")):
            return true;
        else:
            return false;
        endif;
    }

}
