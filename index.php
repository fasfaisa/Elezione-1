<?php

use Bramus\Router\Router;

require __DIR__ . '/vendor/autoload.php';

$app = new Router();

$app->setNamespace('\Elezione');
$app->get("/","Controller@index");
$app->get("/about","Controller@about");
$app->get("/contact","Controller@contact");
$app->get("/faq","Controller@faq");
$app->get("/login","Controller@login");
$app->get("/privacy","Controller@privacy");
$app->get("/register","Controller@register");
$app->get("/terms","Controller@terms");
$app->set404("Controller@error");
$app->run();