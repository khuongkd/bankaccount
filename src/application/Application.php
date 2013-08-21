<?php
namespace bankaccount;

use bankaccount\framework\factory\FactoryInterface;
use bankaccount\framework\http\Request;
use bankaccount\framework\FrontController;
use bankaccount\framework\view\Result;

class Application
{
    protected $factory;
    protected $frontController;
    protected $request;
    protected $response;
    protected $router;
    protected $result;

    public function __construct(Request $request, FactoryInterface $factory)
    {
        $this->factory  = $factory;
        $this->request  = $request;
        $this->response = $this->factory->getInstanceFor('Response');
        $this->router   = $this->factory->getInstanceFor('Router');

        $this->router->set('bankaccount',  'BankAccount');
        $this->router->set('bankaccounts', 'BankAccountList');

        $this->router->setDefault('RedirectToBankaccountList');

        $this->frontController = new FrontController(
          $this->request,
          $this->router,
          $this->factory
        );
    }

    public function run()
    {
        try {
            $this->result = $this->frontController->dispatch();
        }

        catch (\bankaccount\framework\exception\Exception $e) {
            $this->result = new Result(
              array('HTTP/1.1 500 Internal Server Error'),
              'An error has occured.'
            );
        }

        $this->result->render();
    }

    public function getResult()
    {
        return $this->result;
    }
}
