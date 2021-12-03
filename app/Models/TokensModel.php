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


}