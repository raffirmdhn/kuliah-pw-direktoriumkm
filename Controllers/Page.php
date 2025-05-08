<?php

class Page
{
    public $title;
    public $file;

    public function __construct($title, $file)
    {
        $this->title = $title;
        $this->file = $file;
    }

    public function callAdmin()
    {
        $file = $this->file;
        $title = $this->title;
        include_once('Layouts/app.php');
    }

    public function callLanding()
    {
        include_once('views/landing.php');
    }

    public function callLogin()
    {
        include_once('views/login.php');
    }
    
    public function callRegister()
    {
        include_once('views/register.php');
    }
}
