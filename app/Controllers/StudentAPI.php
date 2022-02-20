<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;
use App\Models\FileAssignmentModel;
use App\Models\FilesModel;
use App\Models\FileSubmissionModel;
use App\Models\GradebooksModel;
use App\Models\SubmissionsModel;
use App\Models\TokensModel;
use IonAuth\Libraries\IonAuth;
use IonAuth\Models\IonAuthModel;

const PAGE_TITLE = " | nbpickup | Dashboard";


class StudentAPI extends BaseController
{
    public function index()
    {
        return redirect()->to('/');
    }


    public function submit_one($assingment_alias)
    {
        /*
         * Function to handle universal assingment file submissions
         */

        global $DATA;

        // Initialization of modules
        $email = $this->request->getVar("email");
        $file = $this->request->getFile('file');

        // Validate file
        if (!$file->isValid()) {
            throw new \RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
        }

        // Save File
        $original_filename = $file->getName();
        $filepath = $file->store();
        $filename = $file->getName();

        $model_assigments = new AssignmentsModel();
        $assignment_id = $model_assigments->get_id_by_alias($assingment_alias);
        if (!$assignment_id) {
            echo "Error: Assignment not recognized";
            die(404);
        } else {
            $assignment_id = $assignment_id["a_id"];
        }


        if ($email) {
            $user_model = new IonAuthModel();
            $user_id = $user_model->getUserIdFromIdentity($email);

            if (!$user_id) {
                // Register a new user
                $auth = new IonAuth();
                $user_id = $auth->register($email, bin2hex(random_bytes(32)), $email);
            }

            $model_files = new FilesModel();
            $model_submissions = new SubmissionsModel();
            $model_file_submissions = new FileSubmissionModel();

            $submission_data = array(
                "s_assignment" => $assignment_id,
                "s_user" => $user_id,
                "s_sub_method" => "API"
            );
            $sub_id = $model_submissions->insert($submission_data);

            $file_data = array(
                "f_hash" => hash_file("md5", WRITEPATH . "uploads/" . $filepath),
                "f_filename_internal" => $filepath,
                "f_filename_original" => $original_filename,
                "f_filepath" => "",
                "f_owner" => $user_id
            );
            $file_id = $model_files->insert($file_data);

            $junction_data = array(
                "file" => $file_id,
                "submission" => $sub_id
            );
            if ($model_file_submissions->insert($junction_data)) {
                return base_url("Student/view_submission/$filepath");
            };

        } else {
            // Very anonymous submisssions
            // TODO: Implement later
            die();
        }

        // Find user account


    }


}
