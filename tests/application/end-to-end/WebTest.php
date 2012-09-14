<?php
/**
 * @large
 */
class WebTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://localhost/bankaccounts');
    }

    public function test()
    {
        $this->url('http://localhost/bankaccounts');

        $this->assertContains('Bank Account #1', $this->source());

        $link = $this->byLinkText('Bank Account #1');
        $link->click();

        $this->assertContains(
          'The balance of bank account #1 is 1.00.', $this->source()
        );
    }
}
