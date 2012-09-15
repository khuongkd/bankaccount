<?php
namespace bankaccount\controller;

use bankaccount\framework\controller\ControllerInterface;
use bankaccount\framework\http\Request;
use bankaccount\framework\http\Response;

class RedirectToBankaccountList implements ControllerInterface
{
    public function execute(Request $request, Response $response)
    {
        $response->set('target', '/bankaccounts');

        return 'bankaccount\\framework\\view\\Redirect';
    }
}
