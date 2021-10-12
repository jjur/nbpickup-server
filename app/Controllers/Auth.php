<?php namespace App\Controllers;

class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */

    protected $viewsFolder = 'auth';


    public function __construct()
    {
        parent::__construct();
        $this->session = \Config\Services::session();
        $this->language = \Config\Services::language();
        $this->language->setLocale($this->session->lang);
    }
}