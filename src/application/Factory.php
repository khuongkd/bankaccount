<?php
namespace bankaccount;

use bankaccount\framework\factory\Exception;
use bankaccount\framework\factory\FactoryInterface;

class Factory extends framework\factory\Factory
{
    protected $pdo;

    public function __construct(FactoryInterface $factory, \PDO $pdo)
    {
        $this->factory = $factory;
        $this->pdo     = $pdo;
    }

    public function getController($name)
    {
        switch ($name) {
            case 'BankAccount': {
                return new \bankaccount\controller\BankAccount(
                  $this->getMapper('BankAccount')
                );
            }
            break;

            case 'BankAccountList': {
                return new \bankaccount\controller\BankAccountList(
                  $this->getMapper('BankAccount')
                );
            }
            break;

            case 'RedirectToBankaccountList': {
                return new \bankaccount\controller\RedirectToBankaccountList;
            }
            break;
        }

        return $this->factory->getController($name);
    }

    public function getMapper($name)
    {
        switch ($name) {
            case 'BankAccount': {
                return new \bankaccount\mapper\BankAccount($this->pdo);
            }
            break;
        }

        return $this->factory->getMapper($name);
    }

    public function getInstanceFor($type, array $arguments = array())
    {
        return $this->factory->getInstanceFor($type, $arguments);
    }
}
