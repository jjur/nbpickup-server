<?php

namespace App\Controllers;


use App\Models\AssignmentsModel;

const PAGE_TITLE = " | nbpickup | Dashboard";


class Dashboard extends BaseController
{
	public function index()
	{
        return redirect()->to('/Dashboard/projects');
	}


	public function projects()
    {
        global $DATA;

        $model_assignments = new AssignmentsModel();

        $DATA["Assignments"] = $model_assignments->get_own_assignments($DATA["user"]->id);


        echo view("backend/header");
        echo view("backend/project_list", $DATA);
        return view('backend/footer');
    }

}
