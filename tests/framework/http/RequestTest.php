<?php
use bankaccount\framework\http\Request;

/**
 * @small
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\http\Request::__construct
     * @covers bankaccount\framework\http\Request::getURI
     */
    public function testRequestUriCanBeRetrieved()
    {
        $request = new Request('/');
        $this->assertEquals('/', $request->getURI());
    }
}
