<?php

namespace App\Controllers;


const PAGE_TITLE = " | nbpickup | Dashboard";


class Dashboard extends BaseController
{
	public function index()
	{
        return redirect()->to('/Dashboard/home');
	}

}
