<?php

namespace App\Models;

use CodeIgniter\Model;

class FileAssignmentModel extends Model
{
    protected $table = 'file_assignments';
    protected $allowedFields = ['file', "assignment", "private"];
    protected $useTimestamps = false;
    protected $primaryKey = 'id';

    public function check_relationship($file_id,$assignment_id){
        return $this->asArray()
            ->where(["file"=> $file_id,
                     "assignment" => $assignment_id])
            ->first();
    }

    public function list_all_by_assignment($assignemnt_id){
        return $this->asArray()->where(["assignment" => $assignemnt_id])->findAll();
    }
}