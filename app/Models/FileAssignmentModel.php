<?php

namespace App\Models;

use CodeIgniter\Model;

class FileAssignmentModel extends Model
{
    protected $table = 'file_assignments';
    protected $allowedFields = ['file', "assignment", "private"];
    protected $useTimestamps = false;
    protected $primaryKey = 'id';


}