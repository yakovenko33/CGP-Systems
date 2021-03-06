<?php


namespace TestFramework\Components\Kernel;


use TestFramework\Components\HttpComponents\Request;

final class Router
{
    /**
     * @var array
     */
    private $routes;

    /**
     * @var string
     */
    private $requestUri;

    /**
     * @var string
     */
    private $controllerName;

    /**
     * @var string
     */
    private $actionName;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = require_once(ROOT . '/routes/routes.php');
        $this->requestUrl = $_SERVER['REQUEST_METHOD'] . trim($_SERVER["REQUEST_URI"]);
    }

    public function run(): void
    {
        $includeController = false;
        foreach($this->routes as $uriPattern => $path) {
            $this->requestUrl = explode('?', $this->requestUrl)[0];
            if (preg_match("~$uriPattern~", $this->requestUrl)) {
                $fullPath = preg_replace("~$uriPattern~", $path, $this->requestUrl);
                $segments = explode('@', $fullPath);

                $this->controllerName = array_shift($segments);
                $this->actionName = array_shift($segments);
            }
        }

        if (!$this->includeController(new Request($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER))) {
            var_dump("404");
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function includeController(Request $request): bool
    {
        if (class_exists($this->controllerName)) {
            $controller = new $this->controllerName();
            if (method_exists($controller, $this->actionName)) {
                $action = $this->actionName;
                $controller->$action($request);

                return true;
            }
        }

        return false;
    }
}