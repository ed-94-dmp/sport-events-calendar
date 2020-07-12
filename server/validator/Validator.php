<?php

namespace Validator;

use Router\Request;

interface Validator
{
    public function __construct(Request $request);

    /**
     * Validate whether request parameters are valid.
     *
     * @return bool
     */
    public function validate();
}