<?php

namespace TestFramework\Components\Kernel;


use TestFramework\Components\Kernel\Router;
use TestFramework\Components\HttpComponents\Request;

final class FrontController
{
    public function start(): void
    {
        $this->initError();
        $router = new Router();
        $router->run();
    }

    private function initError(): void
    {
        ini_set("display_errors", 1);
        error_reporting(E_ALL);
    }
}