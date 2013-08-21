<?php
use bankaccount\controller\RedirectToBankaccountList;

/**
 * @small
 */
class RedirectToBankaccountListTest extends ControllerTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->controller = new RedirectToBankaccountList;
    }

    /**
     * @covers bankaccount\controller\RedirectToBankaccountList::execute
     */
    public function testReturnsBankAccountViewWhenBankAccountIsSpecified()
    {
        $this->response->expects($this->at(0))
                       ->method('set')
                       ->with($this->equalTo('target'),
                              $this->equalTo('/bankaccounts'));

        $view = $this->controller->execute($this->request, $this->response);

        $this->assertEquals('bankaccount\framework\view\Redirect', $view);
    }
}
