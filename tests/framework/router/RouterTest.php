<?php
use bankaccount\framework\http\Request;
use bankaccount\framework\router\Router;

/**
 * @medium
 */
class RouterTest extends PHPUnit_Framework_TestCase
{
    protected $router;

    protected function setUp()
    {
        $this->router = new Router;
        $this->router->set('bankaccount', 'BankAccountController');
    }

    /**
     * @covers bankaccount\framework\router\Router::route
     */
    public function testCorrectControllerIsSelected()
    {
        $request = new Request('/bankaccount/id/1');

        $this->assertEquals(
          'BankAccountController', $this->router->route($request)
        );

        $this->assertEquals(1, $request->get('id'));
    }

    /**
     * @covers bankaccount\framework\router\Router::route
     * @covers bankaccount\framework\router\Router::setDefault
     */
    public function testDefaultControllerIsSelected()
    {
        $this->router->setDefault('DefaultController');

        $request = new Request('/is/not/configured');

        $this->assertEquals(
          'DefaultController', $this->router->route($request)
        );
    }

    /**
     * @covers            bankaccount\framework\router\Router::route
     * @covers            bankaccount\framework\router\Exception
     * @expectedException bankaccount\framework\router\Exception
     */
    public function testExceptionWhenNoControllerCanBeSelected()
    {
        $request = new Request('/is/not/configured');
        $this->router->route($request);
    }

    /**
     * @covers            bankaccount\framework\router\Router::route
     * @covers            bankaccount\framework\router\Exception
     * @expectedException bankaccount\framework\router\Exception
     */
    public function testExceptionWhenSomethingIsWrongWithTheValues()
    {
        $request = new Request('/bankaccount/id');
        $this->router->route($request);
    }
}
