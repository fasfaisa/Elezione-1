<?php

namespace Elezione\controller;

class Controller
{
    public static function get_router($page): void
    {
        include_once "../app/view/$page.php";
    }

    public static function post_router($page): void
    {
        include_once "../app/model/process/$page.php";
    }
}
