<?php

namespace App\Controllers;


const PAGE_TITLE = " | nbpickup | Dashboard";


class API extends BaseController
{
	public function index()
	{
        return redirect()->to('/');
	}


}
