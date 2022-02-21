<?php

namespace App\Models;

use CodeIgniter\Model;

class GradebooksModel extends Model
{
    protected $table = 'gradebooks';
    protected $allowedFields = ['g_assignment', "g_file", "g_stats_assignments", "g_stats_students"];
    protected $useTimestamps = true;
    protected $createdField  = 'g_created_at';
    protected $updatedField  = 'g_updated_at';
    protected $deletedField  = 'g_deleted_at';
    protected $primaryKey = 'g_id';


    /**
     * Returns full history of gradebooks associated with specified Assignment ID.
     * @param $assignment_id
     * @return array
     */
    public function get_all_for_assignment_id($assignment_id)
    {
        return $this->asArray()
            ->where(['g_assignment' => $assignment_id])
            ->orderBy("g_created_at","DESC")
            ->join("files","files.f_id = g_file")
            ->findAll();
    }

    /**
     * Returns last 5 uploaded gradebook records associated
     * with specified Assignment ID.
     * @param $assignment_id
     * @return array
     */
    public function get_5_for_assignment_id($assignment_id)
    {
        return $this->asArray()
            ->where(['g_assignment' => $assignment_id])
            ->orderBy("g_created_at","DESC")->limit(5)
            ->join("files","files.f_id = g_file")
            ->findAll();
    }

    /**
     * Returns most recent gradebook records associated
     * with specified Assignment ID.
     * @param $assignment_id
     * @return array
     */
    public function find_latest_for_assignment($assignment_id)
    {
        return $this->asArray()
            ->where(['g_assignment' => $assignment_id])
            ->orderBy("g_created_at","DESC")
            ->join("files","files.f_id = g_file")
            ->first();
    }

}