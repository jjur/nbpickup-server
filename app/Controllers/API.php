<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;
use App\Models\FileAssignmentModel;
use App\Models\FilesModel;
use App\Models\GradebooksModel;
use App\Models\TokensModel;

const PAGE_TITLE = " | nbpickup | Dashboard";


class API extends BaseController
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
        return $DATA["assignment"];
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

        // Upload and store
        $path = $this->request->getFile('file')->store();

        $file_record = array(
            "f_hash" => hash("md5",$path),
            "f_filename_internal" => $path,
            "f_filename_original" => $this->request->getVar("filename"),
            "f_filepath" => $this->request->getVar("path")
        );
        $file_id = $model_files->insert($file_record);

        $junction_record = array(
            "file" => $file_id,
            "assignment" => $this->request->getVar("assingment"),
            "private"    => $this->request->getVar("source")
        );
        $model_files_assignments->insert($junction_record);
        echo $file_id;
        die(200);
    }

    public function update_file($file_id){
        $model_files = new FilesModel();

        // Upload and store
        $path = $this->request->getFile('file')->store();

        $file_record = array(
            "f_hash" => hash("md5",$path),
            "f_filename_internal" => $path
        );
        $file_id = $model_files->update($file_id,$file_record);
        echo $file_id;
        die(200);
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
        header("Content-Disposition: attachment; filename=" . $file["f_filename_external"]);
        readfile($attachment_location);
        die();
    } else {
        echo "Error: File not found";
        die(404);
    }
}
