<?php
use bankaccount\framework\view\Result;

/**
 * @covers bankaccount\framework\view\Result
 * @medium
 */
class ResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testResultCanBeRendered()
    {
        $header = 'HTTP/1.1 500 Internal Server Error';
        $body   = 'An error has occured';

        $this->expectOutputString($body);

        $result = new Result(array($header), $body);
        $result->render();
    }
}
