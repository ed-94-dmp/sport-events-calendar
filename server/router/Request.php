<?php

namespace Router;

class Request
{
    public $params;

    function __construct()
    {
        $this->bootstrapSelf();
        $this->getParams();
    }

    private function bootstrapSelf()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }

        return $result;
    }

    private function getParams()
    {
        $params = $_GET;

        if ($this->requestMethod === 'POST') {
            $params = $_POST;
        }

        $this->params = array_filter($params, function ($value) {
            return filter_var($value, FILTER_SANITIZE_STRING);
        });
    }
}