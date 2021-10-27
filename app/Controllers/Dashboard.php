<?php

namespace App\Controllers;


const PAGE_TITLE = " | nbpickup | Dashboard";


class Dashboard extends BaseController
{
	public function index()
	{
        return redirect()->to('/Dashboard/projects');
	}


	public function projects()
    {
        echo view("backend/header");
        echo view("backend/project_list");
        return view('backend/footer');
    }

}
