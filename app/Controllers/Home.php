<?php

namespace App\Controllers;

use IonAuth\Libraries\IonAuth;

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
        global $DATA;
        helper("form"); # Load form validation library
        $validation = \Config\Services::validation();

        $validation->setRule('name', 'Name', 'required');
        $validation->setRule('email', 'Email', 'required|valid_email');
        $validation->setRule('password', 'Password', 'required|min_length[8]');


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $auth = new IonAuth();
            if ($validation->run()){
            $name = $this->request->getVar("name", FILTER_SANITIZE_STRING);
            $email = $this->request->getVar("email", FILTER_SANITIZE_STRING);
            $password = $this->request->getVar("password", FILTER_SANITIZE_STRING);
            $result = $auth->register($email,$password,$email,array("first_name"=>$name));
            if ($result){
                redirect("Auth/Login");
            }else{
                $DATA["message"] = "Registration Failed, User already exists.";
            }
            }else{
                $DATA["message"] = $validation->listErrors();
            }


        }
        echo view("frontend/header");
        echo view("frontend/registration", $DATA);
        return view('frontend/footer');
    }
}
