<?php

namespace App\Models;

use CodeIgniter\Model;

class GradesModel extends Model
{
    protected $table = 'grades';
    protected $allowedFields = ['g_submission', "g_score"];
    protected $useTimestamps = true;
    protected $createdField  = 'g_created_at';
    protected $updatedField  = 'g_updated_at';
    protected $deletedField  = 'g_deleted_at';
    protected $primaryKey = 'g_id';

    public function find_grade($submission)
    {
        return $this->asArray()
            ->where(['g_submission' => $submission])
            ->first();
    }

}