<?php

namespace Core;

/**
 * Router
 * 
 * PHP version 8.0.7
 */
class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     * 
     * @param string $route The route URL
     * @param array $params (Optional) Parameters (controller, action, etc.)
     * 
     * @return void
     */
    public function add($route, $params = [])
    {
        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     * 
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     * 
     * @param string $url The route URL
     * 
     * @return boolean true if a match is found, false otherwise
     */
    // $url='signup/create';
    public function match($command)
    {
        foreach ($this->routes as $route => $params) {

            if ($command == $route) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     * 
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Dispatch the route, i.e. dynamically create the controller
     * object and run the action method
     * 
     * @param string $url The route URL
     * 
     * @return void
     */
    // $url='signup/create';
    public function dispatch($command)
    {
        if ($this->match($command)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;

            if (class_exists($controller)) {
                // Dynamically create controller object
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];

                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    $action = $action . "Action";
                    $controller_object->$action();
                } else {
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            } else {
                echo "Controller class $controller not found";
                exit;
            }
        } else {
            echo "No command matched, please try again";
            exit;
        }
    }

    /**
     * Convert the string with hyphens to StudlyCaps
     * e.g post-authors => PostAuthors
     * 
     * @param string $string The string to convert
     * 
     * @return string
     */
    protected function convertToStudlyCaps($string)
    {
        // Remove dashes
        $string = str_replace('-', ' ', $string);

        // Capitalise the first letter
        $string = ucwords($string);

        // Remove spaces
        $string = str_replace(' ', '', $string);

        return $string;
    }

    /**
     * Convert the string with hyphens to camelCase,
     * e.e add-new => addNew
     * 
     * @param string $string the string to convert
     * 
     * @return string
     */
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    /**
     * Get the namespace for the controller class. The namespace defined in the
     * route parameters is added if present
     * 
     * @return string The request URL
     */
    protected function getNamespace()
    {
        $namespace = "App\Controllers\\";

        if (array_key_exists('namespace', $this->params)) {
            $namespace = $namespace . $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}
