<?php

namespace App\Models;

use CodeIgniter\Model;

class SubmissionsModel extends Model
{
    protected $table = 'submissions';
    protected $allowedFields = ['s_assignment', "s_user", "s_sub_method"];
    protected $useTimestamps = true;
    protected $createdField  = 's_created_at';
    protected $updatedField  = 's_updated_at';
    protected $deletedField  = 's_deleted_at';
    protected $primaryKey = 's_id';


}