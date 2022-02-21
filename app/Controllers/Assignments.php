<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;
use App\Models\FileAssignmentModel;
use App\Models\FilesModel;
use App\Models\GradebooksModel;
use App\Models\TokensModel;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

const PAGE_TITLE = " | nbpickup | Dashboard";


class Assignments extends BaseController
{
    public function index()
    {
        return redirect()->to('/Dashboard/projects');
    }


    /**
     * Page that displays options to create new assingment or duplicate an existing one.
     */
    public function menu()
    {
        global $DATA;
        $model_assignments = new AssignmentsModel();
        $DATA["Assignments"] = $model_assignments->get_own_assignments($DATA["user"]->id);
        echo view("backend/header");
        echo view("backend/assignment_step1", $DATA);
        return view('backend/footer');
    }


    /**
     * Displays the initial form to create or edit the assingment
     * This function handles also the saving of the form if method is POST
     *
     * @param int $id
     * @return string|void
     */
    public function create($id = -1)
    {
        if ($id == "blank"){
            $id = -1;
        }
        global $DATA;


        # Load Libraries and helpers
        helper("form"); # Load form validation library
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $model_assignments = new AssignmentsModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Perform form validation and save data to the server
            // If action was successful, we redirect user to submission methods page
            // Else we show the standard form so user can fix error in the form


            // Validate data
            $validation->setRule('a_name', 'Assignment Title', 'required');
            //$validation->setRule('a_anonymous_sub', 'Anonymous Submissions', 'numeric');

            # Run form validations
            $validation->withRequest($this->request);
            if (!$validation->run()) {
                $session->setFlashdata('operation_action', 'show_alert');
                $session->setFlashdata('operation_result', 'danger');
                $session->setFlashdata('operation_content', "Invalid data received: " . $validation->listErrors());
            } else {

                // TODO Fix the issue with duplicated a_alias in the table
                // TODO Script that will take care of making them always unique is required
                // Colect data
                $formdata = array(
                    'a_name' => $request->getVar("a_name", FILTER_SANITIZE_STRING),
                    "a_description" => $request->getVar("a_description", FILTER_SANITIZE_STRING),
                    "a_owner" => $DATA["user"]->id,
                    "a_status" => $request->getVar("a_status", FILTER_SANITIZE_NUMBER_INT),
                    "a_code_lang" => $request->getVar("a_code_lang", FILTER_SANITIZE_NUMBER_INT),
                    "a_lang" => $request->getVar("a_lang", FILTER_SANITIZE_STRING),
                    "a_deadline" => $request->getVar("a_deadline", FILTER_SANITIZE_STRING),
                    "a_anonymous_sub" => $request->getVar("a_anonymous_sub", FILTER_SANITIZE_STRING)=="on"?1:0,
                    "a_unknown_users" => $request->getVar("a_unknown_users", FILTER_SANITIZE_STRING)=="on"?1:0,
                    "a_public" => $request->getVar("a_public", FILTER_SANITIZE_NUMBER_INT)
                );
                if ($id == -1) {
                    // Create new Assingment
                    // One-time generation of Alias
                    $formdata["a_alias"] = slug($formdata["a_name"] );
                    $id = $model_assignments->insert($formdata);
                } else {

                    $model_assignments->update($id,$formdata);
                }
                return redirect()->to(base_url()."/Assignments/settings/" . $id."/");
            }
        }else{
            // Load assignment data
            $DATA["assignment"] = $model_assignments->find($id);

        }

