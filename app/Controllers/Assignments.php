<?php

namespace App\Controllers;


const PAGE_TITLE = " | nbpickup | Dashboard";


class Assignments extends BaseController
{
	public function index()
	{
        return redirect()->to('/Dashboard/projects');
	}


	public function edit($assignment_id)
    {
        echo view("backend/header");
        echo view("backend/project_list");
        return view('backend/footer');
    }

}
