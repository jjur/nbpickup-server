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

    public function terms_of_use()
    {

        echo view("frontend/header");
        echo view("frontend/homepage");
        return view('frontend/footer');
    }

    public function register()
    {
        $DATA["hi"] = "Just making sure data is not empty";
        helper("form"); # Load form validation library


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $auth = new IonAuth();

            //$validation = \Config\Services::validation();
            //$validation->setRule('name', 'Name', 'required');
            //$validation->setRule('email', 'Email', 'required|valid_email');
            //$validation->setRule('password', 'Password', 'required|min_length[8]');

            $ready = $this->validate(['name' => 'required|min_length[2]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]']);


            if ($ready){
            $name = $this->request->getVar("name", FILTER_SANITIZE_STRING);
            $email = $this->request->getVar("email", FILTER_SANITIZE_STRING);
            $password = $this->request->getVar("password", FILTER_SANITIZE_STRING);
            $result = $auth->register($email,$password,$email,array("first_name"=>$name));
            if ($result){
                redirect()->to(base_url()."Auth/Login");
            }else{
                $DATA["message"] = "Registration Failed, User already exists.";
            }
            }else{
                $DATA["message"] = $this->validator->listErrors();
            }


        }
        echo view("frontend/header");
        echo view("frontend/registration", $DATA);
        return view('frontend/footer');
    }
}
