<?php
/**
 * @small
 */
class ViewTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\view\View::__construct
     */
    public function testCanBeConstructed()
    {
        $response = $this->getMockBuilder('bankaccount\framework\http\Response')
                         ->getMock();

        $factory = $this->getMockBuilder('bankaccount\framework\factory\FactoryInterface')
                        ->getMock();

        $view = $this->getMockBuilder('bankaccount\framework\view\View')
                     ->setConstructorArgs(array($response, $factory))
                     ->getMockForAbstractClass();
    }
}
