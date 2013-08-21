<?php
use bankaccount\view\BankAccount;
use bankaccount\testing\Factory;
use bankaccount\framework\testing\ViewTestCase;

/**
 * @small
 */
class BankAccountViewTest extends ViewTestCase
{
    /**
     * @covers bankaccount\view\BankAccount::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->response->expects($this->at(0))
                       ->method('get')
                       ->with($this->equalTo('id'))
                       ->will($this->returnValue(1));

        $this->response->expects($this->at(1))
                       ->method('get')
                       ->with($this->equalTo('balance'))
                       ->will($this->returnValue(0));

        $view = new BankAccount(
          $this->response,
          new Factory(
            new \bankaccount\framework\factory\Factory,
            new \PDO('sqlite::memory:')
          )
        );

        $result = $view->render();

        $this->assertEquals(
          "The balance of bank account #1 is 0.00.", $result->getBody()
        );
    }
}
