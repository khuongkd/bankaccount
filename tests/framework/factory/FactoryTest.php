<?php
use bankaccount\framework\factory\Factory;

/**
 * @small
 */
class FactoryTest extends PHPUnit_Framework_TestCase
{
    protected static $factory;

    public static function setUpBeforeClass()
    {
        self::$factory = new Factory;
    }

    public static function tearDownAfterClass()
    {
        self::$factory = NULL;
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getInstanceFor
     */
    public function testResponseCanBeConstructed()
    {
        $response = self::$factory->getInstanceFor('Response');

        $this->assertInstanceOf(
          'bankaccount\framework\http\Response', $response
        );

        return $response;
    }

    /**
     * @covers  bankaccount\framework\factory\Factory::getInstanceFor
     * @depends testResponseCanBeConstructed
     */
    public function testResponseIsUniqueInstance(bankaccount\framework\http\Response $response)
    {
        $this->assertSame(
          $response, self::$factory->getInstanceFor('Response')
        );
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getController
     */
    public function testControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'TestController',
          self::$factory->getController('TestController')
        );
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getMapper
     */
    public function testMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'TestMapper',
          self::$factory->getMapper('TestMapper')
        );
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getView
     */
    public function testViewCanBeConstructed()
    {
        $this->assertInstanceOf(
          'TestView',
          self::$factory->getView('TestView')
        );
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getInstanceFor
     * @covers bankaccount\framework\view\Result::__construct
     */
    public function testResultCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\framework\view\Result',
          self::$factory->getInstanceFor(
            'Result',
            array('headers' => array(), 'body' => '')
          )
        );
    }

    /**
     * @covers bankaccount\framework\factory\Factory::getInstanceFor
     */
    public function testRouterCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\framework\router\Router',
          self::$factory->getInstanceFor('Router')
        );
    }

    /**
     * @covers            bankaccount\framework\factory\Factory::getInstanceFor
     * @expectedException bankaccount\framework\factory\Exception
     */
    public function testExceptionIsRaisedForUnknownType()
    {
        self::$factory->getInstanceFor('Unknown');
    }
}
