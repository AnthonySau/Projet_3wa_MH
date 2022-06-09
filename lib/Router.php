<?php

namespace MonsterHunterBlog;

class Router
{

    private $routes;

    public function __construct()
    {
        $this->routes = require_once './config/routes.php';
        $this->routing();
    }

    public function routing(): void
    {
        $availableRouteNames = array_keys($this->routes);
        // Si l'utilisateur appelle une route existante
        if (isset($_GET['page']) && in_array($_GET['page'], $availableRouteNames, true)) {
            $route = $this->routes[$_GET['page']];
            if (
                !isset($route['controller'])
                || !isset($route['method'])
                || !class_exists($route['controller'])
                || !method_exists($route['controller'], $route['method'])
            ) {
                header("Location: index.php?page=app_task_index");
            }
        } else {
            header("Location: index.php?page=app_task_index");
        }

        $controller = new $route['controller'];
        $controller->{$route['method']}();
    }

    public static function redirectToRoute(string $name, array $params = []): void
    {
        $uri = $_SERVER['SCRIPT_NAME'] . "?page=" . $name;

        if (!empty($params)) {
            array_walk($params, function (&$val, $key) {
                $val = urlencode((string) $key) . '=' . urlencode((string) $val);
            });
            $uri .= '&' . implode('&', $params);
        }

        header("Location: " . $uri);
        die;
    }
}