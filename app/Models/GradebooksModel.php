<?php

namespace App\Models;

use CodeIgniter\Model;

class GradebooksModel extends Model
{
    protected $table = 'gradebooks';
    protected $allowedFields = ['g_assignment', "g_file", "g_assignments", "g_students"];
    protected $useTimestamps = true;
    protected $createdField  = 'g_created_at';
    protected $updatedField  = 'g_updated_at';
    protected $deletedField  = 'g_deleted_at';
    protected $primaryKey = 'g_id';


}