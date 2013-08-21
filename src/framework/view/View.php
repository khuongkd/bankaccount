<?php
namespace bankaccount\framework\view;

use bankaccount\framework\factory\FactoryInterface;
use bankaccount\framework\http\Response;

abstract class View
{
    protected $response;

    public function __construct(Response $response, FactoryInterface $factory)
    {
        $this->factory  = $factory;
        $this->response = $response;
    }

    abstract public function render();
}
