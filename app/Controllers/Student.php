<?php

namespace App\Controllers;

use IonAuth\Libraries\IonAuth;

class Student extends BaseController
{
    public function index()
    {
        helper("form");
        echo view("frontend_student/header");
        echo view("frontend_student/submit");
        return view('frontend_student/footer');
    }


    public function submit($assignment = null, $email = null){
        helper("form");
        $DATA["assignment_code"] = $assignment ?? "";
        $DATA["student_email"] = $email ?? "";
        echo view("frontend_student/header");
        echo view("frontend_student/submit", $DATA);
        return view('frontend_student/footer');
    }

    public function submit_minimal($assignment = null, $email = null){
        helper("form");
        $DATA["assignment_code"] = $assignment ?? "";
        $DATA["student_email"] = $email ?? "";
        echo view("frontend_student/header");
        echo view("frontend_student/submit_minimal", $DATA);
        return view('frontend_student/footer');
    }


}