        // Load the form (empty or with data based on the Id
        $DATA["id"] = $id;
        echo view("backend/header");
        echo view("backend/assignment_editor", $DATA);
        return view('backend/footer');

    }

    /*
     * Diplays
     */
    public function settings($assignment_id)
    {
        global $DATA;
        $DATA["id"] = $assignment_id;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // TODO: Saving
            return redirect()->to(base_url()."/Assignments/resources/" . $assignment_id."/");
        }
        $model_assignments = new AssignmentsModel();
        $DATA["assignment"] = $model_assignments->find($assignment_id);
        echo view("backend/header");
        echo view("backend/assignment_settings", $DATA);
        return view('backend/footer');
    }

    public function resources($assignment_id)
    {
        global $DATA;
        $DATA["id"] = $assignment_id;

        $model_assignments = new AssignmentsModel();
        $DATA["assignment"] = $model_assignments->find($assignment_id);

        $model_files = new FilesModel();
        $model_gradebooks = new GradebooksModel();

        $DATA["files"] = $model_files->get_all_for_assignment_id($assignment_id);
        $DATA["gradebooks"] = $model_gradebooks->get_5_for_assignment_id($assignment_id);

        echo view("backend/header");
        #echo var_dump($DATA["files"]);
        #echo var_dump($DATA["gradebooks"]);
        echo view("backend/assignment_resources", $DATA);
        return view('backend/footer', $DATA);
    }

    public function share($assignment_id)
    {
        global $DATA;
        $DATA["id"] = $assignment_id;
        helper("form");

        $model_assignments = new AssignmentsModel();
        $DATA["assignment"] = $model_assignments->find($assignment_id);

        $model_files = new FilesModel();
        $model_gradebooks = new GradebooksModel();

        $DATA["files"] = $model_files->get_all_for_assignment_id($assignment_id);
        $DATA["gradebooks"] = $model_gradebooks->get_5_for_assignment_id($assignment_id);

        $DATA["card_step2"] = False;
        $DATA["card_step3"] = False;
        $DATA["submissions"] = False;
        $DATA["all_graded"] = False;

        foreach ($DATA["files"] as $file){
            if ($file["private"] == "1"){
                $DATA["card_step2"] = True;
            }
            if ($file["private"] == "0" and count($DATA["gradebooks"])>0){
                $DATA["card_step3"] = True;
            }
        }




        echo view("backend/header");
        #echo var_dump($DATA["files"]);
        #echo var_dump($DATA["gradebooks"]);
        echo view("backend/assignment_share", $DATA);
        return view('backend/footer', $DATA);
    }

    public function grading($assignment_id)
    {
        global $DATA;
        $DATA["id"] = $assignment_id;
        helper("form");

        $model_assignments = new AssignmentsModel();
        $DATA["assignment"] = $model_assignments->find($assignment_id);

        $model_files = new FilesModel();
        $model_gradebooks = new GradebooksModel();

        $DATA["files"] = $model_files->get_all_for_assignment_id($assignment_id);
        $DATA["gradebooks"] = $model_gradebooks->get_5_for_assignment_id($assignment_id);


        echo view("backend/header");

        echo view("backend/assignment_submissions", $DATA);
        return view('backend/footer', $DATA);
    }

    public function set_repo($id)
    {

        $request = \Config\Services::request();
        $session = \Config\Services::session();
        $model_assignments = new AssignmentsModel();

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // Perform form validation and save data to the server
            // If action was successful, we redirect user to submission methods page
            // Else we show the standard form so user can fix error in the form


            $formdata = array('a_repo_url' => $request->getVar("repo_url", FILTER_SANITIZE_URL));
            $model_assignments->update($id,$formdata);
            return redirect()->to(base_url()."/Assignments/share/" . $id."/");

        }
        return redirect()->to(base_url()."/Assignments/share/" . $id."/");
    }


    /**
     * Generates one-time tokens required for accessing authoring and grading binders.
     */
    public function get_token($assignment_id){
        global $DATA;

        $model_tokens = new TokensModel();

        $token =  $model_tokens->get_token($assignment_id, $DATA["user"]->id);
        $output["token"] = $token;

        return json_encode($output);

    }


    public function edit($assignment_id)
    {
        $this->create($assignment_id);
    }

    public function download_zip($assignment_id){
        $zip = new ZipArchive();
        $model_assignments = new AssignmentsModel();
        $model_file = new FilesModel();
        $model_files = new FileAssignmentModel();


        $assignment = $model_assignments->find($assignment_id);

        $directory = WRITEPATH . "temp/". $assignment["a_alias"]."/";
        $destination = $assignment["a_alias"].'.zip';
        # Create directory if not exits.
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }else{
            # empty whole directory
            $dir = $directory;
            $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($it,
                RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
            mkdir($directory, 0777, true);
        }


        $files = $model_files->list_public_by_assignment($assignment["a_id"]);

        foreach ($files as $file) {
            $file_details = $model_file->find($file["file"]);

            $source = WRITEPATH . "uploads/" . $file_details["f_filename_internal"];
            copy($source, $directory.$file_details["f_filename_original"]);
        }

        Zip($directory,$destination);

        if(file_exists($destination)){
            //Set Headers:
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($destination)) . ' GMT');
            header('Content-Type: application/force-download');
            header('Content-Disposition: inline; filename="'.$destination.'"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($destination));
            header('Connection: close');
            readfile($destination);
            exit();
        }

        if(file_exists($destination)){
            unlink($destination);

        }

    }

    public function download_teacher_zip($assignment_id){
        $zip = new ZipArchive();
        $model_assignments = new AssignmentsModel();
        $model_file = new FilesModel();
        $model_files = new FileAssignmentModel();


        $assignment = $model_assignments->find($assignment_id);

        $directory = WRITEPATH . "temp/". $assignment["a_alias"]."/";
        $destination = $assignment["a_alias"].'.zip';
        # Create directory if not exits.
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }else{
            # empty whole directory
            $dir = $directory;
            $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($it,
                RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
            mkdir($directory, 0777, true);
        }


        $files = $model_files->list_private_by_assignment($assignment["a_id"]);

        foreach ($files as $file) {
            $file_details = $model_file->find($file["file"]);

            $source = WRITEPATH . "uploads/" . $file_details["f_filename_internal"];
            copy($source, $directory.$file_details["f_filename_original"]);
        }

        Zip($directory,$destination);

        if(file_exists($destination)){
            //Set Headers:
            header('Pragma: public');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($destination)) . ' GMT');
            header('Content-Type: application/force-download');
            header('Content-Disposition: inline; filename="'.$destination.'"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($destination));
            header('Connection: close');
            readfile($destination);
            exit();
        }

        if(file_exists($destination)){
            unlink($destination);
        }
    }

    public function get_file($folder, $submission_identifier){

        $filename = WRITEPATH . "uploads/" ."$folder/$submission_identifier";

        // Validate if the file exists
        if (file_exists($filename)) {
            $details = pathinfo($filename);
            $file_extention = $details["extension"];

            // Output the file
            # download_file($filename);
            return $this->response->download($filename, null)->setFileName("file.$file_extention");
        } else {
            sleep(2);
            echo "Incorrect File identifier. Please check the link and try again.";
        }
    }
}

/*
 * Removes special characters from name, puts hyphen and makes everything lowercase
 * Source: https://stackoverflow.com/questions/3022185/convert-string-into-slug-with-single-hyphen-delimiters-only
 */
function slug($z){
    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = str_replace(' ', '-', $z);
    return trim($z, '-');
}

function Zip($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', realpath($file));

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}