<?php
namespace bankaccount\framework;

use bankaccount\framework\factory\FactoryInterface;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;
use bankaccount\framework\router\Router;

class FrontController
{
    protected $factory;
    protected $request;
    protected $router;

    public function __construct(Request $request, Router $router, FactoryInterface $factory)
    {
        $this->request = $request;
        $this->router  = $router;
        $this->factory = $factory;
    }

    public function dispatch()
    {
        $controller = $this->factory->getController(
          $this->router->route($this->request)
        );

        $view = $this->factory->getView(
          $controller->execute(
            $this->request, $this->factory->getInstanceFor('Response')
          )
        );

        return $view->render();
    }
}
