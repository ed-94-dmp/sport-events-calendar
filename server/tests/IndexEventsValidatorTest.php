<?php

use PHPUnit\Framework\TestCase;
use Router\Request;
use Validator\IndexEventsValidator;

class IndexEventsValidatorTest extends TestCase
{
    private $validRequest;
    private $invalidRequest;

    private static $validParams = [
        'date' => '2030-06-08',
        'sportId' => '53cd2ed8-c482-11ea-be59-0242ac180005',
    ];

    private static $invalidParams = [
        'date' => '2030-30-50',
        'sportId' => 123,
    ];

    protected function setUp(): void
    {
        $_GET = self::$validParams;
        $this->validRequest = new Request;

        $_GET = self::$invalidParams;
        $this->invalidRequest = new Request;
    }

    public function testValidate()
    {
        $validator = new IndexEventsValidator($this->validRequest);
        $this->assertTrue($validator->validate());

        $validator = new IndexEventsValidator($this->invalidRequest);
        $this->assertFalse($validator->validate());
    }
}
