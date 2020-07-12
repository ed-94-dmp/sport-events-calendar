<?php

namespace Validator;

use Router\Request;

class CreateEventsValidator implements Validator
{
    use BasicValidatorRules;

    protected $params;
    protected $paramRules = [
        'uuid' => '/[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}/',
        'status' => ['postponed', 'scheduled', 'canceled', 'to be announced'],
        'datetime' => '/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}/',
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
        $uuidParams = [
            'sportId',
            'locationId',
            'competitionId',
            'competitor1Id',
            'competitor2Id',
        ];

        foreach ($uuidParams as $param) {
            if (!$this->params[$param] || !preg_match($this->paramRules['uuid'], $this->params[$param])) {
                return false;
            }
        }

        if (!$this->params['datetime'] || !preg_match($this->paramRules['datetime'], $this->params['datetime'])) {
            return false;
        }

        if (!$this->params['status'] || !in_array($this->params['status'], $this->paramRules['status'])) {
            return false;
        }

        return true;
    }
}