<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;
use App\Models\FileAssignmentModel;
use App\Models\FilesModel;
use App\Models\GradebooksModel;
use App\Models\SubmissionsModel;
use App\Models\TokensModel;

const PAGE_TITLE = " | nbpickup | Dashboard";


class Api extends BaseController
{
    public function index()
    {
        return redirect()->to('/');
    }

    /*
     * Validates token and returns metadata about assignment
     *
     * Note that validation is automatically done with Filter
     */
    public function auth()
    {
        global $DATA;
        return json_encode($DATA["assignment"]);
    }


    public function list_files()
    {

        global $DATA;
        // Making sure we are having access to the file
        $model_files = new FileAssignmentModel();
        $files = $model_files->list_all_by_assignment($DATA["assignment"]["a_id"]);
        if ($files) {
            echo json_encode($files);
            die();
        } else {
            echo json_encode(array());
            die();
        }
    }

    /*
     * Downloads the file
     */
    public function get_file($file_id)
    {

        global $DATA;
        // Making sure we are having access to the file
        $model_files = new FilesModel();

        $file = $model_files->find($file_id);

        if ($file) {

            // Check the assignment the file is associated with
            $model_file_assignment = new FileAssignmentModel();

            $junction = $model_file_assignment->check_relationship($file_id, $DATA["assignment"]["a_id"]);

            if ($junction) {

                download_file($file);
            } else {
                echo "Error: Token not matched for this file";
                http_response_code(401);
                die(401);
            }
        }
    }

    public function get_gradebook()
    {
        global $DATA;
        // Making sure we are having access to the file
        $model_gradebooks = new GradebooksModel();
        $file = $model_gradebooks->find_latest_for_assignment($DATA["assignment"]["a_id"]);
        if ($file) {
            // Check the assignment the file is associated with
            download_file($file);
        }
    }

    public function upload_file()
    {
        $model_files = new FilesModel();
        $model_files_assignments = new FileAssignmentModel();
        $model_gradebook = new GradebooksModel();

        // Ignore checkpoint files
        if (strpos($this->request->getVar("filename"), "checkpoint")) {
            echo 0;
            die(200);
        }

        // Upload and store
        $path = $this->request->getFile('file')->store();

        $file_record = array(
            "f_hash" => hash("md5", $path),
            "f_filename_internal" => $path,
            "f_filename_original" => $this->request->getVar("filename"),
            "f_filepath" => $this->request->getVar("path"),
            "f_filesize" => filesize( WRITEPATH . "uploads/" . $path)
        );
        $file_id = $model_files->insert($file_record);


        # Check what is the type of file
        $type = $this->request->getVar("filetype") ?: "file";

        if ($type == "file") {
            $junction_record = array(
                "file" => $file_id,
                "assignment" => $this->request->getVar("assignment"),
                "private" => $this->request->getVar("private")
            );
            $model_files_assignments->insert($junction_record);
        } elseif ($type == "gradebook") {
            $junction_record = array(
                "g_file" => $file_id,
                "g_assignment" => $this->request->getVar("assignment"),
                "g_stats_assignments" => $this->request->getVar("stats_assignments") ?: -1,
                "g_stats_students" => $this->request->getVar("stats_students") ?: -1
            );
            $model_gradebook->insert($junction_record);
        }
        echo $file_id;
        die(200);
    }

    public function update_file($file_id)
    {
        $model_files = new FilesModel();

        // Upload and store
        $path = $this->request->getFile('file')->store();
        $file_record = array(
            "f_hash" => hash("md5", $path),
            "f_filename_internal" => $path,
            "f_filename_original" => $this->request->getVar("filename"),
            "f_filesize" => filesize( WRITEPATH . "uploads/" . $path)
        );
        // TODO: Check if we are having write access to this assignment
        $file_id = $model_files->update($file_id, $file_record);
        echo $file_id;
        die(200);
    }
    public function download_list($assignment, $class = FALSE)
    {
        global $DATA; # $DATA["assignment"]

        $model_submissions = new SubmissionsModel();

        $submissions = $model_submissions->


        # return json_encode($DATA["assignment"]);
        # $this->load->model("Users");
        # $user = $this->Users->get_user_id_by_token($token);
        $assignment_ok = $this->Users->get_assignment_id($assignment);
        # if ($this->Users->is_owner($user, $assignment_ok)) {
        #     $this->load->model("Submits");
        #     $lst = $this->Submits->get_list($assignment_ok, $class);
        #     echo json_encode($lst);
        #    die();
        #} else {
        #     echo "Error: You do not have rights to download this assginmnet";
        #    die();
        #}
    }
}

/*
 * Handles preparation for file transfer and transfers file
 */
function download_file($file)
{
    $attachment_location = WRITEPATH . "uploads/" . $file["f_filename_internal"];
    if (file_exists($attachment_location)) {
        // Setup headers for file download
        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public"); // needed for internet explorer
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:" . filesize($attachment_location));
        header("Content-Disposition: attachment; filename=" . $file["f_filename_original"]);
        readfile($attachment_location);
        die();
    } else {
        echo "Error: File not found";
        die(404);
    }
}

