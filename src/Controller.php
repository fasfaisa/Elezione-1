<?php

namespace Elezione;

class Controller{
    public static function get_router($page): void
    {
        include_once "views/$page.php";
    }

    public static function post_router($page): void
    {
        include_once "process/$page.php";
    }

}