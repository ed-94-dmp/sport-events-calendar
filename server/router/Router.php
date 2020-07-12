<?php

namespace Router;

class Router
{
    private $request;
    private $supportedHttpMethods = ['GET', 'POST'];

    private $validators = [];

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

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;

        if($validator) {
            $this->validators[strtolower($name)][$this->formatRoute($route)] = $validator;
        }
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
        $requestMethod = strtolower($this->request->requestMethod);
        $formattedRoute = $this->formatRoute($this->request->requestUri);

        $methodDictionary = $this->{$requestMethod};
        $validatorDictionary = $this->validators[$requestMethod];

        $method = $methodDictionary[$formattedRoute];
        $validator = $validatorDictionary[$formattedRoute];


      if ($validator && !(new $validator($this->request))->validate()) {
            $this->badRequestHandler();
        }

//        try {
            echo call_user_func_array($method, [$this->request]);
//        } catch (\Exception $e) {
//            $this->defaultRequestHandler();
//        }
    }

    function __destruct()
    {
        $this->resolve();
    }
}