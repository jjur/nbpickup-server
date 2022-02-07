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
        $DATA["assignment_code"] = $assignment ?? $this->request->getVar("assignment_code") ?? "";
        $DATA["student_email"] = $email ?? $this->request->getVar("student_email") ?? "";
        echo view("frontend_student/header");
        echo view("frontend_student/submit", $DATA);
        return view('frontend_student/footer');
    }

    public function submit_minimal($assignment = null, $email = null){
        helper("form");
        $DATA["assignment_code"] = $assignment ?? $this->request->getVar("assignment_code") ?? "ERR_Missing_Code";
        $DATA["student_email"] = $email ?? $this->request->getVar("student_email") ?? "Anonymous";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform submission in the easiest way possible without copypasting code
        }

        echo view("frontend_student/header");
        echo view("frontend_student/submit_minimal", $DATA);
        return view('frontend_student/footer');
    }


}
