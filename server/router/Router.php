<?php

namespace Router;

class Router
{
    private $request;
    private $supportedHttpMethods = ["GET"];

    function __construct($request)
    {
        $this->request = $request;
    }

    function __call($name, $args)
    {
        [$route, $method, $validator] = $args;

        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }

        if ($validator && !(new $validator($this->request))->validate()) {
            $this->badRequestHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    /**
     * Removes trailing forward slashes and query parameters from route
     *
     * @param $route string
     * @return string
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        $result = explode('?', $result)[0];

        if ($result === '') {
            return '/';
        }

        return $result;
    }

    private function badRequestHandler()
    {
        header("{$this->request->serverProtocol} 400 Bad Request");
        die;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
        die;
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
        die;
    }

    /**
     * Resolves a route into respective function call
     */
    function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formattedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formattedRoute];

        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, [$this->request]);
    }

    function __destruct()
    {
        $this->resolve();
    }
}