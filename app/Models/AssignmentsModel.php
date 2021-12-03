<?php

namespace App\Models;

use CodeIgniter\Model;

class AssignmentsModel extends Model
{
    protected $table = 'assignments';
    protected $allowedFields = ['a_name', 'a_alias', "a_description", "a_owner", "a_status",
        "a_code_lang", "a_lang", "a_deadline", "a_anonymous_sub", "a_unknown_users", "a_sub_api",
        "a_sub_portal", "a_sub_email", "a_repo_url"];
    protected $useTimestamps = true;
    protected $createdField  = 'a_created_at';
    protected $updatedField  = 'a_updated_at';
    protected $deletedField  = 'a_deleted_at';
    protected $primaryKey = 'a_id';


}