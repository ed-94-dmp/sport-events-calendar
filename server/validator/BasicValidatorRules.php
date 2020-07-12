<?php

namespace Validator;

trait BasicValidatorRules
{
    protected static $basicParamRules = [
        'page' => '/^\d+$/',
        'date' => '/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/',
    ];
}