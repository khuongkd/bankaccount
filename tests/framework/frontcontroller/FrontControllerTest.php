<?php
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\framework\router\Router;
use bankaccount\framework\FrontController;
use bankaccount\testing\Factory;

/**
 * @medium
 */
class FrontControllerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\framework\FrontController::__construct
     * @covers bankaccount\framework\FrontController::dispatch
     */
    public function testDispatchingWorksCorrectly()
    {
        $request  = new Request('/test');
        $router   = new Router;
        $router->set('test', 'TestController');

        $factory = new Factory(
          new bankaccount\framework\factory\Factory,
          new PDO('sqlite::memory:')
        );

        $frontController = new FrontController(
          $request,
          $router,
          $factory
        );

        $result = $frontController->dispatch();

        $this->assertEmpty($result->getHeaders());
        $this->assertEquals('test', $result->getBody());
    }
}
