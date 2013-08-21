<?php
use bankaccount\Application;
use bankaccount\testing\Factory;
use bankaccount\framework\http\Request;

/**
 * @medium
 */
class ApplicationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers bankaccount\Application
     */
    public function testResponseForBankAccountRequestIsCorrect()
    {
        $application = $this->initApplication('/bankaccount/id/1');
        $application->run();

        $result = $application->getResult();

        $this->assertEquals(
          "The balance of bank account #1 is 1.00.", $result->getBody()
        );
    }

    /**
     * @covers bankaccount\Application
     */
    public function testResponseForBankAccountListRequestIsCorrect()
    {
        $application = $this->initApplication('/bankaccounts');
        $application->run();

        $result = $application->getResult();

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/id/1">Bank Account #1</a></li></ul>',
          $result->getBody()
        );
    }

    protected function initApplication($uri)
    {
        $application = new Application(
          new Request($uri),
          new Factory(
            new bankaccount\framework\factory\Factory,
            new PDO(
              'sqlite:' . __DIR__ . '/../../../database/bankaccount.db'
            )
          )
        );

        return $application;
    }
}
