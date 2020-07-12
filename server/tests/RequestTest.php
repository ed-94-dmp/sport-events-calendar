<?php

use PHPUnit\Framework\TestCase;
use Router\Request;

class RequestTest extends TestCase
{
    private $request;

    private static $params = [
        'date' => '2030-06-08',
        'shouldBeGone' => null,
        'shouldAsWellBeGone' => '',
        'someId' => '53cd2ed8-c482-11ea-be59-0242ac180005',
    ];

    protected function setUp(): void
    {
        $_GET = self::$params;
        $this->request = new Request;
    }

    public function testGetParams()
    {
        $this->assertEquals(self::$params['date'], $this->request->params['date']);
        $this->assertEquals(self::$params['someId'], $this->request->params['someId']);

        $this->assertFalse(in_array('shouldBeGone', $this->request->params));
        $this->assertFalse(in_array('shouldAsWellBeGone', $this->request->params));
    }
}
