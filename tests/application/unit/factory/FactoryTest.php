<?php
use bankaccount\Factory;

/**
 * @medium
 */
class ApplicationFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $factory;

    /**
     * @covers bankaccount\Factory::__construct
     */
    protected function setUp()
    {
        $this->factory = new Factory(
          new bankaccount\framework\factory\Factory, new PDO('sqlite::memory:')
        );
    }

    /**
     * @covers bankaccount\Factory::getController
     */
    public function testGenericControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'TestController',
          $this->factory->getController('TestController')
        );
    }

    /**
     * @covers bankaccount\Factory::getController
     */
    public function testBankAccountListControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\controller\BankAccountList',
          $this->factory->getController('BankAccountList')
        );
    }

    /**
     * @covers bankaccount\Factory::getController
     */
    public function testRedirectToBankaccountListControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\controller\RedirectToBankaccountList',
          $this->factory->getController('RedirectToBankaccountList')
        );
    }

    /**
     * @covers bankaccount\Factory::getController
     */
    public function testBankAccountControllerCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\controller\BankAccount',
          $this->factory->getController('BankAccount')
        );
    }

    /**
     * @covers bankaccount\Factory::getMapper
     */
    public function testGenericMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'TestMapper',
          $this->factory->getMapper('TestMapper')
        );
    }

    /**
     * @covers bankaccount\Factory::getMapper
     */
    public function testBankAccountMapperCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\mapper\BankAccount',
          $this->factory->getMapper('BankAccount')
        );
    }

    /**
     * @covers bankaccount\Factory::getInstanceFor
     */
    public function testResponseCanBeConstructed()
    {
        $response = $this->factory->getInstanceFor('Response');

        $this->assertInstanceOf(
          'bankaccount\framework\http\Response', $response
        );

        return $response;
    }

    /**
     * @covers bankaccount\Factory::getInstanceFor
     */
    public function testResultCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\framework\view\Result',
          $this->factory->getInstanceFor(
            'Result',
            array('headers' => array(), 'body' => '')
          )
        );
    }

    /**
     * @covers bankaccount\Factory::getInstanceFor
     */
    public function testRouterCanBeConstructed()
    {
        $this->assertInstanceOf(
          'bankaccount\framework\router\Router',
          $this->factory->getInstanceFor('Router')
        );
    }
}
