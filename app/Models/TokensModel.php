<?php

namespace App\Models;

use CodeIgniter\Model;

class TokensModel extends Model
{
    protected $table = 'tokens';
    protected $allowedFields = ['t_token', "t_assignment", "t_user"];
    protected $useTimestamps = true;
    protected $createdField  = 't_created_at';
    protected $updatedField  = 't_updated_at';
    protected $deletedField  = 't_deleted_at';
    protected $primaryKey = 't_id';

    public function get_token($assingment_id, $user_id){


        // Generate new user token
        $token = base64_encode(random_bytes(64));


        $data = array(
            "t_token" => $token,
            "t_assignment" => $assingment_id,
            "t_user" => $user_id
        );

        // Register new token in database
        $this->insert($data);
        return $token;


    }
}