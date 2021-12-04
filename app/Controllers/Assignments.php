<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;

const PAGE_TITLE = " | nbpickup | Dashboard";


class Assignments extends BaseController
{
	public function index()
	{
        return redirect()->to('/Dashboard/projects');
	}


    public function create($mid = "None")
    {
        global $DATA;

        if ($mid == "None"){
            $model_assignments = new AssignmentsModel();
            $DATA["Assignments"] = $model_assignments->get_own_assignments($DATA["user"]->id);
            echo view("backend/header");
            echo view("backend/assignment_step1",$DATA);
            return view('backend/footer');
        }elseif ($mid = "blank"){
            echo view("backend/header");
            echo view("backend/assignment_editor");
            return view('backend/footer');
        }

    }

	public function edit($assignment_id)
    {
        echo view("backend/header");
        echo view("backend/project_list");
        return view('backend/footer');
    }

}
