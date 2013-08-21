<?php
use bankaccount\view\BankAccountList;
use bankaccount\testing\Factory;
use bankaccount\framework\testing\ViewTestCase;

/**
 * @small
 */
class BankAccountListViewTest extends ViewTestCase
{
    /**
     * @covers bankaccount\view\BankAccountList::render
     */
    public function testIsRenderedCorrectly()
    {
        $this->response->expects($this->once())
                       ->method('get')
                       ->with($this->equalTo('ids'))
                       ->will($this->returnValue(array(1)));

        $view = new BankAccountList(
          $this->response,
          new Factory(
            new \bankaccount\framework\factory\Factory,
            new \PDO('sqlite::memory:')
          )
        );

        $result = $view->render();

        $this->assertEquals(
          '<ul><li><a href="/bankaccount/id/1">Bank Account #1</a></li></ul>',
          $result->getBody()
        );
    }
}
