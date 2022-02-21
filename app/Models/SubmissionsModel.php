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

    public function get_submissions($assignment_id){
        #$db = db_connect();
        $query = $this->db->query("SELECT username, f_filename_internal, f_filename_original, f_created_at, f_updated_at, g_score FROM submissions JOIN users ON users.id=submissions.s_user JOIN file_submission ON file_submission.submission = submissions.s_id JOIN files ON files.f_id = file_submission.file LEFT JOIN grades ON submissions.s_id = grades.g_submission WHERE (s_id IN (SELECT MAX(s_id) as s_id FROM submissions WHERE (`s_assignment` = $assignment_id) GROUP BY `s_user`, `s_assignment`))");#->result_array();
        return $query->getResultArray();
    }
}