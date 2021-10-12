<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        // Redirect to a login page if user is not logged in
        $ionAuth = new \IonAuth\Libraries\IonAuth();
        if (!$ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        }

        // If user is logged in, prepare data for dashboard
        global $DATA;
        $DATA["user"] = $ionAuth->user()->row();
        $DATA["isAdmin"] = $ionAuth->isAdmin();
        $DATA["isManager"] = $ionAuth->inGroup("manager");
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}