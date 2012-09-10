<?php
namespace bankaccount\framework\factory;

interface FactoryInterface
{
    public function getController($name);

    public function getMapper($name);

    public function getView($name);

    public function getInstanceFor($type, array $arguments = array());
}
