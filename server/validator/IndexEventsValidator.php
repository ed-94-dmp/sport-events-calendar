<?php

namespace Validator;

use Router\Request;

class IndexEventsValidator implements Validator
{
    use BasicValidatorRules;

    protected $params;
    protected $paramRules = [
        'sportId' => '/[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}/',
    ];

    public function __construct(Request $request)
    {
        $this->params = $request->getParams();
        $this->paramRules = array_merge(self::$basicParamRules, $this->paramRules);
    }

    /**
     * Validate whether parameters provided are acceptable.
     *
     * @return bool
     */
    public function validate()
    {
        foreach($this->params as $param => $value) {
            $regex = $this->paramRules[$param];

            if($regex && !preg_match($regex, $value)) {
                return false;
            }
        }

        return true;
    }
}