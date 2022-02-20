<?php

namespace App\Controllers;

use App\Models\AssignmentsModel;
use App\Models\FilesModel;
use App\Models\FileSubmissionModel;
use App\Models\SubmissionsModel;
use IonAuth\Libraries\IonAuth;
use IonAuth\Models\IonAuthModel;

class Student extends BaseController
{
    public function index()
    {
        helper("form");
        echo view("frontend_student/header");
        echo view("frontend_student/submit");
        return view('frontend_student/footer');
    }

    /**
     * Displays website for submitting assignments manually using web interface.
     * If method=POST, attempts to submit the assignment and redirects to confirmation
     * page after successful submission.
     * @param $assignment
     * @param $email
     * @return string
     */
    public function submit($assignment = null, $email = null){
        helper("form");
        $DATA["assignment_code"] = $assignment ?? $this->request->getVar("assignment_code") ?? "";
        $DATA["student_email"] = $email ?? $this->request->getVar("student_email") ?? "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform submission in the easiest way possible without copypasting code
            $email = $DATA["student_email"];
            $assignment_alias = $DATA["assignment_code"];
            $file = $this->request->getFile('file');
            $file_identifier = $this->make_submit($assignment_alias, $email,$file, "WebAPP_minimal");

            if($file_identifier){
                $DATA["url"] = $file_identifier;
                echo view("frontend_student/header");
                echo view("frontend_student/response", $DATA);
                return view('frontend_student/footer');
            }else{
                // Submissions Failed
                $DATA["fail_message"] = "Submission failed, please check your email and assignment code. If problem persists, please contact your instructor.";
            }
        }

        echo view("frontend_student/header");
        echo view("frontend_student/submit", $DATA);
        return view('frontend_student/footer');
    }

    /**
     * Displays minimalistic website for submitting assignments when automatic approach fails.
     * If method=POST, attempts to submit the assignment and redirects to confirmation
     * page after successful submission.
     * @param $assignment
     * @param $email
     * @return string
     */
    public function submit_minimal($assignment = null, $email = null){
        helper("form");
        $DATA["assignment_code"] = $assignment ?? $this->request->getVar("assignment_code") ?? "ERR_Missing_Code";
        $DATA["student_email"] = $email ?? $this->request->getVar("student_email") ?? "Anonymous";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform submission in the easiest way possible without copypasting code
            $email = $DATA["student_email"];
            $assignment_alias = $DATA["assignment_code"];
            $file = $this->request->getFile('file');
            $file_identifier = $this->make_submit($assignment_alias, $email,$file, "WebAPP_minimal");

            if($file_identifier){
                $DATA["url"] = $file_identifier;
                echo view("frontend_student/header");
                echo view("frontend_student/response_minimal", $DATA);
                return view('frontend_student/footer');
            }else{
                // Submissions Failed
                $DATA["fail_message"] = "Submission failed, please check your email and assignment code. If problem persists, please contact your instructor.";
            }
        }

        echo view("frontend_student/header");
        echo view("frontend_student/submit_minimal", $DATA);
        return view('frontend_student/footer');
    }

    /**
     * Initializes download of file in uploads directory
     * @param $submission_identifier
     * @return void
     */
    public function get_submission($folder, $submission_identifier){

        $filename = WRITEPATH . "uploads/" ."$folder/$submission_identifier";

        // Validate if the file exists
        if (file_exists($filename)) {
            $details = pathinfo($filename);
            $file_extention = $details["extension"];

            // Output the file
            # download_file($filename);
            return $this->response->download($filename, null)->setFileName("submission.$file_extention");
        } else {
            sleep(2);
            echo "Incorrect File identifier. Please check the link and try again.";
        }
    }

    /**
     * Displays submission in nbviewer
     * @param $submission_identifier
     * @return void
     */
    public function view_submission($folder, $submission_identifier){

        $filename = WRITEPATH . "uploads/" ."$folder/$submission_identifier";

        // Validate if the file exists
        if (file_exists($filename)) {
            $base_url_without_protocol = str_replace("http://","",str_replace("https://","",base_url()));
            header("Location: https://nbviewer.org/url/$base_url_without_protocol/Student/get_submission/$folder/$submission_identifier");
            die();

        } else {
            sleep(2);
            echo "Incorrect File identifier. Please check the link and try again.";
        }
    }


    function make_submit($assignment_alias, $email, $file, $submission_method="WebAPP"){

        // Validate assignemnt based on alias
        $model_assigments = new AssignmentsModel();
        $assignment_id = $model_assigments->get_id_by_alias($assignment_alias);
        if (! $assignment_id){
            echo "Error: Assignment not recognized";
            return False;
        }else{
            $assignment_id = $assignment_id["a_id"];
        }

        // Validate email or create new user if does not exist
        if (! $email){
            echo "Email not provided";
            return False;
        }
        $user_model = new IonAuthModel();
        $user_id = $user_model->getUserIdFromIdentity($email);

        if (!$user_id){
            // Register a new user if user does not exist
            $auth = new IonAuth();
            $user_id = $auth->register($email,bin2hex(random_bytes(32)),$email);
        }

        // Save file
        if (! $file->isValid()) {
            echo $file->getErrorString().'('.$file->getError().')';
            return False;
        }
        // Save File
        $original_filename = $file->getName();
        $filepath = $file->store();
        $filename = $file->getName();


        // Create records about new submission
        $model_files       = new FilesModel();
        $model_submissions = new SubmissionsModel();
        $model_file_submissions = new FileSubmissionModel();

        $submission_data = array(
            "s_assignment" => $assignment_id,
            "s_user" => $user_id,
            "s_sub_method" => $submission_method,
        );
        $sub_id = $model_submissions->insert($submission_data);

        $file_data = array(
            "f_hash" => hash_file("md5",WRITEPATH . "uploads/" .$filepath),
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
        if ($model_file_submissions->insert($junction_data)){
            return $filepath;
        }else{
            return False;
        }

    }


}
