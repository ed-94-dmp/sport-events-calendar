<?php

namespace Router;

class Request
{
    function __construct()
    {
        $this->bootstrapSelf();
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

    public function getParams()
    {
        $params = $_GET;

        if ($this->requestMethod === 'POST') {
            $params = $_POST;
        }

        return array_filter($params, function ($value) {
            return filter_var($value, FILTER_SANITIZE_STRING);
        });
    }
}