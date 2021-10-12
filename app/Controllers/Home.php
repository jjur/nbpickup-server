<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

        echo view("frontend/header");
        echo view("frontend/homepage");
		return view('frontend/footer');
	}

    public function register()
    {

        echo view("frontend/header");
        echo view("frontend/registration");
        return view('frontend/footer');
    }
}
