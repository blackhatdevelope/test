<?php

// public
// protected
// private

class Example {

    //property
    public $name='ramyar';
    public $email='ramyar@admin.com';
    protected $password='1234';
    private $level='admin';

    public function __construct()
    {
        echo 'construct parent';
    }


    // method
    public function register()
    {
        echo 'register';
    }

    public function login()
    {
        echo $this->level;
        echo 'login';

    }
}

class Help extends Example
{
//    public $password='adfa';
    public function __construct()
    {
//        parent::__construct();
        echo 'construct';
    }
    public function reset()
    {
        parent::login();
    }
}


    $help=new Help();




