<?php

namespace App\Models;

use CodeIgniter\Model;

class FileSubmissionModel extends Model
{
    protected $table = 'file_submission';
    protected $allowedFields = ['file', "submission", "private"];
    protected $useTimestamps = false;
    protected $primaryKey = 'id';

    public function check_relationship($file_id,$assignment_id){
        return $this->asArray()
            ->where(["file"=> $file_id,
                     "assignment" => $assignment_id])
            ->first();
    }
}