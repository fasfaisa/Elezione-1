<?php

namespace Elezione;

class Controller{
    public function index(): void
    {
        include_once "views/home.php";
    }

    public function error(): void
    {
        include_once "views/404.php";
    }

    public function about(): void
    {
        include_once "views/about.php";
    }

    public function contact(): void
    {
        include_once "views/contact.php";
    }

    public function faq(): void
    {
        include_once "views/faq.php";
    }

    public function login(): void
    {
        include_once "views/login.php";
    }

    public function register(): void
    {
        include_once "views/register.php";
    }

    public function privacy(): void
    {
        include_once "views/privacy.php";
    }

    public function terms(): void
    {
        include_once "views/terms.php";
    }

}