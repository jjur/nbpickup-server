<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $table = 'files';
    protected $allowedFields = ['f_hash', "f_filename_internal", "f_filename_original", "f_filepath", "f_owner", "f_alias"];
    protected $useTimestamps = true;
    protected $createdField  = 'f_created_at';
    protected $updatedField  = 'f_updated_at';
    protected $deletedField  = 'f_deleted_at';
    protected $primaryKey = 'f_id';

    public function get_all_for_assignment_id($assignment_id): array
    {
        return $this->asArray()
            ->where(['file_assignments.assignment' => $assignment_id])
            ->join("file_assignments", "file_assignments.file = files.f_id")
            ->orderBy("f_created_at","DESC")
            ->findAll();
    }
}